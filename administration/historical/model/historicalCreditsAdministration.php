<?php
    include_once('../../../server/Conn.php');
    $conn = new Conn();

    $sql = "SELECT 
                moedas.*, 
                clientes.NOME_CLIENTES 
            from 
                moedas
            INNER JOIN clientes ON moedas.ID_CLIENTES_MOEDAS = clientes.ID_CLIENTES
            ORDER BY moedas.ID_MOEDAS DESC ";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while ($resultadoHistoricoMoedas = $resultado->fetch(PDO::FETCH_ASSOC)):
        $historicoMoedas[] = array_map('utf8_encode', $resultadoHistoricoMoedas);
    endwhile;

    echo json_encode($historicoMoedas);
?>
