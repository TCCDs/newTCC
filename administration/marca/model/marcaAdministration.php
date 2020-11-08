<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();

    $sql = "SELECT * FROM marca";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoMarca = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $marca[] = array_map('utf8_encode', $resultadoMarca);

    }

    echo json_encode($marca, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

?>
