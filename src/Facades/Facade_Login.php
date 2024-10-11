<?php
namespace BilligKjop\Facades;
use BilligKjop\Model\UserModel;
use BilligKjop\Singleton\LoginSingleton;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(path: __FILE__, levels: 3));
$dotenv->load();

class Facade_Login {
    const HOURS_TO_EXPIRE = 0.25/60 * 3600;

    public static function index(): void {
        $email = $_POST['email'];
        $password = $_POST['senha'];
        self::createLoginToken(email: $email, senhaInserida: $password);
    }

    public static function createLoginToken($email, $senhaInserida): void{
        $dadosUsuario = new UserModel(email: $email);
        $dadosUsuario = $dadosUsuario->getByIdentifierFromDb();

        if (!$dadosUsuario) { // Caso a conta não tenha sido encontrada, retornamos 404 (Não encontrado)
            http_response_code(response_code: 404); 
            exit();
        }

        $isPasswordCorrect = self::verifyUserPassword(senhaInserida: $senhaInserida, senhaBanco: $dadosUsuario['senha']);

        if (!$isPasswordCorrect) { // Se senha não está correta, retornamos 401 (Não autorizado)
            http_response_code(response_code: 401);
            exit();
        }

        self::createAndPopulateLoginSingleton(data: $dadosUsuario);
        $createdToken = self::createToken(dadosUsuario: $dadosUsuario);
        http_response_code(response_code: 200);
        echo $createdToken;
        exit();
    }

    public static function createAndPopulateLoginSingleton($data): void{
        $login = LoginSingleton::getInstance();
        $login->setUserData(userData: $data);
        self::initializeSession(loginSingleton: $login);
    }

    public static function initializeSession($loginSingleton): void {
        session_start();
        session_regenerate_id(true);
        $_SESSION['login'] = $loginSingleton;
    }

    public static function verifyUserPassword($senhaInserida, $senhaBanco): bool {
        $correctPassword = password_verify(password: $senhaInserida, hash: $senhaBanco ?? '');
        return $correctPassword;
    }

    public static function createToken($dadosUsuario): string {
        $payload = [
            "exp" => time() + self::HOURS_TO_EXPIRE,
            "iat" => time(),
            "nome" => $dadosUsuario['nome'],
            "email" => $dadosUsuario['email'],
            "tipo" => $dadosUsuario['id_tipo_usuario_FK']
        ];

        error_log($_ENV['KEY']);
        $encodedPayload = JWT::encode(payload: $payload, key: $_ENV['KEY'], alg: "HS256");
        $encodedJson = json_encode(value: $encodedPayload);

        return !$encodedJson ? "" : $encodedJson;
    }
}
