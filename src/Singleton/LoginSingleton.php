<?php
namespace BilligKjop\Singleton; // "Quer dizer: /src/Singleton"
use Conexao\Conexao;

class LoginSingleton
{ 
    private static $instances = [];
    
    private String $email;

    protected function __construct() {
        
    }

    public static function getInstance(): LoginSingleton
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public static function HasIstance(){
        return self::$instances;
    }
}
