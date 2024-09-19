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
        $con = Conexao::getInstance()::getConexao();
        $query_result = $con->query($this->singleDataSql);
        return $query_result->fetch(mode: \PDO::FETCH_ASSOC);
    }

    public function getAllFromDb(): array
    {
        $con = Conexao::getInstance()::getConexao();
        $query_result = $con->query($this->allDataSql);
        return $query_result->fetchAll(mode: \PDO::FETCH_ASSOC);
    }
}
