<?php
    $cookie_carrinho = stripslashes($_COOKIE['shopping_cart']);
    $cart_carrinho = json_decode($cookie_carrinho, true);
    
    if(!empty($cart_carrinho)) {  
        foreach($cart_carrinho as $keys => $values) {  
            $listarProdutosCompra[] = array_map('utf8_encode', $cart_carrinho[$keys]);
        }
    }
       echo json_encode($listarProdutosCompra);
?>