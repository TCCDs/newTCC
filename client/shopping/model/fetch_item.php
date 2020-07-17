<?php
    //fetch_item.php
    //include('database_connection.php');
    include_once ("../../../server/conexao.php");

    //$query = mysqli_query ($connect, " SELECT * FROM tbl_product ORDER BY id ASC");
    $query = mysqli_query ($conn, " SELECT * FROM produtos ORDER BY ID_PRODUTOS ASC");

    while($resultado = mysqli_fetch_assoc($query)) {
        $listarProdutos[] = array_map('utf8_encode', $resultado);
    }

    echo json_encode($listarProdutos);
?>