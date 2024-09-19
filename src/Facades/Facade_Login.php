<?php
namespace BilligKjop\Facades;
use BilligKjop\Singleton\LoginSingleton;

class Facade_Login {

    public function Loggar($email): void{
        $login = LoginSingleton::getInstance();
        $login->setEmail(email: $email);
    }
}
