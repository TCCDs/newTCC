<?php
    session_start();

    include_once ('../../../server/Connect.php');
    $conn = new Conn();
    $codigoCompra = $_SESSION["CODIGO_COMPRAS"];
    $sql = 'SELECT 
                compras.VALOR_COMPRAS,
                compras.DATA_CAD_COMPRAS,
                COMPRAS.TIPO_PAGAMENTO,
                
                clientes.NOME_CLIENTES,
                clientes.CPF_CLIENTES 
            FROM 
                compras
            INNER JOIN clientes ON compras.ID_CLIENTES_COMPRAS = clientes.ID_CLIENTES
            WHERE 
                compras.CODIGO_COMPRAS = :CODIGO_COMPRAS
            ORDER BY clientes.NOME_CLIENTES DESC';

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':CODIGO_COMPRAS', $codigoCompra);
    $resultado->execute();

    while($resultadoSaldo = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $cupomSupermercadoCliente[] = array_map('utf8_encode', $resultadoSaldo);
    }
    
    echo json_encode($cupomSupermercadoCliente, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


