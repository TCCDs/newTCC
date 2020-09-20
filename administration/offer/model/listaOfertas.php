<?php
    session_start();
    include_once ('../../../server/Conn.php');
    $conn = new Conn();

    $sql = "SELECT * FROM produtos";

    $resultado = $conn->getConn()->prepare($sql);
    //$resultado->bindParam(':QR_CODE', $qr_code, PDO::PARAM_INT);
    $resultado->execute();

    while($resultado_user = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $produtos[] = array_map('utf8_encode', $resultado_user);
    }

    echo json_encode($produtos,  JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    //header("Location: ../view/ofertas.html");

?>