<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();

    $qr_code = 1399495777;

    // $qr_code = $_POST['qrcode'];

    $sql = "SELECT 
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
                clientes.BAIRRO_CLIENTES
            FROM 
                compras_pagamentos
            INNER JOIN compras_itens ON compras_pagamentos.ID_COMPRAS_ITENS = compras_itens.ID_COMPRA_ITENS
            INNER JOIN compras ON compras_itens.ID_COMPRAS = compras.ID_COMPRAS
            INNER JOIN clientes ON (compras.ID_CLIENTES_COMPRAS = clientes.ID_CLIENTES) 
            WHERE QR_CODE = :QR_CODE";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':QR_CODE', $qr_code, PDO::PARAM_INT);
    $resultado->execute();

    while($resultado_user = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $produtos[] = array_map('utf8_encode', $resultado_user);
    }

    echo json_encode($produtos);