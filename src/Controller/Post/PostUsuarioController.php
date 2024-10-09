<?php
namespace BilligKjop\Controller\Post;
use BilligKjop\Model\UserModel;
use BilligKjop\Controller\Controller;
use BilligKjop\Facades\Facade_Login;

class PostUsuarioController extends Controller
{ 
    public static function index(): void
    {
        $userModel = new UserModel();
        $data = self::json_decode_body();
        if ($userModel->create($data)) {
            //echo "Usuario criado com sucesso!";
            $facadelogin = new Facade_Login();
            $email = $data['email'];
            $senha = $data['senha'];
            $facadelogin::Loggar($email,$senha);
        }
        echo "<br><br><a href='/'>Voltar</a><br><br>";
    }
}
