<?php
    include_once("../../../server/Conn.php");
    $conn = new Conn();

    $sql = "SELECT COUNT(compras.ID_COMPRAS) AS ultima_venda, compras.DATA_CAD_COMPRAS AS datas_vendas FROM compras
    order BY compras.ID_COMPRAS DESC";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoProdutos = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $ultimaVendas[] = array_map('utf8_encode', $resultadoProdutos);
    }

    echo json_encode($ultimaVendas);