<?php
    include_once ('../../../server/Conn.php');
    session_start();
    $conn = new Conn();

    $ID_CLIENTES = $_POST['ID_CLIENTES'];

    $sql = "SELECT * FROM clientes WHERE ID_CLIENTES = :ID_CLIENTES";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_CLIENTES', $ID_CLIENTES, PDO::PARAM_INT);
    $resultado->execute();

    while($resultado_user = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $clientes[] = array_map('utf8_encode', $resultado_user);
    }

    echo json_encode($clientes);
?>
