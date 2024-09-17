<?php
namespace BilligKjop\Controller;
use BilligKjop\Model\ProdutoModel;

class SaveProdutoController extends Controller
{ 
    public static function index()
    {
        var_dump(value: $_POST);
        echo "<br><br><a href='/register'>Voltar</a>";
    }
}
