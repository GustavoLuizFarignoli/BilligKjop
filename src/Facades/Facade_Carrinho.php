<?php 
namespace BilligKjop\Facades;
use BilligKjop\Singleton\Carrinho;

Class Facade_Carrinho{

    public function Checkout(Carrinho $carrinho){
        $produtos = $carrinho->getProdutos();
        if (empty($produtos)) {
            echo "O carrinho está vazio. Não é possível realizar o checkout.";
            return;
        }
        echo "Resumo da compra:\n";
        foreach ($produtos as $produto) {
            echo $produto->getNome() . " - R$ " . number_format($produto->getPreco(), 2, ',', '.') . "\n";
        }
        $total = $carrinho->calcularTotal();
        echo "\nTotal: R$ " . number_format($total, 2, ',', '.') . "\n";
        //envia para a classe que for lidar com o pagamento
        $carrinho->limparcarrinho();
    }
}
?>