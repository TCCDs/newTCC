<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();

    $ID_COMPRAS = $_POST['ID_COMPRAS'];

    $sql = "SELECT 
                compras.CODIGO_COMPRAS,
                compras.VALOR_COMPRAS,
                compras.STATUS_COMPRAS,
                compras.DATA_CAD_COMPRAS,
                compras.TIPO_PAGAMENTO,
                
                clientes.NOME_CLIENTES,
                
                compras_itens.NOME_PRODUTOS,
                compras_itens.CODIGO_ITENS
                FROM 
                compras
                INNER JOIN compras_itens ON compras.ID_COMPRAS = compras_itens.ID_COMPRA_ITENS
                INNER JOIN clientes ON (compras.ID_CLIENTES_COMPRAS = clientes.ID_CLIENTES)
                WHERE 
                    compras.ID_COMPRAS = 51
                ORDER BY compras_itens.NOME_PRODUTOS DESC";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_COMPRAS', $ID_COMPRAS, PDO::PARAM_INT);
    $resultado->execute();

    while($resultadoHistoricoCompras = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $historicoCompras[] = array_map('utf8_encode', $resultadoHistoricoCompras);
    }

    echo json_encode($historicoCompras, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
