<?php
namespace BilligKjop\Controller\Post;
use BilligKjop\Model\EnderecoModel;
use BilligKjop\Controller\Controller;

# Essa classe será utilizada apenas para salvar no banco as informações do Produto criado.

class PostEnderecoController extends Controller
{ 
    public static function index(): void
    {
        $EnderecoModel = new EnderecoModel();
        if ($EnderecoModel->create($_POST)) {
            echo "endereco adicionado com sucesso!";
        }
        echo "<br><br><a href='/'>Voltar</a><br><br>";
    }
}