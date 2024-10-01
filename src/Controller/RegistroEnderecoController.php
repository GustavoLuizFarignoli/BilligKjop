<?php
namespace BilligKjop\Controller;

class RegistroEnderecoController extends Controller
{ 
    public static function index(): void
    {
        require "View/create_endereco.html";
    }
}