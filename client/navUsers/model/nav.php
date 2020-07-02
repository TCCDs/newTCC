<?php
    session_start();

    include_once ('../../../server/Conn.php');
    $conn = new Conn();

    $ID_USUARIOS_CLIENTES = $_SESSION['ID_USUARIOS'];

    $sql = 'SELECT * FROM clientes WHERE ID_CLIENTES = :ID_CLIENTES';
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_CLIENTES', $ID_USUARIOS_CLIENTES, PDO::PARAM_INT);
    $resultado->execute();

    while($resultadoUser = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $nav[] = array_map('utf8_encode', $resultadoUser);

    }

    echo json_encode($nav);

?>

