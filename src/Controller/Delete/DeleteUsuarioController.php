<?php
namespace BilligKjop\Controller\Delete;
use BilligKjop\Model\UserModel;
use BilligKjop\Controller\Controller;

class DeleteUsuarioController extends Controller
{ 
    public static function index(): void
    {
        $userModel = new UserModel();
        $userDeleteDataAssoc = self::json_decode_body();
        error_log(implode($userDeleteDataAssoc));
        if (!empty($userDeleteDataAssoc)) {
            $userModel->delete(deleteData: $userDeleteDataAssoc);
        }

        /*if ($userModel->create(postData: $data)) {
            $facadelogin = new Facade_Login();
            $email = $data['email'];
            $senha = $data['senha'];
            $facadelogin::createLoginToken(email: $email, senhaInserida: $senha);
        }*/
    }
}
