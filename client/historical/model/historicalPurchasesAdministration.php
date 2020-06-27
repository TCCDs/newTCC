<?php
    include_once('../../../server/conexao.php');

    session_start();
    $ID_CLIENTES_MOEDAS = $_SESSION['ID_USUARIOS'];

    $sql = mysqli_query($conn, "SELECT moedas.*, clientes.NOME_CLIENTES from moedas
    INNER JOIN clientes ON moedas.ID_CLIENTES_MOEDAS = clientes.ID_CLIENTES
    WHERE clientes.ID_USUARIOS_CLIENTES = $ID_CLIENTES_MOEDAS
    ORDER BY moedas.ID_MOEDAS DESC ");

    while($resultado = mysqli_fetch_assoc($sql)) {
        $historicoMoedas[] = array_map('utf8_encode', $resultado);
    }

    echo json_encode($historicoMoedas);
?>
