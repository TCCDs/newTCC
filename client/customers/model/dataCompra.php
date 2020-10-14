<?php
    session_start();

    include_once ('../../../server/Connect.php');
    $conn = new Conn();

    $ID_USUARIOS = $_SESSION['ID_USUARIOS'];

    $sql = "SELECT MAX(DATE_FORMAT(compras.DATA_CAD_COMPRAS, '%d/%m/%Y'))  AS DATA_CAD FROM compras
    INNER JOIN clientes ON compras.ID_CLIENTES_COMPRAS = clientes.ID_CLIENTES
    WHERE clientes.ID_USUARIOS = :ID_USUARIOS
    ORDER BY clientes.NOME_CLIENTES ASC ";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_USUARIOS', $ID_USUARIOS, PDO::PARAM_INT);
    $resultado->execute();

    while($resultadoData = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $dataCompra[] = array_map('utf8_encode', $resultadoData);
    }

    echo json_encode($dataCompra, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


?>



