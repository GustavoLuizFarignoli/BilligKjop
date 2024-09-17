<?php namespace Controller;

class RegistroController
{ 

    protected function __construct() { }

    public static function index()
    {
        require("../View/register_form.html");
    }
}
?>