<?php 
namespace BilligKjop\Model;
use BilligKjop\Model\Model;

class UserModel extends Model
{
    protected string $allDataSql = "SELECT * FROM users";
    
    public function __construct(int $id = -1, string $email = '') {
        if ($email != '') {
            $this->singleDataSql = "SELECT * FROM users WHERE users.email = '$email'";
        } else if ($id != -1) {
            $this->singleDataSql = "SELECT * FROM users WHERE users.id = $id";
        }
    }

    public function create(array $postData):bool {
        return true;
    }
}
