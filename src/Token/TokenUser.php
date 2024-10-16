<?php
namespace BilligKjop\Token;
use BilligKjop\Model\UserModel;
use BilligKjop\Singleton\LoginSingleton;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(path: __FILE__, levels: 3));
$dotenv->load();

class TokenUser {
    const HOURS_TO_EXPIRE = 0.25/60 * 3600;

    public static function createTokenFromEmail($email): void{
        $dadosUsuario = new UserModel(email: $email);
        $dadosUsuario = $dadosUsuario->getByIdentifierFromDb();

        if (!$dadosUsuario) {
            http_response_code(response_code: 404);
            echo json_encode(["status" => false]);
            exit();
        }
        
        $createdToken = self::createToken(dadosUsuario: $dadosUsuario);
        
        if ($createdToken === "") {
            http_response_code(404);
            echo json_encode(["status" => false]);
            exit();
        }
        
        http_response_code(response_code: 200);
        header('Content-Type: application/json');
        echo json_encode(["status" => true, 'token' => $createdToken]);
        exit();
    }


    public static function createToken($dadosUsuario): string {
        $payload = [
            "exp" => time() + self::HOURS_TO_EXPIRE,
            "iat" => time(),
            "nome" => $dadosUsuario['nome'],
            "email" => $dadosUsuario['email'],
            "tipo" => $dadosUsuario['id_tipo_usuario_FK'],
            "id" => $dadosUsuario['id_usuario']
        ];

        error_log(message: 'Chave Token: ' . $_ENV['KEY']); // Apenas para ver a KEY usada para token
        $encodedPayload = JWT::encode(payload: $payload, key: $_ENV['KEY'], alg: "HS256");
        //$encodedJson = json_encode(value: $encodedPayload);

        return !$encodedPayload ? "" : $encodedPayload;
    }
}
