<?php 
namespace BilligKjop\Model;
use BilligKjop\Model\Model;
use Config\Conexao;
use BilligKjop\Model\Checkers\UserChecker;
use BilligKjop\Enums\SqlErrorsCodeMessage;

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
        if (!UserChecker::checkInputs(postData: $postData)) {  // Email já cadastrado ou inputs inválidos (Nome deve conter apenas com letras e espaços)
            http_response_code(response_code: 400);
            return false;
        }

        $con = Conexao::getInstance()::getConexao();
        $preparedSql = $con->prepare(query: $this->createSql);
        $valuesAndTypes = [
            [$postData['email'], \PDO::PARAM_STR],
            [$this->encryptPassword(senha: $postData["senha"]), \PDO::PARAM_STR],
            [$postData["nome"], \PDO::PARAM_STR]
        ];
        $preparedSql = $this->bindValues(preparedSql: $preparedSql, valuesAndTypes: $valuesAndTypes);
        // Falta mandar imagem pro banco

        try {
            return $preparedSql->execute();
        } catch (\Exception $exception){
            http_response_code(response_code: 500);
            SqlErrorsCodeMessage::echoJsonErrorMessage(sqlErrorCode: $exception->getCode());
            exit();
        }
    }

    public function update(array $putData): bool {
        # Verifica se os novos VALORES são válidos
        if (UserChecker::checkInputs(postData:$putData)) {
            #   Caso valores válidos, atualizar string de SQL com informações passadas.
            $updateQuery = self::populateUpdateSql(putData: $putData);
            $con = Conexao::getInstance()::getConexao();
            $preparedSql = $con->prepare(query: $updateQuery);
            error_log(message: $updateQuery);
            
            try {
                header('Content-Type: application/json');
                $success = $preparedSql->execute();
                echo json_encode(['status' => true]);
            } catch (\Exception $e) {
                http_response_code(response_code: 500);
                SqlErrorsCodeMessage::echoJsonErrorMessage(sqlErrorCode: $e->getCode());
            }

            return $success;

        } else {
             #   Caso valores inválidos, cancelar operação.
            http_response_code(response_code: 400);
            echo json_encode(['status' => false]);
            return false;
        }
        # Retornar código de criação/atualização 200 OK e TOKEN com informações atualizadas.
    } 

    public function delete(array $deleteData): bool{
        $deleteQuery = "delete from usuario where usuario.email = '" . $deleteData["email"] . "'";
        error_log($deleteQuery);
        
        $con = Conexao::getInstance()::getConexao();
        $preparedSql = $con->prepare(query: $deleteQuery);
        try {
            header('Content-Type: application/json');
            $success = $preparedSql->execute();
            echo json_encode(['status' => true]);
        } catch (\Exception $e) {
            http_response_code(response_code: 500);
            SqlErrorsCodeMessage::echoJsonErrorMessage(sqlErrorCode: $e->getCode());
        }
        return $success;
    }

    public function encryptPassword($senha): string
    {
        $senhaCriptografada = password_hash(password: $senha, algo: PASSWORD_ARGON2ID);
        return $senhaCriptografada;
    }

    public function bindValues($preparedSql, array $valuesAndTypes) {
        $counter = 1;
        foreach ($valuesAndTypes as $valueAndType) {
            $preparedSql->bindValue(param: $counter, value: $valueAndType[0], type: $valueAndType[1]);
            $counter += 1;
        }
        return $preparedSql;
    }

    public static function populateUpdateSql($putData): string
    {
        $updateQuery = "UPDATE usuario SET ";
        foreach ($putData as $key => $attribute) {
            if ($key != "email") {
                $updateQuery .= "$key = '" . $attribute . "' ,";
            }
        }
        $updateQuery = substr(string: $updateQuery, offset: 0, length: -1);
        $updateQuery .= "WHERE usuario.email = '" . $putData["email"] . "'";
        return $updateQuery;
    }
}
