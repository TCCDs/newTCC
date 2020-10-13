<?php
    session_start();

    include_once ('../../../server/Conn.php');
    $conn = new Conn();

    $ID_USUARIOS_ADMINISTRATION = $_SESSION['ID_USUARIOS'];

    $sql = 'SELECT * FROM administrador WHERE ID_USUARIOS_ADMINISTRADOR = :ID_USUARIOS_ADMINISTRADOR';
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_USUARIOS_ADMINISTRADOR', $ID_USUARIOS_ADMINISTRATION, PDO::PARAM_INT);
    $resultado->execute();

    while($resultadoAdmin = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $nav[] = array_map('utf8_encode', $resultadoAdmin);

    }

    echo json_encode($nav);

?>

