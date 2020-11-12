<?php
    session_start();
    include_once ('../../../../server/Connect.php');
    $conn = new Conn();

    $sql = "SELECT * FROM marca ORDER BY NOME_MARCA ASC ";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoProductsMarca = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $formProductsMarca[] = array_map('utf8_encode', $resultadoProductsMarca);
    }

    echo json_encode($formProductsMarca,  JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


?>