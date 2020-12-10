<?php
    include_once ('../../../server/Connect.php');
    session_start();
    $conn = new Conn();

    $ID_CLIENTES = $_SESSION['ID_USUARIOS'];

    $sql = "SELECT * FROM clientes WHERE ID_USUARIOS = :ID_CLIENTES";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_CLIENTES', $ID_CLIENTES, PDO::PARAM_INT);
    $resultado->execute();

    while($resultado_user = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $produtos[] = array_map('utf8_encode', $resultado_user);
    }

    echo json_encode($produtos, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
