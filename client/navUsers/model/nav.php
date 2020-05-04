<?php
    include_once('../../../server/conexao.php');
    session_start();

    $ID_USUARIOS_CLIENTES = $_SESSION['ID_USUARIOS'];

    $sql = mysqli_query($conn, "SELECT * FROM clientes WHERE ID_CLIENTES = '".$ID_USUARIOS_CLIENTES."' ");

    while($resultado = mysqli_fetch_assoc($sql)) {
        $nav[] = array_map('utf8_encode', $resultado);

    }

    echo json_encode($nav);

?>

