<?php
namespace Config;
use Dotenv\Dotenv;
use Exception;

class Conexao
{ 
    private static ?Conexao $instance = null;
    private static ?\PDO $conexao = null;


    protected function __construct() {
    }

    public static function getInstance(): ?Conexao
    {
        if (self::$instance === null) {
            try {
                self::$instance = self::createInstance();
            } catch (Exception $e) {
                error_log(message: "Erro ao criar instância de conexão: " . $e->getMessage());
                return null;
            }
        }
        return self::$instance;
    }

    protected static function createInstance(): Conexao
    {
        $connectionSetted = self::setNewConnection();
        if (!$connectionSetted) {
            throw new Exception("Não foi possível criar a conexão com o banco!");
        }
        self::$instance = new self();
        return self::$instance;
    }

    public static function getConexao(): \PDO
    {
        if (!isset(self::$conexao)) {
            throw new Exception(message: "Conexão ainda não foi estabelecida.");
        }
        return self::$conexao;
    }

    public static function setNewConnection(): bool {
        self::loadDotEnv();
        $user = $_ENV["USER"];
        $pass = $_ENV["PASS"];
        $dbip = $_ENV["DBIP"];
        $dbname = $_ENV["DBNAME"];
        try {
            self::$conexao = new \PDO(dsn: "mysql:host=$dbip;dbname=$dbname", username: $user, password: $pass);
            return true;
        } catch (\PDOException $pdoException) {
            $errorMessage = "Erro ao criar conexão com banco de dados: " . $pdoException->getMessage();
            error_log(message: $errorMessage);
        } catch (Exception $exception) {
            $errorMessage = "Erro desconhecido: " . $exception->getMessage();
            error_log(message: $errorMessage);
        } finally {
            return false;
        }
    }

    public static function loadDotEnv(): void {
        $envPath = dirname(path: __DIR__, levels: 1);
        $dotenv = Dotenv::createImmutable($envPath);
        $dotenv->safeLoad();
    }
}
