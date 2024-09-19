<?php 
namespace BilligKjop\Singleton;
use BilligKjop\Classes\Produto;


class Carrinho
{ 
    private static $instances = [];
    
    private $produtos = [];
    
    protected function __construct()
    {

    }

    public static function getInstance(): Carrinho
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    public function getprodutos() {
        return $this->produtos;
    }

    public function limparcarrinho() {
        $this->instances = [];
    }

    public function addprod(Produto $produto) {
        $this->produtos[] = $produto;
    }

    public function removeprod(Produto $produto) {
        //remove produto
    }

    public function calcularTotal()
    {
        $total = 0;
        foreach ($this->getProdutos() as $produto) {
            $total += $produto->getPreco();
        }
        return $total;
    }
}
