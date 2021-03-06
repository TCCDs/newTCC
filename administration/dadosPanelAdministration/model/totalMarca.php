<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();


    $sql = "SELECT COUNT(marca.ID_MARCA) AS total_marca FROM marca";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoProdutos = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $totalMarcas[] = array_map('utf8_encode', $resultadoProdutos);
    }

    echo json_encode($totalMarcas, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);