<?php
    include_once('../../../server/conexao.php');

    $ID_PRODUTOS = $_POST['ID_PRODUTOS'];
    $NOME_PRODUTOS = $_POST['NOME_PRODUTOS'];
    $PRECO_CUSTO_PRODUTOS = $_POST['PRECO_CUSTO_PRODUTOS'];
    $PRECO_VENDA_PRODUTOS = $_POST['PRECO_VENDA_PRODUTOS'];
    $VALIDADE_PRODUTOS = $_POST['VALIDADE_PRODUTOS'];
    $DESCRICAO_PRODUTOS = $_POST['DESCRICAO_PRODUTOS'];
    $QR_CODE_PRODUTOS = $_POST['QR_CODE_PRODUTOS'];
    $ESTOQUE_PRODUTOS = $_POST['ESTOQUE_PRODUTOS'];
    $CATEGORIAS_PRODUTOS = $_POST['CATEGORIAS_PRODUTOS'];
    $CORREDOR_PRODUTOS = $_POST['CORREDOR_PRODUTOS'];
    $PRATILEIRA_PRODUTOS = $_POST['pPRATILEIRAPRODUTOS'];
    $LOTE_PRODUTOS = $_POST['LOTE_PRODUTOS'];

        $sql = "UPDATE produtos
                    SET NOME_PRODUTOS = '".$NOME_PRODUTOS."',
                        PRECO_CUSTO_PRODUTOS = '".$PRECO_CUSTO_PRODUTOS."',
                        PRECO_VENDA_PRODUTOS = '".$PRECO_VENDA_PRODUTOS."',
                        VALIDADE_PRODUTOS = '".$VALIDADE_PRODUTOS."',
                        DESCRICAO_PRODUTOS = '".$DESCRICAO_PRODUTOS."',
                        QR_CODE_PRODUTOS = '".$QR_CODE_PRODUTOS."',
                        ESTOQUE_PRODUTOS = '".$ESTOQUE_PRODUTOS."',
                        CATEGORIAS_PRODUTOS = '".$CATEGORIAS_PRODUTOS."',
                        CORREDOR_PRODUTOS = '".$CORREDOR_PRODUTOS."',
                        PRATILEIRA_PRODUTOS = '".$pPRATILEIRAPRODUTOS."'
                        LOTE_PRODUTOS = '".$LOTE_PRODUTOS."',
                        WHERE ID_PRODUTOS = '".$ID_PRODUTOS."'
                ";

        if (mysqli_query($conn, $sql)) {
            $data = array("return" => true);
        } else {
            $data = array("return" => mysqli_error($conn));
        }

    echo json_encode($data);

?>
