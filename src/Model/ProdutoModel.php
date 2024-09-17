<?php 
namespace BilligKjop\Model;
use BilligKjop\Model\Model;

class ProdutoModel extends Model
{
    protected string $allDataSql = "SELECT * FROM produtos";

    public function __construct(int $id) {
        $this->singleDataSql = "SELECT * FROM produtos WHERE produtos.id = $id";
    }
}
