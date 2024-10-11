<?php
namespace BilligKjop\Controller\Put;
use BilligKjop\Model\UserModel;
use BilligKjop\Controller\Controller;
use BilligKjop\Facades\Facade_Login;

class PutUsuarioController extends Controller
{ 
    public static function index(): void
    {
        $userModel = new UserModel();
        $userNewDataAssoc = self::json_decode_body();
        error_log(implode($userNewDataAssoc));
        if (!empty($userNewDataAssoc)) {
            $userModel->update(putData: $userNewDataAssoc);
        }

        /*if ($userModel->create(postData: $data)) {
            $facadelogin = new Facade_Login();
            $email = $data['email'];
            $senha = $data['senha'];
            $facadelogin::createLoginToken(email: $email, senhaInserida: $senha);
        }*/
    }
}
