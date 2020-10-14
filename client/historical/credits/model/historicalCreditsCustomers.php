<?php
    session_start();
    include_once ('../../../../server/Connect.php');
    $conn = new Conn();

    $id_clientes_moedas = $_SESSION['ID_USUARIOS'];

    $sql = 'SELECT 
                moedas.CODIGOS,
                moedas.VALOR_MOEDAS,
                moedas.DATA_CAD_MOEDAS,
                clientes.NOME_CLIENTES,
                cliente_pagamentos.NOME_CARTAO,
                cliente_pagamentos.NUMERO_CARTAO
            FROM
	            cliente_pagamentos
            INNER JOIN moedas ON cliente_pagamentos.ID_MOEDAS = moedas.ID_MOEDAS
            INNER JOIN clientes ON moedas.ID_CLIENTES_MOEDAS = clientes.ID_CLIENTES
            WHERE clientes.ID_USUARIOS = :ID_USUARIOS
            ORDER BY clientes.NOME_CLIENTES ASC';

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_USUARIOS', $id_clientes_moedas, PDO::PARAM_INT);
    $resultado->execute();

    while($resultadoMoedas = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $historicoMoedas[] = array_map('utf8_encode', $resultadoMoedas);
    }

    echo json_encode($historicoMoedas, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
