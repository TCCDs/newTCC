<?php
    session_start();

    include_once ('../../../server/Conn.php');
    $conn = new Conn();

    $ID_USUARIOS_CLIENTES = $_SESSION['ID_USUARIOS'];

    $sql = 'SELECT sum(moedas.VALOR_MOEDAS) AS MOEDAS, clientes.NOME_CLIENTES FROM moedas
    INNER JOIN clientes ON moedas.ID_CLIENTES_MOEDAS = clientes.ID_CLIENTES
    WHERE clientes.ID_USUARIOS_CLIENTES = :ID_USUARIOS_CLIENTES
    ORDER BY clientes.NOME_CLIENTES ASC';

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_USUARIOS_CLIENTES', $ID_USUARIOS_CLIENTES, PDO::PARAM_INT);
    $resultado->execute();

    while($resultadoSaldo = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $saldoCliente[] = array_map('utf8_encode', $resultadoSaldo);
    }

    echo json_encode($saldoCliente);




?>



