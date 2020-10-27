<?php
    session_start();
    include_once ('../../../../server/Conn.php');
    $conn = new Conn();

    $sql = "SELECT * FROM receita_categoria ORDER BY titulo ASC ";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoReceitaCate = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $receitaCategoria[] = array_map('utf8_encode', $resultadoReceitaCate);
    }

    echo json_encode($receitaCategoria,  JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


?>