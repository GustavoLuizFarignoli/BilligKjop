<?php 
namespace BilligKjop\Model;
use BilligKjop\Model\Model;
use Config\Conexao;
use BilligKjop\Model\Checkers;
use BilligKjop\Model\Checkers\ProdutoChecker;
use BilligKjop\Enums\SqlErrorsCodeMessage;
use Exception;

class ProdutoModel extends Model
{
    protected string $allDataSql = "SELECT * FROM produtos";
    protected string $createSql = "INSERT INTO produtos (produtos.nome, produtos.descricao, produtos.preco, produtos.id_usuario_FK) VALUES (?, ?, ?, ?)";

    public function __construct(int $id = -1) {
        $this->singleDataSql = "SELECT * FROM produtos WHERE produtos.id = $id";
    }

    public function create(array $postData) : bool {
        if (ProdutoChecker::checkInputs(postData: $postData)) {
            $con = Conexao::getInstance()::getConexao();
            $preparedSql = $con->prepare(query: $this->createSql);
            $preparedSql->bindValue(param: 1, value: $postData["nome"], type: \PDO::PARAM_STR);
            $preparedSql->bindValue(param: 2, value: $postData["descricao"], type: \PDO::PARAM_STR);
            $preparedSql->bindValue(param: 3, value: $postData["preco"], type: \PDO::PARAM_STR);
            $preparedSql->bindValue(param: 4, value: $postData["id_usuario"], type: \PDO::PARAM_INT);
            //$preparedSql->bindValue(param: 4, value: 1, type: \PDO::PARAM_INT);
            
            try {
                $success = $preparedSql->execute();
                header('Content-Type: application/json');
                echo json_encode(['status' => $success]);
            } catch(Exception $e){
                SqlErrorsCodeMessage::echoJsonErrorMessage(sqlErrorCode: $e->getCode());
                return false;
            }
            return $success;

        }
        //error_log("Verifique se o preco está entre R$ 1 e 1 bilhão! E o nome não contenha caracteres especiais.");
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => "Verifique se o preco está entre R$ 1 e 1 bilhão! E o nome não contenha caracteres especiais."]);
        return false;
    }
}
