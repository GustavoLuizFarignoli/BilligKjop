<?php namespace BilligKjop\Conexao;

class Conexao
{ 
    private static $instances = [];
    
    private \PDO $conexao;

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
        $user = "gb";
        $pass = "******";
        $dbname = "billigkjop";
        $dbip = "localhost";
        try {
            self::$conexao = new \PDO(dsn: "mysql:host=$dbip;dbname=$dbname", username: $user, password: $pass);
            return true;
        } catch (\Exception $e) {
            return false;
        }
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
