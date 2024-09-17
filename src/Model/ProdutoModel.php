<?php namespace Controller;

use Model;

class ProdutoModel extends Model
{
    protected function __construct() {
        $this->sql = "SELECT * FROM produto WHERE produto.id = 'id'";
    }

    public static function index()
    {
        
    }
}
?>