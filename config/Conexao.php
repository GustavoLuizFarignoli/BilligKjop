<?php
namespace Config;

class Conexao
{ 
    private static $instance;
    
    private static \PDO $conexao;

    protected function __construct() { }

    public static function getInstance(): Conexao
    {
        if (isset(self::$instance)) return self::$instance;
        return self::createInstance();
    }

    protected static function createInstance(): Conexao
    {
        $cls = static::class;
        self::$instance = new $cls();
        self::$instance::createConexao();
        return self::$instance;
    }

    public static function getConexao(): \PDO {
        return self::$conexao;
    }

    public static function createConexao(): bool {
        $user = "gb";
        $pass = "mysql@204";
        $dbname = "billigkjop";
        $dbip = "localhost";
        try {
            self::$conexao = new \PDO(dsn: "mysql:host=$dbip;dbname=$dbname", username: $user, password: $pass);
            return true;
        } catch (\PDOException $e) {
            error_log(message: "Erro de conexão ao banco de dados: " . $e->getMessage());
            return false;
        }
    }
}
