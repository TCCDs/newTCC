<?php
    include_once ("../../../server/conexao.php");

    $query = mysqli_query ($conn, " SELECT * FROM produtos ORDER BY ID_PRODUTOS ASC");

    while($resultado = mysqli_fetch_assoc($query)) {
        $listarProdutos[] = array_map('utf8_encode', $resultado);
    }

    echo json_encode($listarProdutos);
?>