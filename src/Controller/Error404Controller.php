<?php
namespace BilligKjop\Controller;

class Error404Controller extends Controller
{
    public static function index()
    {
        http_response_code(404);
    }
}