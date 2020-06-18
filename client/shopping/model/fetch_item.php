<?php
    //fetch_item.php
    include('database_connection.php');

    $query = mysqli_query ($connect, " SELECT * FROM tbl_product ORDER BY id ASC");

    while($resultado = mysqli_fetch_assoc($query)) {
        $listarProdutos[] = array_map('utf8_encode', $resultado);
    }

    echo json_encode($listarProdutos);
?>