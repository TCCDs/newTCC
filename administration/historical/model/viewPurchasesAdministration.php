<?php
    include_once('../../../server/conexao.php');

    $ID_COMPRAS = $_POST['ID_COMPRAS'];

    $sql = mysqli_query($conn, "SELECT * FROM compras WHERE ID_COMPRAS = ".$ID_COMPRAS."");

    while($resultado = mysqli_fetch_assoc($sql)) {
        $historicoCompras[] = array_map('utf8_encode', $resultado);
    }

    echo json_encode($historicoCompras);
?>
