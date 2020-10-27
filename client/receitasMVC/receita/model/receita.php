<?php
    session_start();
    include_once ('../../../../server/Connect.php');
    $conn = new Conn();

    $limit = 10;

    $sql = "SELECT 
                r.*, c.titulo as cattitulo 
            FROM 
                receita r 
            INNER JOIN receita_categoria c ON c.id = r.categoria_id  
            ORDER BY r.data DESC 
            LIMIT :limit
            ";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':limit', $limit, PDO::PARAM_INT);
    $resultado->execute();

    while($resultadoReceita = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $receita[] = array_map('utf8_encode', $resultadoReceita);
    }

    echo json_encode($receita,  JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


?>