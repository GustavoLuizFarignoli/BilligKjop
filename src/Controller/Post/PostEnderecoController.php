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
        $enderecoData = self::json_decode_body();
        if ($EnderecoModel->create($enderecoData)) {
            error_log("endereco adicionado com sucesso!");
        }
    }
}