<?php 
namespace BilligKjop\Model;
use BilligKjop\Model\Model;
use Config\Conexao;
use BilligKjop\Model\Checkers\UserChecker;

class UserModel extends Model
{
    protected string $allDataSql = "SELECT id_usuario, email, nome, imagem, id_tipo_usuario_FK FROM usuario;";
    protected string $createSql = "INSERT INTO usuario (usuario.email, usuario.senha, usuario.nome, usuario.imagem, usuario.id_tipo_usuario_FK) values (?, ?, ?, 'pasta/twitter.jpg', 1);";
    
    public function __construct(int $id = -1, string $email = '') {
        if ($email != '') {
            $this->singleDataSql = "SELECT * FROM usuario WHERE usuario.email = '$email'";
        } else if ($id != -1) {
            $this->singleDataSql = "SELECT * FROM usuario WHERE usuario.id_usuario = $id";
        }
    }

    public function create(array $postData) : bool {
        if (UserChecker::checkInputs($postData)) {

            $con = Conexao::getInstance()::getConexao();
            $preparedSql = $con->prepare(query: $this->createSql);
            $preparedSql->bindValue(param: 1, value: $postData["email"], type: \PDO::PARAM_STR);
            $preparedSql->bindValue(param: 2, value: $this->encryptPassword(senha: $postData["senha"]), type: \PDO::PARAM_STR);
            $preparedSql->bindValue(param: 3, value: $postData["nome"], type: \PDO::PARAM_STR);
            //falta mandar imagem pro banco
            return $preparedSql->execute();

        }
        echo "Email já cadastrado ou inputs inválidos (Nome deve conter apenas com letras e espaços)";
        return false;
        
    }

    public function encryptPassword($senha): string
    {
        $senhaCriptografada = password_hash(password: $senha, algo: PASSWORD_ARGON2ID);
        return $senhaCriptografada;
    }
}
