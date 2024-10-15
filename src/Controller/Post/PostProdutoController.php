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
        $productData = self::json_decode_body();
        if($productModel->create(postData: $productData)) {
            error_log("Produto criado com sucesso!");
        }
    }
}
