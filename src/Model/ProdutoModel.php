<?php 
namespace BilligKjop\Model;
use BilligKjop\Model\Model;

class ProdutoModel extends Model
{
    protected function __construct(int $id) {
        $this->sql = "SELECT * FROM produtos WHERE produtos.id = $id";
    }
}
