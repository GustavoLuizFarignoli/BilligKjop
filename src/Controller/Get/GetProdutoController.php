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
        echo "<br><br><a href='/api'>Voltar</a><br><br>";
    }

    public static function getData()
    {
        # Caso o usuário tenha inserido um id na busca, será retornado os dados referentes à esse registro
        # recuperados do banco de dados SE o produto existir. SE o produto não existe ainda no banco, será
        # retornada a mensagem "Produto nao encontrado".

        # Caso o usuário não insira um id na busca, será retonado uma lista com todos os dados que estão
        # no banco de dados referentes à produtos.
        $userSearchedForSpecificId = isset($_GET['id']);

        if ($userSearchedForSpecificId) {
            try {
                self::getDataByProdutoId(productId: $_GET['id']);
            } catch (\Exception $exception) {
                error_log(message: "[ERRO]: " . $exception->getMessage());
            }
            exit();
        } else {
            try {
                self::getAllProductData();
            } catch (\Exception $exception) {
                error_log(message: "[ERRO]: " . $exception->getMessage());
            }
        }
    }

    public static function getAllProductData() {
        $produtoModel = new ProdutoModel(-1);
        $productData = $produtoModel->getAllFromDb();

        http_response_code(response_code: 200);
        $responseBodyJson = json_encode(value: [ "message" => "Lista de produtos encontrados", "data" => $productData ]);
        return $responseBodyJson;
    }

    public static function getDataByProdutoId($productId) {
        $productModel = new ProdutoModel(id: (int) $productId);
        $productData = $productModel->getByIdentifierFromDb();

        if ($productData) {
            http_response_code(response_code: 200);
            $responseBodyJson = json_encode(value: [ "message" => "Produto encontrado.", "data" => $productData ]);
            return $responseBodyJson;
        } else {
            http_response_code(response_code: 404);
            $responseBodyJson = json_encode(value: ["message" => "Produto nao encontrado!", "data" => null]);
            return $responseBodyJson;
        }

    }
}
