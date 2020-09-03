<?php
    include_once("../../../server/Conn.php");
    $conn = new Conn();

    $sql = "SELECT 
                clientes.ID_CLIENTES,
                clientes.NOME_CLIENTES, 
                clientes.EMAIL_CLIENTES,
                clientes.CELULAR_CLIENTES 
            FROM 
                clientes
            ORDER BY clientes.ID_CLIENTES DESC LIMIT 10";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while ($resultadoListaClientes = $resultado->fetch(PDO::FETCH_ASSOC)):
        $listaClientesRapido[] = array_map('utf8_encode', $resultadoListaClientes);
    endwhile;

    echo json_encode($listaClientesRapido);

?>