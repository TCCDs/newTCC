<?php
    include_once('../../../server/conexao.php');

    $sql = mysqli_query($conn, "SELECT compras.*, clientes.NOME_CLIENTES from compras
    INNER JOIN clientes ON compras.ID_CLIENTES_COMPRAS = clientes.ID_CLIENTES
    ORDER BY compras.ID_COMPRAS DESC ");

    while($resultado = mysqli_fetch_assoc($sql)) {
        $historicoCompras[] = array_map('utf8_encode', $resultado);
    }

    echo json_encode($historicoCompras);
?>
