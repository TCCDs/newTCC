<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();

    $status_produtos = 'A';

    $sql = "SELECT * FROM produtos where STATUS_PRODUTOS = :STATUS_PRODUTOS";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':STATUS_PRODUTOS', $status_produtos, PDO::PARAM_STR);
    $resultado->execute();

    while($resultadoProdutos = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $produtos[] = array_map('utf8_encode', $resultadoProdutos);
    }

    echo json_encode($produtos, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
