<?php
namespace BilligKjop\Controller;
use BilligKjop\Facades\Facade_Login;

abstract class Controller
{

    public abstract static function index(): void;
    public static bool $needLogin;
    /*public abstract static function indexBody(): void;

    public static function index(bool $needLogin): void {

        if ($needLogin && isset($_SESSION['login'])) {
            self::indexBody();
        } else {
            Error404Controller::indexBody();
        }
    }*/

    public static function IsLogged($idWanted = 0): bool {
        session_start();
        if (!isset($_SESSION['login'])) {
            echo "Você precisa estar logado para acessar essa página";
            return false;
        }
        $login = $_SESSION['login'];
        if (!($idWanted == 0 || $login->getTipo() == $idWanted)){
            echo "Você não está autorizado acessar essa página";
            return false;
        }
        return true;
    }
}
