<?php
    session_start();
    include_once ('../../../../server/Conn.php');
    $conn = new Conn();

    $id = $_POST['id'];

    $sql = "SELECT * FROM receita_categoria where id = :id";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':id', $id, PDO::PARAM_INT);
    $resultado->execute();

    while($resultadoCategoria = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $categoria[] = array_map('utf8_encode', $resultadoCategoria);
    }

    echo json_encode($categoria,  JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>