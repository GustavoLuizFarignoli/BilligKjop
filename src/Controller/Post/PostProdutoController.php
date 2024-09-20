<?php
namespace BilligKjop\Controller\Post;
use BilligKjop\Model\ProdutoModel;
use BilligKjop\Controller\Controller;

# Essa classe será utilizada apenas para salvar no banco as informações do Produto criado.

class PostProdutoController extends Controller
{ 
    public static function index(): void
    {
        session_start();
        $productModel = new ProdutoModel();
        $_POST['id_usuario'] = $_SESSION['login']->getId();
        if($productModel->create(postData: $_POST)) {
            echo "Produto criado com sucesso!";
        }
        echo "<br><br><a href='/'>Voltar</a><br><br>";
    }
}
