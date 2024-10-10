<?php
namespace BilligKjop\Controller;
use BilligKjop\Facades\Facade_Login;

class LoginController extends Controller
{ 
    public static function index(): void
    {
        $data = self::json_decode_body();
        $facadelogin = new Facade_Login();
        $email = $data['email'];
        $senha = $data['senha'];
        $facadelogin::Loggar(email: $email,senhaInserida: $senha);
    }
}
