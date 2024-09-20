<?php
namespace BilligKjop\Controller;

class LoginController extends Controller
{ 
    public static function index(): void
    {
        require "View/login.html";
    }
}
