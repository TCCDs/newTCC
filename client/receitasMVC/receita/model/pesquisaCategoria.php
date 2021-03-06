<?php
    session_start();
    include_once ('../../../../server/Connect.php');
    $conn = new Conn();

    $categoriaid = $_REQUEST['slCategoria'];

    $sql = "SELECT 
                r.*, 
                c.titulo as cattitulo 
            FROM receita r 
            INNER JOIN receita_categoria c ON c.id = r.categoria_id 
            WHERE r.categoria_id = :categoriaid 
            ORDER BY r.data DESC
            ";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':categoriaid', $categoriaid, PDO::PARAM_INT);
    $resultado->execute();

    while($resultadoReceita = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $receita[] = array_map('utf8_encode', $resultadoReceita);
    }

    echo json_encode($receita,  JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


?>