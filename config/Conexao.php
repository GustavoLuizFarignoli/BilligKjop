<?php namespace Billig\Conexao;

class Conexao
{ 
    private static $instances = [];
    
    private String $conexao;

    protected function __construct() { }

    public static function getInstance(): Conexao
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
            self::$instances[$cls]::createConexao();
        }

        return self::$instances[$cls];
    }

    public function getConexao() {
        return self::$conexao;
    }

    public static function createConexao() {
        $user = "guga";
        $pass = "billig9";
        $dbname = "billigkjop";
        $dbip = "localhost";
        try {
            self::$conexao = new \PDO("mysql:host=$dbip;dbname=$dbname", $user, $pass);
            return true;
        } catch (\Exception $e) {
            return false;
        }
        return false;
    }
}

/*function TestCode()
{
    $s1 = Conexao::getInstance();
    $s2 = Conexao::getInstance();

    if ($s1 === $s2) {
        echo "Conexão deu boa";
        
    } else {
        echo "Conexão deu ruim";
    }
}

TestCode();*/
?>