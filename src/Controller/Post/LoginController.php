<?php
namespace BilligKjop\Controller\Post;
use BilligKjop\Facades\Facade_Login;
use BilligKjop\Controller\Controller;

class LoginController extends Controller
{ 
    public static function index(): void
    {
        $data = self::json_decode_body();
        $facadelogin = new Facade_Login();
        $email = $data['email'];
        $senha = $data['senha'];
        $facadelogin::createLoginToken(email: $email, senhaInserida: $senha);
    }
}
