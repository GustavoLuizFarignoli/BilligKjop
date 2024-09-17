<?php
use Conexao;
abstract class Model
{ 
    protected string $sql;

    public function getFromDb()
    {
        $con = Conexao::getInstance();
        $query_result = $con->query($this->sql);
        return $query_result->fetch(\PDO::FETCH_ASSOC);
    }
}
