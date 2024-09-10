<?php 

class Login
{ 
    private static $instances = [];
    
    private $produtos = [];

    protected function __construct() { }

    public static function getInstance(): Login
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    public function getemai() {
        return $this->produtos;
    }

    public function addprod($produto) {
        array_push($this->produtos, $produto);
    }

    public function removeprod($produto) {
        array_push($this->produtos, $produto);
    }
}
?>