<?php
    session_start();
    include_once ('../../../../server/Connect.php');
    $conn = new Conn();

    $id_clientes_compras = $_SESSION['ID_USUARIOS'];

    $sql = 'SELECT 
                compras_pagamentos.NOME_CARTAO,
                compras_pagamentos.NUMERO_CARTAO,
                compras_pagamentos.STATUS_PAGAMENTO,
                compras_pagamentos.CODIGO_PAGAMENTO,
                
                compras.CODIGO_COMPRAS,
                compras.VALOR_COMPRAS,
                compras.STATUS_COMPRAS,
                compras.DATA_CAD_COMPRAS,
                
                clientes.NOME_CLIENTES,
                clientes.CEP_CLIENTES,
                clientes.CIDADE_CLIENTES,
                clientes.ESTADO_CLIENTES,
                clientes.ENDERECO_CLIENTES,
                clientes.NUMERO_CLIENTES,
                clientes.BAIRRO_CLIENTES,

                compras_itens.NOME_PRODUTOS,
                compras_itens.CODIGO_ITENS
            FROM 
                compras_pagamentos
            INNER JOIN compras_itens ON compras_pagamentos.ID_COMPRAS_ITENS = compras_itens.ID_COMPRA_ITENS
            INNER JOIN compras ON compras_itens.ID_COMPRAS = compras.ID_COMPRAS
            INNER JOIN clientes ON (compras.ID_CLIENTES_COMPRAS = clientes.ID_CLIENTES)
            WHERE 
                clientes.ID_USUARIOS = :ID_USUARIOS
            ORDER BY compras_itens.NOME_PRODUTOS DESC';

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_USUARIOS', $id_clientes_compras);
    $resultado->execute();

    while($resultadoCompras = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $viewDetalhesPagamentos[] = array_map('utf8_encode', $resultadoCompras);
    }

    echo json_encode($viewDetalhesPagamentos, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>