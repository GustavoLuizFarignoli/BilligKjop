<?php
namespace BilligKjop\Controller\Get;
use BilligKjop\Model\ProdutoModel;
use BilligKjop\Controller\Controller;

# Essa classe será utilizada apenas para retornar as informações do Produto buscado.

class GetProdutoController extends Controller 
{ 
    public static function index(): void
    {
        echo self::getData();
        echo "<br><br><a href='/'>Voltar</a><br><br>";
    }

    public static function getData()
    {
        # Caso o usuário tenha inserido um id na busca, será retornado os dados referentes à esse registro
        # recuperados do banco de dados SE o produto existir. SE o produto não existe ainda no banco, será
        # retornada a mensagem "Produto nao encontrado".

        # Caso o usuário não insira um id na busca, será retonado uma lista com todos os dados que estão
        # no banco de dados referentes à produtos.
        if (isset($_GET['id'])) {
            $productModel = new ProdutoModel(id: (int) $_GET['id']);
            $productData = $productModel->getByIdentifierFromDb();

            if ($productData) return json_encode(
                value: [
                    "status" => 200,
                    "headers" => [
                        "Content-Type" => "application/json"
                    ],
                    "body" => [
                        "message" => "Produto encontrado.",
                        "data" => $productData
                    ]
                ]
            );

            return json_encode(
                value: [
                    "status" => 404,
                    "headers" => [
                        "Content-Type" => "application/json"
                    ],
                    "body" => [
                        "message" => "Produto nao encontrado!",
                        "data" => null
                    ]
                ]
            );
        }

        $produtoModel = new ProdutoModel(-1);
        $productData = $produtoModel->getAllFromDb();

        return json_encode(
            value: [
                "status" => 200,
                "headers" => [
                    "Content-Type" => "application/json"
                ],
                "body" => [
                    "message" => "Lista de produtos encontrados",
                    "data" => $productData
                ]
            ]
        );
    }
}
