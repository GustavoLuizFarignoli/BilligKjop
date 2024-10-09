<?php
namespace BilligKjop\Facades;
use BilligKjop\Model\UserModel;
use BilligKjop\Singleton\LoginSingleton;

class Facade_Login {

    public static function index(): void {
        self::Loggar(email: $_POST['email'], senhaInserida: $_POST['senha']);
    }

    public static function Loggar($email, $senhaInserida): void{
        $dadosUsuario = new UserModel(email: $email);
        $dadosUsuario = $dadosUsuario->getByIdentifierFromDb();
        error_log("Entrou no Facade_Login");
        
        if ($dadosUsuario) {
            $isPasswordCorrect = self::verifyUserPassword(senhaInserida: $senhaInserida, senhaBanco: $dadosUsuario['senha']);
            if ($isPasswordCorrect) {
                $login = LoginSingleton::getInstance();
                $login->setUserData(userData: $dadosUsuario);
                self::initializeSession(loginSingleton: $login);
                error_log("Logado com Sucesso");
                var_dump($login);
                echo "<br><br>Nome do usuario: " . $login->getNome();
                echo "<br><br><a href='/api'>Voltar</a><br><br>";
                exit();
            }
            error_log("Senha Incorreta, tente novamente");
            exit();
        } 
        error_log("Conta não cadastrada, Gostaria de Fazer seu Cadastro ?<br><a href='/register_usuario'>Registre-se aqui!</a>");
        exit();
    }

    public static function initializeSession($loginSingleton) {
        session_start();
        $_SESSION['login'] = $loginSingleton;
    }

    public static function verifyUserPassword($senhaInserida, $senhaBanco): bool {
        $correctPassword = password_verify(password: $senhaInserida, hash: $senhaBanco ?? '');
        return $correctPassword;
    }
}
