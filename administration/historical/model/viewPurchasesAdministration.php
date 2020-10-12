<?php
    include_once('../../../server/Conn.php');
    $conn = new Conn();

    $ID_COMPRAS = $_POST['ID_COMPRAS'];

    $sql = "SELECT * FROM compras WHERE ID_COMPRAS = :ID_COMPRAS ";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_COMPRAS', $ID_COMPRAS, PDO::PARAM_INT);
    $resultado->execute();

    while($resultadoHistoricoCompras = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $historicoCompras[] = array_map('utf8_encode', $resultadoHistoricoCompras);
    }

    echo json_encode($historicoCompras);
?>
