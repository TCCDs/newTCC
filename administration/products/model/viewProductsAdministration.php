<?php
    include_once('../../../server/conexao.php');

    $ID_PRODUTOS = $_POST['ID_PRODUTOS'];

    $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE ID_PRODUTOS = ".$ID_PRODUTOS."");

    while($resultado = mysqli_fetch_assoc($sql)) {
        $produtos[] = array_map('utf8_encode', $resultado);
    }

    echo json_encode($produtos);
?>
