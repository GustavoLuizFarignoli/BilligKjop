<?php
namespace BilligKjop\Controller;

class RegistroUsuarioController extends Controller
{ 
    public static function index(): void
    {
        require "View/create_user.html";
    }
}
