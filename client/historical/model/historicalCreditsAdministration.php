<?php
    include_once('../../../server/conexao.php');

    session_start();
    $ID_CLIENTES_MOEDAS = $_SESSION['ID_USUARIOS'];

    $sql = mysqli_query($conn, "SELECT compras.*, clientes.NOME_CLIENTES from compras
    INNER JOIN clientes ON compras.ID_CLIENTES_COMPRAS = clientes.ID_CLIENTES
    WHERE clientes.ID_USUARIOS_CLIENTES = $ID_CLIENTES_MOEDAS
    ORDER BY compras.ID_COMPRAS DESC ");

    while($resultado = mysqli_fetch_assoc($sql)) {
        $historicoCompras[] = array_map('utf8_encode', $resultado);
    }

    echo json_encode($historicoCompras);
?>
