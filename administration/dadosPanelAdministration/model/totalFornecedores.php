<?php
    include_once("../../../server/Conn.php");
    $conn = new Conn();


    $sql = "SELECT COUNT(fornecedores.ID_FORNECEDORES) AS total_fornecedores FROM fornecedores";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoProdutos = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $totalFornecedores[] = array_map('utf8_encode', $resultadoProdutos);
    }

    echo json_encode($totalFornecedores);