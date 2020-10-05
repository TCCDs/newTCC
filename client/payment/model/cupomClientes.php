<?php
    session_start();

    include_once ('../../../server/Conn.php');
    $conn = new Conn();

    $sql = 'SELECT 
                compras.VALOR_COMPRAS,
                compras.DATA_CAD_COMPRAS,
                
                clientes.NOME_CLIENTES,
                clientes.CPF_CLIENTES 
            FROM 
                compras
            INNER JOIN clientes ON compras.ID_CLIENTES_COMPRAS = clientes.ID_CLIENTES
            WHERE 
                compras.CODIGO_COMPRAS = 200705041
            ORDER BY clientes.NOME_CLIENTES DESC';

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoSaldo = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $cupomSupermercadoCliente[] = array_map('utf8_encode', $resultadoSaldo);
    }
    
    echo json_encode($cupomSupermercadoCliente);


