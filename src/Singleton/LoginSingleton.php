<?php
namespace BilligKjop\Singleton; // "Quer dizer: /src/Singleton"
use Conexao\Conexao;

class LoginSingleton
{ 
    private static $instancia;
    private int $id;
    private String $nome;
    private String $email;
    private String $imagem;
    private int $idtipo;

    protected function __construct() {
        
    }

    public static function getInstance(): LoginSingleton
    {
        $cls = static::class;
        if (!isset(self::$instancia)) {
            self::$instancia = new self();
        }

        return self::$instancia;
    }

    public static function setUserData(array $userData) {
        $atual = self::$instancia;
        $atual->setId(id: $userData['id_usuario']);
        $atual->setNome(nome: $userData['nome']);
        $atual->setEmail(email: $userData['email']);
        //$login->setImagem(imagem: $dadosUsuario['imagem']);
        $atual->setTipo(tipo: $userData['id_tipo_usuario_FK']); //depois tem que alterar para poder loggar como vendedor
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function getTipo() {
        return $this->idtipo;
    }

    public function setTipo($tipo) {
        $this->idtipo = $tipo;
    }

    public static function HasIstance(){
        return self::$instancia;
    }

    // Método para impedir clonagem do objeto
    private function __clone() {}

    // Método para impedir desserialização do objeto
    public function __wakeup() {}

}
