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
        $data = self::decode();
        if ($userModel->create($data)) {
            //echo "Usuario criado com sucesso!";
            $facadelogin = new Facade_Login();
            $email = $data['email'];
        }
        echo "<br><br><a href='/'>Voltar</a><br><br>";
    }
}
