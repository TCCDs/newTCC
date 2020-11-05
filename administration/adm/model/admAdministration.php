<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();

    $sql = "SELECT * FROM administrador";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoAdm = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $adm[] = array_map('utf8_encode', $resultadoAdm);

    }

    echo json_encode($adm, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

?>
