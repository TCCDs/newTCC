<?php
	//order_process.php
	session_start();

	$total_price = 0;
	$item_details = '';

    if(!empty($_SESSION["shopping_cart"])) {
		foreach($_SESSION["shopping_cart"] as $keys => $values) {
            $listaProdutos[] = array_map('utf8_encode', $values);
        }   
        echo json_encode($listaProdutos, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);   
    }
?>