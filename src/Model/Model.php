<?php 
namespace BilligKjop\Model;
use Config\Conexao;

abstract class Model
{ 
    protected string $singleDataSql;
    protected string $allDataSql;

    public abstract function create(array $postData): bool;

    public function getByIdentifierFromDb()
    {
        try {
            $con = Conexao::getInstance()::getConexao();
            $query_result = $con->query($this->singleDataSql);
            return $query_result->fetch(mode: \PDO::FETCH_ASSOC);
        } catch (\PDOException $pdoException) {
            error_log(message: "Model não conseguiu criar a conexão: " . $pdoException->getMessage());
        } catch (\Exception $exception) {
            error_log(message: "Erro desconhecido: " . $exception->getMessage());
        } finally {
            throw new \Exception(message: "O modelo não conseguiu criar a conexão!");
        }
    }

    public function getAllFromDb(): array
    {
        try {
            $con = Conexao::getInstance()::getConexao();
            $query_result = $con->query($this->allDataSql);
            return $query_result->fetchAll(mode: \PDO::FETCH_ASSOC);
        } catch (\PDOException $pdoException) {
            error_log(message: "Model não conseguiu criar a conexão: " . $pdoException->getMessage());
        } catch (\Exception $exception) {
            error_log(message: "Erro desconhecido: " . $exception->getMessage());
        } finally {
            throw new \Exception(message: "O modelo não conseguiu criar a conexão!");
        }
    }
}
