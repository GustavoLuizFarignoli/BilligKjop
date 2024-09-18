<?php
namespace BilligKjop\Controller;

class Error404Controller extends Controller
{
    public static function index(): void
    {
        http_response_code(response_code: 404);
    }
}