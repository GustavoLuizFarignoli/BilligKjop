<?php

class Vendedor extends Usuario{

    private string $cnpj;

    public function __construct($name,$senha,$email,$cnpj)
    {
        $this->name = $name;
        $this->senha = $senha;
        $this->email = $email;
        $this->cnpj = $cnpj;
    }

    public function displayinformation()
    {
        echo "Nome: " + $this->name;
        echo "Email: " + $this->email;
        echo "Cnpj: " + $this->cnpj;
    }
}

?>