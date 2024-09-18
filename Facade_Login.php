<?php 

Class Facade_Login{

    public function Cadastro($name,$senha,$email){
        $usuario = new Usuario($name,$senha,$email);
        //envia usuário para o banco
        $login = Login::getInstance();
        $login->setEmail($usuario->getemail());
    }
}


?>