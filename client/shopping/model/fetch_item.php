<?php
    include_once ("../../../server/Conn.php");
    $conn = new Conn();

    $sql = " SELECT * FROM produtos ORDER BY ID_PRODUTOS ASC";

    $resultado = $conn->getConn()->prepare();
    $resultado->execute();

    while($resultadoData = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $listarProdutos[] = array_map('utf8_encode', $resultadoData);
    }

    echo json_encode($listarProdutos);
?>