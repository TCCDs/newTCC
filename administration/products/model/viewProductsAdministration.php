<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();

    $ID_PRODUTOS = $_POST['ID_PRODUTOS'];

    $sql = "SELECT * FROM produtos WHERE ID_PRODUTOS = :ID_PRODUTOS";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_PRODUTOS',$ID_PRODUTOS, PDO::PARAM_INT);
    $resultado->execute();

    while($resultadoProdutos = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $produtos[] = array_map('utf8_encode', $resultadoProdutos);
    }

    echo json_encode($produtos, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
