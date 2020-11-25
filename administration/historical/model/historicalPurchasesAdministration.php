<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();

    $sql = "SELECT 
                compras.*, 
                clientes.NOME_CLIENTES 
            from 
                compras
            INNER JOIN clientes ON compras.ID_CLIENTES_COMPRAS = clientes.ID_CLIENTES
            ORDER BY compras.ID_COMPRAS DESC ";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoHistoricoCompras = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $historicoCompras[] = array_map('utf8_encode', $resultadoHistoricoCompras);
    }

    echo json_encode($historicoCompras, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
