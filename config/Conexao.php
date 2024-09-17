<?php 

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
        }

        return self::$instances[$cls];
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function createConexao() {
        $user = "guga";
        $pass = "billig9";
        $dbname = "billigkjop";
        $dbip = "localhost";
        try {
            return $this->conexao = new PDO("mysql:host=$dbip;dbname=$dbname", $user, $pass);
        } catch (Exception $e) {
            echo "Não foi possível conectar-se ao banco!";
        }
        return null;
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