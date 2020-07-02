<?php
    session_start();

    include_once ('../../../server/Conn.php');
    $conn = new Conn();

    $ID_USUARIOS_CLIENTES = $_SESSION['ID_USUARIOS'];

    $sql = "SELECT MAX(DATE_FORMAT(compras.DATA_CAD, '%d/%m/%Y'))  AS DATA_CAD FROM compras
    INNER JOIN clientes ON compras.ID_CLIENTES_COMPRAS = clientes.ID_CLIENTES
    WHERE clientes.ID_USUARIOS_CLIENTES = :ID_USUARIOS_CLIENTES
    ORDER BY clientes.NOME_CLIENTES ASC ";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_USUARIOS_CLIENTES', $ID_USUARIOS_CLIENTES, PDO::PARAM_INT);
    $resultado->execute();

    while($resultadoData = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $dataCompra[] = array_map('utf8_encode', $resultadoData);
    }

    echo json_encode($dataCompra);


?>



