<?php
    session_start();

    include_once ('../../../server/Connect.php');
    $conn = new Conn();

    $ID_USUARIOS = $_SESSION['ID_USUARIOS'];

    $sql = 'SELECT clientes.NOME_CLIENTES FROM clientes WHERE clientes.ID_USUARIOS = :ID_USUARIOS';

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_USUARIOS', $ID_USUARIOS, PDO::PARAM_INT);
    $resultado->execute();

    while($resultadoSaldo = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $nomeCliente[] = array_map('utf8_encode', $resultadoSaldo);
    }
    
    echo json_encode($nomeCliente, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);




?>