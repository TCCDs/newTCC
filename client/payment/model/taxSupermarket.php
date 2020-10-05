<?php
    session_start();

    include_once ('../../../server/Conn.php');
    $conn = new Conn();

    $sql = 'SELECT 
                supermercado.NOME,
                supermercado.CNPJ,
                supermercado.TELEFONE,
                supermercado.ENDERECO,
                supermercado.NUMERO
            FROM 
                supermercado';

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoSaldo = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $supermercado[] = array_map('utf8_encode', $resultadoSaldo);
    }
    
    echo json_encode($supermercado);


