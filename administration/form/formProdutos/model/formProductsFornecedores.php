<?php
    session_start();
    include_once ('../../../../server/Connect.php');
    $conn = new Conn();

    $sql = "SELECT * FROM fornecedores ORDER BY NOME_FANTASIA_FORNECEDORES ASC ";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoProductsFornecedores = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $formProductsFornecedores[] = array_map('utf8_encode', $resultadoProductsFornecedores);
    }

    echo json_encode($formProductsFornecedores,  JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


?>