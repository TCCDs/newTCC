<?php
    include_once ('../../../../server/Connect.php');
    $conn = new Conn();

    $codigos_itens = $_POST['CODIGO_ITENS']; //1026437604;

    $sql = 'SELECT * FROM compras_itens WHERE compras_itens.CODIGO_ITENS = :CODIGOS_ITENS';
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':CODIGOS_ITENS', $codigos_itens);
    $resultado->execute();

    while($resultadoProdutos = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $detalhesComprasProdutos[] = array_map('utf8_encode', $resultadoProdutos);
    }

    echo json_encode($detalhesComprasProdutos, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>