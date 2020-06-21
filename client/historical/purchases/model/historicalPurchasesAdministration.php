<?php
    include_once('../../../../server/conexao.php');

    session_start();
    $ID_CLIENTES_MOEDAS = $_SESSION['ID_USUARIOS'];

    $sql = mysqli_query($conn, "SELECT 
            compras.CODIGO_COMPRAS, 
            compras.VALOR_COMPRAS, 
            compras.STATUS_COMPRAS, 
            compras.DATA_CAD,
            
            compras_itens.NOME_PRODUTOS
        FROM 
            compras_itens
        INNER JOIN compras ON compras_itens.ID_COMPRAS = compras.ID_COMPRAS
        WHERE compras_itens.CODIGO_ITENS = 2059952836
        ORDER BY compras_itens.NOME_PRODUTOS DESC LIMIT 1");

    while($resultado = mysqli_fetch_assoc($sql)) {
        $historicoMoedas[] = array_map('utf8_encode', $resultado);
    }

    echo json_encode($historicoMoedas);
?>
