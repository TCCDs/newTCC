<?php
    include_once("../../../server/Conn.php");
    $conn = new Conn();

    $sql = "SELECT COUNT(compras.ID_COMPRAS) AS total_vendas FROM compras";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoProdutos = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $totalVendas[] = array_map('utf8_encode', $resultadoProdutos);
    }

    echo json_encode($totalVendas);