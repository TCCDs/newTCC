<?php
    session_start();
    include_once ('../../../../server/Connect.php');
    $conn = new Conn();

    $id_clientes_compras = $_SESSION['ID_USUARIOS'];

    $sql = 'SELECT 
                compras.CODIGO_COMPRAS,
                compras.VALOR_COMPRAS,
                compras.STATUS_COMPRAS,
                compras.DATA_CAD_COMPRAS,
                
                clientes.NOME_CLIENTES,
                clientes.CEP_CLIENTES,
                clientes.CIDADE_CLIENTES,
                clientes.ESTADO_CLIENTES,
                clientes.ENDERECO_CLIENTES,
                clientes.NUMERO_CLIENTES,
                clientes.BAIRRO_CLIENTES,
                
                compras_itens.NOME_PRODUTOS,
                compras_itens.CODIGO_ITENS
            FROM 
                compras
            /*INNER JOIN compras_itens ON compras_pagamentos.ID_COMPRAS_ITENS = compras_itens.ID_COMPRA_ITENS*/
            INNER JOIN compras_itens ON compras.ID_COMPRAS = compras_itens.ID_COMPRAS
            INNER JOIN clientes ON (compras.ID_CLIENTES_COMPRAS = clientes.ID_CLIENTES)
            WHERE 
                clientes.ID_USUARIOS = :ID_USUARIOS
            ORDER BY compras_itens.NOME_PRODUTOS DESC';

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_USUARIOS', $id_clientes_compras);
    $resultado->execute();

    while($resultadoCompras = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $detalhesDadosCompras[] = array_map('utf8_encode', $resultadoCompras);
    }

    echo json_encode($detalhesDadosCompras, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>