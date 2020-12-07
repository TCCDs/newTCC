<?php
    session_start();
    include_once ('../../../../server/Connect.php');
    $conn = new Conn();

    $idDadosCompras = 1018892394; //$_POST['ID_USUARIOS'];

    $sql = 'SELECT 
                compras.CODIGO_COMPRAS,
                compras.VALOR_COMPRAS,
                compras.STATUS_COMPRAS,
                compras.DATA_CAD_COMPRAS,
                
                clientes.NOME_CLIENTES,
                
                compras_itens.NOME_PRODUTOS,
                compras_itens.CODIGO_ITENS
                FROM 
                compras
                INNER JOIN compras_itens ON compras.ID_COMPRAS = compras_itens.ID_COMPRA_ITENS
                INNER JOIN clientes ON (compras.ID_CLIENTES_COMPRAS = clientes.ID_CLIENTES)
                WHERE 
                    compras.CODIGO_COMPRAS = :CODIGO_COMPRAS
                ORDER BY compras_itens.NOME_PRODUTOS DESC';

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':CODIGO_COMPRAS', $idDadosCompras);
    $resultado->execute();

    while($resultadoCompras = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $viewDetalhesDadosCompras[] = array_map('utf8_encode', $resultadoCompras);
    }

    echo json_encode($viewDetalhesDadosCompras, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>