<?php 

class Usuario
{
    private string $name;
    private string $senha;
    private string $email;
    private int $id;
    private int $idtipo;

    public function __construct($name,$senha,$email)
    {
        $this->name = $name;
        $this->senha = $senha;
        $this->email = $email;
    }

    public function setid (int $id){
        $this->id = $id;
    }

    public function settipo (int $idtipo){
        $this->idtipo = $idtipo;
    }

    public function getemail(){
        return $this->email;
    }


}

?>