<?php
    include_once("../../../server/Conn.php");
    $conn = new Conn();


    $sql = "SELECT COUNT(clientes.ID_CLIENTES) AS total_clientes FROM clientes";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoProdutos = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $totalClientes[] = array_map('utf8_encode', $resultadoProdutos);
    }

    echo json_encode($totalClientes);

?>