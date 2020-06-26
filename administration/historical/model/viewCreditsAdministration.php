<?php
    include_once('../../../server/conexao.php');

    $ID_MOEDAS = $_POST['ID_MOEDAS'];

    $sql = mysqli_query($conn, "SELECT * FROM moedas WHERE ID_MOEDAS = ".$ID_MOEDAS."");

    while($resultado = mysqli_fetch_assoc($sql)) {
        $historicoMoedas[] = array_map('utf8_encode', $resultado);
    }

    echo json_encode($historicoMoedas);
?>
