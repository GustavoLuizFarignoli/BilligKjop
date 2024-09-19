<?php 
namespace BilligKjop\Model;
use BilligKjop\Model\Model;
use Config\Conexao;
use BilligKjop\Model\Checkers\UserChecker;

class UserModel extends Model
{
    protected string $allDataSql = "SELECT * FROM users";
    protected string $createSql = "INSERT INTO users (users.name, users.email) VALUES (?, ?)";
    
    public function __construct(int $id = -1, string $email = '') {
        if ($email != '') {
            $this->singleDataSql = "SELECT * FROM users WHERE users.email = '$email'";
        } else if ($id != -1) {
            $this->singleDataSql = "SELECT * FROM users WHERE users.id = $id";
        }
    }

    public function create(array $postData) : bool {
        if (UserChecker::checkInputs($postData)) {

            $con = Conexao::getInstance()::getConexao();
            $preparedSql = $con->prepare(query: $this->createSql);
            $preparedSql->bindValue(param: 1, value: $postData["nome"], type: \PDO::PARAM_STR);
            $preparedSql->bindValue(param: 2, value: $postData["email"], type: \PDO::PARAM_STR);
            return $preparedSql->execute();

        }
        echo "Email já cadastrado ou inputs inválidos (Nome deve conter apenas com letras e espaços)";
        return false;
        
    }
}
