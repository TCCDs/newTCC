<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();


    $sql = "SELECT COUNT(produtos.ID_PRODUTOS) AS total_produtos FROM produtos";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoProdutos = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $totalProdutos[] = array_map('utf8_encode', $resultadoProdutos);
    }

    echo json_encode($totalProdutos, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);