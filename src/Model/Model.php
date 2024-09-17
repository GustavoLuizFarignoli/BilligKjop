<?php 
namespace BilligKjop\Model;
use BilligKjop\Conexao\Conexao;

abstract class Model
{ 
    protected string $sql;

    public function getFromDb()
    {
        $con = Conexao::getInstance();
        $query_result = $con->getConexao()->query($this->sql);
        return $query_result->fetch(mode: \PDO::FETCH_ASSOC);
    }
}
