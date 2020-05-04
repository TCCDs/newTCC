<?php
    include '../../../server/conexao.php';

    $cookie_carrinho = stripslashes($_COOKIE['shopping_cart']);
    $cart_carrinho = json_decode($cookie_carrinho, true);


    if(isset($cart_carrinho )) {
        $qtdProdutos = count($cart_carrinho );
    } else {
        $qtdProdutos =  '0';
    }

    echo json_decode($qtdProdutos);
?>
