<?php
    include '../../../server/conexao.php';
    
    // detalhes Produtos
    $sql = 'SELECT * FROM compras_itens WHERE compras_itens.CODIGO_ITENS = 2059952836';
    $result = mysqli_query($conn, $sql);

    while($resultado = mysqli_fetch_assoc($result)) {
        $detalhesComprasProdutos[] = array_map('utf8_encode', $resultado);
    }

    echo json_encode($detalhesComprasProdutos);
?>