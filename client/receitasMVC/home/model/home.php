<?php
    session_start();
    include_once ('../../../../server/Connect.php');
    $conn = new Conn();

    $limit = 10; 
    $categoriaid = 5;

    $sql = "SELECT 
                r.*, 
                c.titulo as cattitulo 
            FROM receita r 
            INNER JOIN categoria c ON c.id = r.categoria_id 
            WHERE r.categoria_id = :categoriaid 
            ORDER BY r.data DESC LIMIT :limit
            ";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':categoriaid', $categoriaid, PDO::PARAM_INT);
    $resultado->bindParam(':limit', $limit, PDO::PARAM_INT);
    $resultado->execute();

    while($resultado_home = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $receitaHome[] = array_map('utf8_encode', $resultado_home);
    }

    echo json_encode($receitaHome,  JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


?>