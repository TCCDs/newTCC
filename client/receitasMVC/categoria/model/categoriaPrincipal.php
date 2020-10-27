<?php
    session_start();
    include_once ('../../../../server/Conn.php');
    $conn = new Conn();

    $sql = "SELECT * FROM receita_categoria ORDER BY titulo ASC";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoCategoria = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $categoria[] = array_map('utf8_encode', $resultadoCategoria);
    }

    echo json_encode($categoria,  JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


?>