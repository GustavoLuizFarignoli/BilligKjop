<?php 

abstract class Usuario
{
    protected string $name;
    protected string $senha;
    protected string $email;

    public function __construct($name,$senha,$email)
    {
        $this->name = $name;
        $this->senha = $senha;
        $this->email = $email;
    }

    public abstract function displayinformation();



}

?>