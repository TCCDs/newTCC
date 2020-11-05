<?php
    include_once('../../../server/Connect.php');
    session_start();
    $conn = new Conn();

    $ID_ADMINISTRADOR = $_POST['ID_ADMINISTRADOR'];

    $sql = "SELECT * FROM administrador WHERE ID_ADMINISTRADOR = :ID_ADMINISTRADOR";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_ADMINISTRADOR', $ID_ADMINISTRADOR, PDO::PARAM_INT);
    $resultado->execute();

    while($resultado_user = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $adm[] = array_map('utf8_encode', $resultado_user);
    }

    echo json_encode($adm, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
