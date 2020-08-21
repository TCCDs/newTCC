<?php
    include_once('../../../server/Conn.php');
    $conn = new Conn();

    $sql = "SELECT * FROM clientes";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoClientes = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $cliente[] = array_map('utf8_encode', $resultadoClientes);

    }

    echo json_encode($cliente);

?>



