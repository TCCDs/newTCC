<?php
    include_once('../../../server/conexao.php');

    $sql = mysqli_query($conn, "SELECT * FROM produtos ");

    while($resultado = mysqli_fetch_assoc($sql)) {
        $produtos[] = array_map('utf8_encode', $resultado);
    }

    echo json_encode($produtos);
?>
