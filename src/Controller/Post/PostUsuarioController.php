<?php
namespace BilligKjop\Controller\Post;
use BilligKjop\Model\UserModel;
use BilligKjop\Controller\Controller;
use BilligKjop\Facades\Facade_Login;

# Essa classe será utilizada apenas para salvar no banco as informações do Produto criado.

class PostUsuarioController extends Controller
{ 
    public static function index(): void
    {
        $userModel = new UserModel();
        if ($userModel->create($_POST)) {
            echo "Usuario criado com sucesso!";
            $facadelogin = new Facade_Login();
            $email = $_POST['email'];
        }
        echo "<br><br><a href='/'>Voltar</a><br><br>";
    }
}
