<?php
    include_once('../../../server/conexao.php');

    $sql = mysqli_query($conn, "SELECT * FROM clientes");

    while($resultado = mysqli_fetch_assoc($sql)) {
        $cliente[] = array_map('utf8_encode', $resultado);

    }

    echo json_encode($cliente);

?>



