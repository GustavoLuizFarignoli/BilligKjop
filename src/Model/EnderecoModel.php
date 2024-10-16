<?php
namespace BilligKjop\Model;

use BilligKjop\Enums\SqlErrorsCodeMessage;
use Config\Conexao;
use Exception;

class EnderecoModel extends Model
{
    protected string $allDataSql = "SELECT * FROM enderecos";
    protected string $createSql = "INSERT INTO enderecos (enderecos.cep, enderecos.rua, enderecos.numero, enderecos.cidade, enderecos.estado, enderecos.pais, enderecos.complemento) VALUES (?, ?, ?, ?, ?, ?, ?)";

    public function __construct(int $id = -1) {
        $this->singleDataSql = "SELECT * FROM enderecos WHERE enderecos.id_endereco = $id";
    }

    public function create(array $postData) : bool {
            $con = Conexao::getInstance()::getConexao();
            $preparedSql = $con->prepare(query: $this->createSql);
            $preparedSql->bindValue(param: 1, value: $postData["cep"], type: \PDO::PARAM_STR);
            $preparedSql->bindValue(param: 2, value: $postData["rua"], type: \PDO::PARAM_STR);
            $preparedSql->bindValue(param: 3, value: $postData["numero"], type: \PDO::PARAM_INT);
            $preparedSql->bindValue(param: 4, value: $postData["cidade"], type: \PDO::PARAM_STR);
            $preparedSql->bindValue(param: 5, value: $postData["estado"], type: \PDO::PARAM_STR);
            $preparedSql->bindValue(param: 6, value: $postData["pais"], type: \PDO::PARAM_STR);
            $preparedSql->bindValue(param: 7, value: $postData["complemento"], type: \PDO::PARAM_STR);
            
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

}