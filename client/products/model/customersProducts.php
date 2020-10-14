<?php
    include_once ('../../../server/Connect.php');
    $conn = new Conn();

    $sql = "SELECT * FROM produtos ";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoProdutos = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $produtos[] = array_map('utf8_encode', $resultadoProdutos);
    }

    echo json_encode($produtos, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
