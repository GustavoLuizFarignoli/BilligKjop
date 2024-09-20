<?php

namespace BilligKjop\Controller\Get;
use BilligKjop\Controller\Controller;
use BilligKjop\Model\UserModel;

class GetUsuariosController extends Controller{
    public static function index(): void
    {
        echo self::getData();
        echo "<br><br><a href='/'>Voltar</a><br><br>";
    }

    public static function getData(){
        if (isset($_GET['id'])) {
            $usermodel = new UserModel(id: (int) $_GET['id']);
            $userdata = $usermodel->getByIdentifierFromDb();

            if ($userdata) return json_encode(
                value: [
                    "status" => 200,
                    "headers" => [
                        "Content-Type" => "application/json"
                    ],
                    "body" => [
                        "message" => "Usuario encontrado.",
                        "data" => $userdata
                    ]
                ]
            );

            return json_encode(
                value: [
                    "status" => 404,
                    "headers" => [
                        "Content-Type" => "application/json"
                    ],
                    "body" => [
                        "message" => "Usuario nao encontrado!",
                        "data" => null
                    ]
                ]
            );
        }

        $usermodel = new UserModel(-1);
        $userdata = $usermodel->getAllFromDb();

        return json_encode(
            value: [
                "status" => 200,
                "headers" => [
                    "Content-Type" => "application/json"
                ],
                "body" => [
                    "message" => "Lista de usuarios encontrados",
                    "data" => $userdata
                ]
            ]
        );
    }
}