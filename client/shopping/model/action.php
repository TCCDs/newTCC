<?php
 //action.php

include_once '../../../server/conexao.php';

if(isset($_POST["product_id"])) {
     //adicionar Produtos
     if($_POST["action"] == "add") {
          if(isset($_COOKIE["shopping_cart"])) {
               $is_available = 0;
               $cookie_carrinho = stripslashes($_COOKIE['shopping_cart']);
               $cart_carrinho = json_decode($cookie_carrinho, true);

               foreach($cart_carrinho as $keys => $values) {
                    if($cart_carrinho[$keys]['product_id'] == $_POST["product_id"]) {
                         $is_available++;
                         $cart_carrinho[$keys]['product_quantity'] = $cart_carrinho[$keys]['product_quantity'] + $_POST["product_quantity"];
                    }
               }

               if($is_available < 1) {
                    $item_array = array(
                         'product_id'          =>     $_POST["product_id"],
                         'product_name'        =>     $_POST["product_name"],
                         'product_price'       =>     $_POST["product_price"],
                         'product_quantity'    =>     $_POST["product_quantity"]
                    );
                    $cart_carrinho[] = $item_array;
               }

          } else {
               $item_array = array(
                    'product_id'           =>     $_POST["product_id"],
                    'product_name'         =>     $_POST["product_name"],
                    'product_price'        =>     $_POST["product_price"],
                    'product_quantity'     =>     $_POST["product_quantity"]
               );
               $cart_carrinho[] = $item_array;
          }

          $item_carrinho = json_encode($cart_carrinho);
          setcookie('shopping_cart', $item_carrinho, time() + (86400 * 30));
     }


     // deletar produtos
     if($_POST["action"] == "remove") {
          $cookie_carrinho = stripslashes($_COOKIE['shopping_cart']);
          $cart_carrinho = json_decode($cookie_carrinho, true);

          foreach($cart_carrinho as $keys => $values) {
               if($values["product_id"] == $_POST["product_id"])  {
                    unset($cart_carrinho[$keys]);

                    $item_carrinho = json_encode($cart_carrinho);
                    setcookie('shopping_cart', $item_carrinho, time() + (86400 * 30));
                    $message = '<label class="text-success">Product Removed</label>';
               }
          }
     }


     //quantidade
     if($_POST["action"] == "quantity_change") {
          $cookie_carrinho = stripslashes($_COOKIE['shopping_cart']);
          $cart_carrinho = json_decode($cookie_carrinho, true);

          foreach($cart_carrinho as $keys => $values) {
               if($cart_carrinho[$keys]['product_id'] == $_POST["product_id"]) {
                    $cart_carrinho[$keys]['product_quantity'] = $_POST["quantity"];

                    $item_carrinho = json_encode($cart_carrinho);
                    setcookie('shopping_cart', $item_carrinho, time() + (86400 * 30));
               }
          }
     }

     if(!empty($cart_carrinho)) {
          foreach($cart_carrinho as $keys => $values) {
               $listarProdutosCompra[] = array_map('utf8_encode', $cart_carrinho[$keys]);
          }
     }
     echo json_encode($listarProdutosCompra);
}

 ?>
