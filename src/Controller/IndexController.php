<?php
namespace BilligKjop\Controller;

class IndexController extends Controller
{ 
    public static function index(): void
    {
        require "View/index.html";
    }
}
