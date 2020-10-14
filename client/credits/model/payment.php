<?php
	//payment.php
	use Stripe\Service\Terminal\TerminalServiceFactory;

	include_once ('../../../server/Connect.php');
	$conn = new Conn();

	session_start();

    /* SALDO MOEDA VIRTUAL */
    $ID_USUARIOS = $_SESSION['ID_USUARIOS'];
    $sql = 'SELECT sum(saldo_clientes.SALDO_CLIENTES) AS saldo_clientes,
                clientes.NOME_CLIENTES 
            FROM saldo_clientes
            INNER JOIN clientes ON saldo_clientes.ID_CLIENTE = clientes.ID_CLIENTES
            WHERE clientes.ID_USUARIOS = :ID_USUARIOS
            ORDER BY clientes.NOME_CLIENTES ASC';
    
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_USUARIOS', $ID_USUARIOS, PDO::PARAM_INT);
    $resultado->execute();
    
    while($saldoAtual = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $saldoAtualCliente = $saldoAtual["saldo_clientes"];
    }

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

		$addMoedas = $amount + $saldoAtualCliente;

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