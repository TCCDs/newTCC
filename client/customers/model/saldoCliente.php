<?php
    session_start();

    include_once ('../../../server/Conn.php');
    $conn = new Conn();

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

    while($resultadoSaldo = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $saldoCliente[] = array_map('utf8_encode', $resultadoSaldo);
    }

    //$_SESSION['saldo_clientes'] =  $saldoCliente;
    
    echo json_encode($saldoCliente);




?>



