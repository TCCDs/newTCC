<?php
    session_start();
    include_once ('../../../../server/Connect.php');
    $conn = new Conn();

    $categoriaid = 5;

    $sql = "SELECT * FROM categoria ORDER BY titulo ASC ";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoReceitaCate = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $receitaCate[] = array_map('utf8_encode', $resultadoReceitaCate);
    }

    echo json_encode($receitaCate,  JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


?>