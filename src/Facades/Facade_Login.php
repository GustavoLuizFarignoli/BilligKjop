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
    const HOURS_TO_EXPIRE = 1 * 3600;

    public static function index(): void {
        self::Loggar(email: $_POST['email'], senhaInserida: $_POST['senha']);
    }

    public static function Loggar($email, $senhaInserida): void{
        $dadosUsuario = new UserModel(email: $email);
        $dadosUsuario = $dadosUsuario->getByIdentifierFromDb();

        if ($dadosUsuario) {
            $isPasswordCorrect = self::verifyUserPassword(senhaInserida: $senhaInserida, senhaBanco: $dadosUsuario['senha']);
            if ($isPasswordCorrect) {
                self::createAndPopulateLoginSingleton(data: $dadosUsuario);
                $createdToken = self::createToken(dadosUsuario: $dadosUsuario);
                echo $createdToken;
                exit();
            }
            http_response_code(response_code: 401); // SENHA INVÁLIDA!
            exit();
        } 
        http_response_code(response_code: 404); //E-mail não esta cadastrado no banco
        exit();
    }

    public static function createAndPopulateLoginSingleton($data): void{
        $login = LoginSingleton::getInstance();
        $login->setUserData(userData: $data);
        self::initializeSession(loginSingleton: $login);
    }

    public static function initializeSession($loginSingleton): void {
        session_start();
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

        $encodedPayload = JWT::encode(payload: $payload, key: $_ENV['KEY'], alg: "HS256");
        $encodedJson = json_encode(value: $encodedPayload);

        if (!$encodedJson) return "";
        return $encodedJson;
    }
}
