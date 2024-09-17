<?php
require 'Produto.php';
require 'Singlenton/Carrinho.php';
require 'Facade_Carrinho.php';
// Criando alguns produtos
$produto1 = new Produto("Produto 1", 100);
$produto2 = new Produto("Produto 2", 200);
$produto3 = new Produto("Produto 3", 150);

// Criando o carrinho e adicionando os produtos
$carrinho = Carrinho::getInstance();
$carrinho->addprod($produto1);
$carrinho->addprod($produto2);
$carrinho->addprod($produto3);

echo "Total do carrinho: " . $carrinho->calcularTotal($carrinho);
