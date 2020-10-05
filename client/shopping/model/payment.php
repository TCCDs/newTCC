<?php
	$connect = new PDO("mysql:host=localhost;dbname=new_supermercado", "root", "");

	session_start();

	if(isset($_POST["token"])) {
		require_once '../../../vendor/autoload.php';
		\Stripe\Stripe::setApiKey('sk_test_L4OlaLFVannSQwgff3M8c6xy00XcTFpF85');

		$customer = \Stripe\Customer::create(array(
			//'email'			=>	$_POST["EMAIL_CLIENTE"],
			'source'		=>	$_POST["token"],
			'name'			=>	$_POST["NOME_CARTAO"]
		));

		$order_number = rand(100000,999999);

		$charge = \Stripe\Charge::create(array(
			'customer'		=>	$customer->id,
			'amount'		=>	$_POST["total_amount"] * 100,
			'currency'		=>	$_POST["currency_code"],
			'description'	=>	'Supermercado Caravelas',
			'metadata'		=> array(
				'order_id'		=>	$order_number
			)
		));

		$response = $charge->jsonSerialize();

		if($response["amount_refunded"] == 0 && empty($response["failure_code"]) && $response['paid'] == 1 && $response["captured"] == 1 && $response['status'] == 'succeeded') {
			$amount = $response["amount"]/100;

			#compras simples
			$codigo_compras = mt_rand();
			$id_clientes_compras = $_SESSION['ID_USUARIOS'];
			$total_desconto_compras = 0;
			$status_compras = 'F';
			$tipo_pagamento = 'Cartão de Credito';
						
			$order_compras = array (
				':ID_CLIENTES_COMPRAS'		=> $id_clientes_compras,
				':CODIGO_COMPRAS'			=> $codigo_compras,
				':VALOR_COMPRAS'			=> $amount,
				':TOTAL_DESCONTO_COMPRAS'	=> $total_desconto_compras,
				':STATUS_COMPRAS'			=> $status_compras,
				':TIPO_PAGAMENTO'			=> $tipo_pagamento
			);
						
			$sql =  "
				INSERT INTO compras
					(ID_CLIENTES_COMPRAS, CODIGO_COMPRAS, VALOR_COMPRAS, TOTAL_DESCONTO_COMPRAS, STATUS_COMPRAS, TIPO_PAGAMENTO) 
				VALUES 
					(:ID_CLIENTES_COMPRAS, :CODIGO_COMPRAS, :VALOR_COMPRAS, :TOTAL_DESCONTO_COMPRAS, :STATUS_COMPRAS, :TIPO_PAGAMENTO)
			";
						
			$statement = $connect->prepare($sql);
			$statement->execute($order_compras);
			$id_compras = $connect->lastInsertId();

			#itens da compras 
			$qr_code = mt_rand();
			$codigo_itens = mt_rand();

			$_SESSION["CODIGO_ITENS"] = $codigo_itens;
			$_SESSION["QR_CODE"] = $qr_code;
			
			foreach($_SESSION["shopping_cart"] as $keys => $values) {
				$order_item_data = array(
					':CODIGO_ITENS'			=>	$_SESSION["CODIGO_ITENS"],
					':NOME_PRODUTOS'		=>	$values["product_name"],
					':QUANTIDADE_PRODUTOS'	=>	$values["product_quantity"],
					':PRECO_PRODUTOS'		=>	$values["product_price"],
					':QR_CODE'				=> 	$_SESSION["QR_CODE"],
					':ID_COMPRAS'			=>	$id_compras
				);
			
				$query = "
					INSERT INTO compras_itens
						(CODIGO_ITENS, NOME_PRODUTOS, QUANTIDADE_PRODUTOS, PRECO_PRODUTOS, QR_CODE, ID_COMPRAS) 
					VALUES 
						(:CODIGO_ITENS, :NOME_PRODUTOS, :QUANTIDADE_PRODUTOS, :PRECO_PRODUTOS, :QR_CODE, :ID_COMPRAS)
				";
			
				$statement = $connect->prepare($query);
				$statement->execute($order_item_data);
				$id_compras_itens = $connect->lastInsertId();
			}
			
			# compras pagamento 
			$order_data = array(
				':CODIGO_PAGAMENTO'		=>	$order_number,
				':TOTAL_COMPRA'			=>	$amount,
				':TRANSACAO'			=>	$response["balance_transaction"],
				':CODIGO_CARTAO'		=>	$_POST["CODIGO_CARTAO"],
				':CARTAO_VALIDADE_MES'	=>	$_POST["CARTAO_VALIDADE_MES"],
				':CARTAO_VALIDADE_ANO'	=>	$_POST["CARTAO_VALIDADE_ANO"],
				':STATUS_PAGAMENTO'		=>	$response["status"],
				':NUMERO_CARTAO'		=>	$_POST["NUMERO_CARTAO"],
				':NOME_CARTAO'			=>	$_POST["NOME_CARTAO"],
				':ID_COMPRAS_ITENS' 	=>  $id_compras_itens
			);

			$query = "
				INSERT INTO compras_pagamentos 
					(CODIGO_PAGAMENTO, TOTAL_COMPRA, TRANSACAO, CODIGO_CARTAO, CARTAO_VALIDADE_MES, CARTAO_VALIDADE_ANO, STATUS_PAGAMENTO, NUMERO_CARTAO, NOME_CARTAO, ID_COMPRAS_ITENS) 
				VALUES 
					(:CODIGO_PAGAMENTO, :TOTAL_COMPRA, :TRANSACAO, :CODIGO_CARTAO, :CARTAO_VALIDADE_MES, :CARTAO_VALIDADE_ANO, :STATUS_PAGAMENTO, :NUMERO_CARTAO, :NOME_CARTAO, :ID_COMPRAS_ITENS)
			";

			$statement = $connect->prepare($query);
			$statement->execute($order_data);

			unset($_SESSION["shopping_cart"]);

			$_SESSION["success_message"] = "O pagamento foi concluído com sucesso. O ID TXN é " . $response["balance_transaction"] . "";
			header('location: ../../../customerPanel.php');
		}
	}

?>