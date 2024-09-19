<?php
namespace BilligKjop\Controller\Post;
use BilligKjop\Model\ProdutoModel;
use BilligKjop\Controller\Controller;

# Essa classe será utilizada apenas para salvar no banco as informações do Produto criado.

class PostProdutoController extends Controller
{ 
    public static function index(): void
    {
        $productModel = new ProdutoModel();
        if($productModel->create($_POST)) {
            echo "Produto criado com sucesso!";
        }
        echo "<br><br><a href='/register'>Voltar</a><br><br>";
    }
}
