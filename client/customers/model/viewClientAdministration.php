<?php
    include_once('../../../server/conexao.php');

    $ID_CLIENTES = 1;

    $sql = mysqli_query($conn, "SELECT * FROM clientes WHERE ID_CLIENTES = ".$ID_CLIENTES."");

    while($resultado = mysqli_fetch_assoc($sql)) {
        $produtos[] = array_map('utf8_encode', $resultado);
    }

    echo json_encode($produtos);
?>
