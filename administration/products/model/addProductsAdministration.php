<?php
    include_once('../../../server/conexao.php');

    $NOME_PRODUTOS = $_POST['NOME_PRODUTOS'];
    $PRECO_CUSTO_PRODUTOS = $_POST['PRECO_CUSTO_PRODUTOS'];
    $PRECO_VENDA_PRODUTOS = $_POST['PRECO_VENDA_PRODUTOS'];
    $VALIDADE_PRODUTOS = $_POST['VALIDADE_PRODUTOS'];
    $DESCRICAO_PRODUTOS = $_POST['DESCRICAO_PRODUTOS'];
    $QR_CODE_PRODUTOS = $_POST['QR_CODE_PRODUTOS'];
    $ESTOQUE_PRODUTOS = $_POST['ESTOQUE_PRODUTOS'];
    $CATEGORIAS_PRODUTOS = $_POST['CATEGORIAS_PRODUTOS'];
    $CORREDOR_PRODUTOS = $_POST['CORREDOR_PRODUTOS'];
    $PRATILEIRA_PRODUTOS = $_POST['PRATILEIRAPRODUTOS'];
    $LOTE_PRODUTOS = $_POST['LOTE_PRODUTOS'];

    //variavel que receberá o código do usuario a quem o produtos pertence
    //$usuario_idUsuario = 3;

    if ($NOME_PRODUTOS != "" &&  $PRECO_VENDA_PRODUTOS != "") {

        $sql = "INSERT INTO produtos (NOME_PRODUTOS,  PRECO_CUSTO_PRODUTOS, PRECO_VENDA_PRODUTOS, VALIDADE_PRODUTOS, DESCRICAO_PRODUTOS, QR_CODE_PRODUTOS, ESTOQUE_PRODUTOS, CATEGORIAS_PRODUTOS, CORREDOR_PRODUTOS, PRATILEIRA_PRODUTOS, LOTE_PRODUTOS)
        VALUES ('".$NOME_PRODUTOS."', '".$PRECO_CUSTO_PRODUTOS."','".$PRECO_VENDA_PRODUTOS."', '".$VALIDADE_PRODUTOS."', '".$DESCRICAO_PRODUTOS."', '".$QR_CODE_PRODUTOS."', '".$ESTOQUE_PRODUTOS."', '".$CATEGORIAS_PRODUTOS."', '".$CORREDOR_PRODUTOS."', '".$PRATILEIRA_PRODUTOS."', '".$LOTE_PRODUTOS."')";

        if (mysqli_query($conn, $sql)) {
            $data = array("return" => true);
        } else {
            $data = array("return" => mysqli_error($conn));
        }
    } else {
        $data = array("return" => "Os campos Nome e Preco são obrigatórios...");
    }

    echo json_encode($data);

?>
