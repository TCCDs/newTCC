<?php
    include_once('../../../server/conexao.php');

    $sql = mysqli_query($conn, "SELECT moedas.*, clientes.NOME_CLIENTES from moedas
    INNER JOIN clientes ON moedas.ID_CLIENTES_MOEDAS = clientes.ID_CLIENTES
    ORDER BY moedas.ID_MOEDAS DESC ");

    while($resultado = mysqli_fetch_assoc($sql)) {
        $historicoMoedas[] = array_map('utf8_encode', $resultado);
    }

    echo json_encode($historicoMoedas);
?>
