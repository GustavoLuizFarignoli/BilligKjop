<?php
namespace BilligKjop\Controller;

class RegistroController extends Controller
{ 
    public static function index(): void
    {
        require "View/create_product.html";
    }
}
