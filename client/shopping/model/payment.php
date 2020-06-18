<?php
	//payment.php

	//include('database_connection.php');
	$connect = new PDO("mysql:host=localhost;dbname=new_shopping", "root", "");

	session_start();

if(isset($_POST["token"])) {

	require_once '../../../vendor/autoload.php';

	\Stripe\Stripe::setApiKey('sk_test_L4OlaLFVannSQwgff3M8c6xy00XcTFpF85');

	$customer = \Stripe\Customer::create(array(
		'email'			=>	$_POST["EMAIL_CLIENTE"],
		'source'		=>	$_POST["token"],
		'name'			=>	$_POST["NOME_CARTAO"]
	));

	$order_number = rand(100000,999999);

	$charge = \Stripe\Charge::create(array(
		'customer'		=>	$customer->id,
		'amount'		=>	$_POST["total_amount"] * 100,
		'currency'		=>	$_POST["currency_code"],
		'description'	=>	$_POST["item_details"],
		'metadata'		=> array(
			'order_id'		=>	$order_number
		)
	));

	$response = $charge->jsonSerialize();

	if($response["amount_refunded"] == 0 && empty($response["failure_code"]) && $response['paid'] == 1 && $response["captured"] == 1 && $response['status'] == 'succeeded') {
		$amount = $response["amount"]/100;

		$order_data = array(
			':order_number'			=>	$order_number,
			':order_total_amount'	=>	$amount,
			':transaction_id'		=>	$response["balance_transaction"],
			':CODIGO_CARTAO'		=>	$_POST["CODIGO_CARTAO"],
			':CARTAO_VALIDADE_MES'	=>	$_POST["CARTAO_VALIDADE_MES"],
			':CARTAO_VALIDADE_ANO'	=>	$_POST["CARTAO_VALIDADE_ANO"],
			':order_status'			=>	$response["status"],
			':NUMERO_CARTAO'		=>	$_POST["NUMERO_CARTAO"],
			':EMAIL_CLIENTE'		=>	$_POST['EMAIL_CLIENTE'],
			':NOME_CARTAO'			=>	$_POST["NOME_CARTAO"]
		);

		$query = "
			INSERT INTO compra_pagamentos 
    			(order_number, order_total_amount, transaction_id, CODIGO_CARTAO, CARTAO_VALIDADE_MES, CARTAO_VALIDADE_ANO, order_status, NUMERO_CARTAO, EMAIL_CLIENTE, NOME_CARTAO) 
			VALUES 
				(:order_number, :order_total_amount, :transaction_id, :CODIGO_CARTAO, :CARTAO_VALIDADE_MES, :CARTAO_VALIDADE_ANO, :order_status, :NUMERO_CARTAO, :EMAIL_CLIENTE, :NOME_CARTAO)
		";

		$statement = $connect->prepare($query);
		$statement->execute($order_data);
		$order_id = $connect->lastInsertId();

		$_SESSION["CODIGOS"] = $order_id;
		$qr_code = mt_rand();
		$_SESSION["QR_CODE"] = $qr_code;

		foreach($_SESSION["shopping_cart"] as $keys => $values) {
			$order_item_data = array(
				':CODIGOS'				=>	$_SESSION["CODIGOS"], //$order_id,
				':NOME_PRODUTOS'		=>	$values["product_name"],
				':QUANTIDADE_PRODUTOS'	=>	$values["product_quantity"],
				':PRECO_PRODUTOS'		=>	$values["product_price"],
				':QR_CODE'				=> 	$_SESSION["QR_CODE"]
			);

			
			$query = "
				INSERT INTO compra_itens
					(CODIGOS, NOME_PRODUTOS, QUANTIDADE_PRODUTOS, PRECO_PRODUTOS, QR_CODE) 
				VALUES 
					(:CODIGOS, :NOME_PRODUTOS, :QUANTIDADE_PRODUTOS, :PRECO_PRODUTOS, :QR_CODE)
			";


			$statement = $connect->prepare($query);
			$statement->execute($order_item_data);
		}

		unset($_SESSION["shopping_cart"]);

		$_SESSION["success_message"] = "O pagamento foi concluído com sucesso. O ID TXN é " . $response["balance_transaction"] . "";
		header('location:../model/qrCode.php');
	}

}

?>