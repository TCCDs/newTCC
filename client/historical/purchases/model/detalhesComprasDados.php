<?php
    include_once ('../../../../server/Conn.php');
    $conn = new Conn();

    $codigos_itens = 2059952836;

    $sql = 'SELECT 
        compras_pagamentos.NOME_CARTAO,
        compras_pagamentos.NUMERO_CARTAO,
        compras_pagamentos.STATUS_PAGAMENTO,
        compras_pagamentos.CODIGO_PAGAMENTO,
        
        compras.CODIGO_COMPRAS,
        compras.VALOR_COMPRAS,
        compras.STATUS_COMPRAS,
        compras.DATA_CAD,
        
        clientes.NOME_CLIENTES,
        clientes.CEP_CLIENTES,
        clientes.CIDADE_CLIENTES,
        clientes.ESTADO_CLIENTES,
        clientes.ENDERECO_CLIENTES,
        clientes.NUMERO_CLIENTES,
        clientes.BAIRRO_CLIENTES,

        compras_itens.NOME_PRODUTOS
    FROM 
        compras_pagamentos
    INNER JOIN compras_itens ON compras_pagamentos.ID_COMPRAS_ITENS = compras_itens.ID_COMPRA_ITENS
    INNER JOIN compras ON compras_itens.ID_COMPRAS = compras.ID_COMPRAS
    INNER JOIN clientes ON (compras.ID_CLIENTES_COMPRAS = clientes.ID_CLIENTES)
    WHERE 
        compras_itens.CODIGO_ITENS = :CODIGO_ITENS
    ORDER BY compras_itens.NOME_PRODUTOS DESC';

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':CODIGO_ITENS', $codigos_itens);
    $resultado->execute();

    while($resultadoCompras = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $detalhesDadosCompras[] = array_map('utf8_encode', $resultadoCompras);
    }

    echo json_encode($detalhesDadosCompras);
?>