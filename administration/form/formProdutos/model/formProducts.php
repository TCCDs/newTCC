<?php

$connect = new PDO("mysql:host=localhost;dbname=new_supermercado", "root", "");

if(isset($_POST["NOME_PRODUTOS"])) {
    try{
    $query = "INSERT INTO produtos (NOME_PRODUTOS, PRECO_CUSTO_PRODUTOS, PRECO_VENDA_PRODUTOS, PESO_PRODUTOS, VALIDADE_PRODUTOS, DESCRICAO_PRODUTOS, ID_FORNECEDORES_PRODUTOS, ID_MARCAS_PRODUTOS, QR_CODE_PRODUTOS, ESTOQUE_PRODUTOS, CATEGORIAS_PRODUTOS, CORREDOR_PRODUTOS, PRATILEIRA_PRODUTOS, LOTE_PRODUTOS, STATUS_PRODUTOS)
                VALUES (:NOME_PRODUTOS, :PRECO_CUSTO_PRODUTOS, :PRECO_VENDA_PRODUTOS, :PESO_PRODUTOS, :VALIDADE_PRODUTOS, :DESCRICAO_PRODUTOS, :ID_FORNECEDORES_PRODUTOS, :ID_MARCAS_PRODUTOS, :QR_CODE_PRODUTOS, :ESTOQUE_PRODUTOS, :CATEGORIAS_PRODUTOS, :CORREDOR_PRODUTOS, :PRATILEIRA_PRODUTOS, :LOTE_PRODUTOS, :STATUS_PRODUTOS)
    ";

    $user_data = array(
        ':NOME_PRODUTOS'                => $_POST["NOME_PRODUTOS"],
        ':PRECO_CUSTO_PRODUTOS'         => $_POST["PRECO_CUSTO_PRODUTOS"],
        ':PRECO_VENDA_PRODUTOS'         => $_POST["PRECO_VENDA_PRODUTOS"],
        ':PESO_PRODUTOS'                => $_POST["PESO_PRODUTOS"],
        ':VALIDADE_PRODUTOS'            => $_POST['VALIDADE_PRODUTOS'],
        ':DESCRICAO_PRODUTOS'           => $_POST["DESCRICAO_PRODUTOS"],
        ':ID_FORNECEDORES_PRODUTOS'     => $_POST["ID_FORNECEDORES_PRODUTOS"],
        ':ID_MARCAS_PRODUTOS'           => $_POST["ID_MARCAS_PRODUTOS"],
        ':QR_CODE_PRODUTOS'             => $_POST["QR_CODE_PRODUTOS"],
        ':ESTOQUE_PRODUTOS'             => $_POST["ESTOQUE_PRODUTOS"],
        ':CATEGORIAS_PRODUTOS'          => $_POST["CATEGORIAS_PRODUTOS"],
        ':CORREDOR_PRODUTOS'            => $_POST["CORREDOR_PRODUTOS"],
        ':PRATILEIRA_PRODUTOS'          => $_POST["PRATILEIRA_PRODUTOS"],
        ':LOTE_PRODUTOS'                => $_POST['LOTE_PRODUTOS'],
        ':STATUS_PRODUTOS'              => $_POST["STATUS_PRODUTOS"]
    );

    $statement = $connect->prepare($query);
    $statement->execute($user_data);

        $data = array('return' => true);

    } catch (Exception $ex){
        $data = array('return' => $ex->getMessage());
    }
        echo json_encode($data);
}
?>