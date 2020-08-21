<?php
    include_once ('../../../../server/Conn.php');
    $conn = new Conn();

    $codigos_itens = 2059952836;

    $sql = 'SELECT * FROM compras_itens WHERE compras_itens.CODIGO_ITENS = :CODIGOS_ITENS';
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':CODIGOS_ITENS', $codigos_itens);
    $resultado->execute();

    while($resultadoProdutos = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $detalhesComprasProdutos[] = array_map('utf8_encode', $resultadoProdutos);
    }

    echo json_encode($detalhesComprasProdutos);
?>