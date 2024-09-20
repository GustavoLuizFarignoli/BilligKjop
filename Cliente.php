<?php 

Class Cliente extends Usuario {

    private string $cpf;

    public function __construct($name,$senha,$email,$cpf)
    {
        $this->name = $name;
        $this->senha = $senha;
        $this->email = $email;
        $this->cpf = $cpf;
    }

    public function displayinformation()
    {
        echo "Nome: " + $this->name;
        echo "Email: " + $this->email;
        echo "CPF: " + $this->cpf; 
    }
}

?>