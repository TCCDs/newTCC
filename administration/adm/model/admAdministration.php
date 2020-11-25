<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();

    $status = 'A'; 

    $sql = "SELECT * FROM administrador where STATUS_ADMINISTRADOR = :STATUS_ADMINISTRADOR";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':STATUS_ADMINISTRADOR', $status, PDO::PARAM_STR);
    $resultado->execute();

    while($resultadoAdm = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $adm[] = array_map('utf8_encode', $resultadoAdm);

    }

    echo json_encode($adm, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

?>
