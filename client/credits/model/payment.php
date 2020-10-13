<?php
	//payment.php
	use Stripe\Service\Terminal\TerminalServiceFactory;

	include_once ('../../../server/Conn.php');
	//$conn = new PDO("mysql:host=localhost;dbname=new_supermercado", "root", "");
	$conn = new Conn();

	session_start();

	$saldoTotalClientes = $_SESSION['saldo_clientes'];

if(isset($_POST["token"])) {
	require_once '../../../vendor/autoload.php';

	\Stripe\Stripe::setApiKey('sk_test_L4OlaLFVannSQwgff3M8c6xy00XcTFpF85');

	$customer = \Stripe\Customer::create(array(
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

		$codigos = mt_rand();
		$ID_USUARIOS = $_SESSION['ID_USUARIOS'];

		$order_item_data = array(
			':CODIGOS'				=>	$codigos,
			':ID_CLIENTES_MOEDAS'	=>	$ID_USUARIOS,
			':VALOR_MOEDAS'			=>	$amount
		);

		$sql = "
			INSERT INTO moedas
				(CODIGOS, ID_CLIENTES_MOEDAS, VALOR_MOEDAS) 
			VALUES 
				(:CODIGOS, :ID_CLIENTES_MOEDAS, :VALOR_MOEDAS)
		";

		/*$statement = $conn->prepare($query);
		$statement->execute($order_item_data);
		$id_moedas = $conn->lastInsertId();*/

		$resultado = $conn->getConn()->prepare($sql);
		$resultado->execute($order_item_data);
		$id_moedas = $conn->getConn()->lastInsertId();

		$order_data = array(
			':ORDER_NUMBER'			=>	$order_number,
			':ORDER_TOTAL_AMOUNT'	=>	$amount,
			':TRANSACAO'			=>	$response["balance_transaction"],
			':CODIGO_CARTAO'		=>	$_POST["CODIGO_CARTAO"],
			':CARTAO_VALIDADE_MES'	=>	$_POST["CARTAO_VALIDADE_MES"],
			':CARTAO_VALIDADE_ANO'	=>	$_POST["CARTAO_VALIDADE_ANO"],
			':ORDER_STATUS'			=>	$response["status"],
			':NUMERO_CARTAO'		=>	$_POST["NUMERO_CARTAO"],
			':NOME_CARTAO'			=>	$_POST["NOME_CARTAO"],
			':ID_MOEDAS'			=> 	$id_moedas
		);

		$sql = "
			INSERT INTO cliente_pagamentos 
    			(ORDER_NUMBER, ORDER_TOTAL_AMOUNT, TRANSACAO, CODIGO_CARTAO, CARTAO_VALIDADE_MES, CARTAO_VALIDADE_ANO, ORDER_STATUS, NUMERO_CARTAO,  NOME_CARTAO, ID_MOEDAS) 
			VALUES 
				(:ORDER_NUMBER, :ORDER_TOTAL_AMOUNT, :TRANSACAO, :CODIGO_CARTAO, :CARTAO_VALIDADE_MES, :CARTAO_VALIDADE_ANO, :ORDER_STATUS, :NUMERO_CARTAO, :NOME_CARTAO, :ID_MOEDAS)
		";

		/*$statement = $conn->prepare($query);
		$statement->execute($order_data);*/

		$resultado = $conn->getConn()->prepare($sql);
		$resultado->execute($order_data);
		
		$_SESSION["success_message"] = "O pagamento foi concluído com sucesso. O ID TXN é " . $response["balance_transaction"] . "";

		$addMoedas = $amount + $saldoTotalClientes;

		$order_saldo = array(
			':ID_CLIENTE' => $ID_USUARIOS,
			':SALDO_CLIENTES' => $addMoedas
		);

		$sql = "UPDATE saldo_clientes SET SALDO_CLIENTES = :SALDO_CLIENTES  WHERE ID_CLIENTE = :ID_CLIENTE";
		/*$statement = $conn->prepare($sql);
		$statement->execute($order_saldo);*/

		$resultado = $conn->getConn()->prepare($sql);
		$resultado->execute($order_saldo);

		header('location:../../../customerPanel.php');
	}

}

?>