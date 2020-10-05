<?php
    session_start();

    include_once ('../../../server/Conn.php');
    $conn = new Conn();

    $sql = 'SELECT 
                compras_itens.NOME_PRODUTOS,
                compras_itens.QUANTIDADE_PRODUTOS,
                compras_itens.PRECO_PRODUTOS,
                
                compras.VALOR_COMPRAS,
                compras.DATA_CAD_COMPRAS,
                
                clientes.NOME_CLIENTES,
                clientes.CPF_CLIENTES 
            FROM 
                compras_itens
            INNER JOIN compras ON compras_itens.ID_COMPRAS = compras.ID_COMPRAS
            INNER JOIN clientes ON compras.ID_CLIENTES_COMPRAS = clientes.ID_CLIENTES
            WHERE 
                compras_itens.CODIGO_ITENS = 1026437604
            ORDER BY compras_itens.NOME_PRODUTOS DESC';

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoSaldo = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $cupomSupermercado[] = array_map('utf8_encode', $resultadoSaldo);
    }
    
    echo json_encode($cupomSupermercado);


