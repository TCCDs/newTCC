<?php
    include_once('../../../server/conexao.php');

    $ID_CLIENTES = $_POST['ID_CLIENTES'];
    $NOME_CLIENTES = $_POST['NOME_CLIENTES'];
    $EMAIL_CLIENTES = $_POST['EMAIL_CLIENTES'];
    $CELULAR_CLIENTES = $_POST['CELULAR_CLIENTES'];
    $RG_CLIENTES = $_POST['RG_CLIENTES'];
    $CPF_CLIENTES = $_POST['CPF_CLIENTES'];
    $DATA_NASCIMENTO_CLIENTES = $_POST['DATA_NASCIMENTO_CLIENTES'];
    $SEXO_CLIENTES = $_POST['SEXO_CLIENTES'];
    $NACIONALIDADE_CLIENTES = $_POST['NACIONALIDADE_CLIENTES'];
    $CIDADE_CLIENTES = $_POST['CIDADE_CLIENTES'];
    $ESTADO_CLIENTES = $_POST['ESTADO_CLIENTES'];
    $ENDERECO_CLIENTES = $_POST['ENDERECO_CLIENTES'];
    $BAIRRO_CLIENTES = $_POST['BAIRRO_CLIENTES'];
    $CEP_CLIENTES = $_POST['CEP_CLIENTES'];
    $COMPLEMENTO_CLIENTES = $_POST['COMPLEMENTOS_CLIENTES'];

    $NOME_CLIENTES = utf8_decode($NOME_CLIENTES);
    $ENDERECO_CLIENTES = utf8_decode($ENDERECO_CLIENTES);


        $sql = "UPDATE clientes
                    SET NOME_CLIENTES = '".$NOME_CLIENTES."',
                        EMAIL_CLIENTES = '".$EMAIL_CLIENTES."',
                        CELULAR_CLIENTES = '".$CELULAR_CLIENTES."',
                        RG_CLIENTES = '".$RG_CLIENTES."',
                        CPF_CLIENTES = '".$CPF_CLIENTES."',
                        DATA_NASCIMENTO_CLIENTES = '".$DATA_NASCIMENTO_CLIENTES."',
                        SEXO_CLIENTES = '".$SEXO_CLIENTES."',
                        NACIONALIDADE_CLIENTES = '".$NACIONALIDADE_CLIENTES."',
                        CIDADE_CLIENTES = '".$CIDADE_CLIENTES."',
                        ESTADO_CLIENTES = '".$ESTADO_CLIENTES."',
                        ENDERECO_CLIENTES = '".$ENDERECO_CLIENTES."',
                        BAIRRO_CLIENTES = '".$BAIRRO_CLIENTES."',
                        CEP_CLIENTES = '".$CEP_CLIENTES."',
                        COMPLEMENTO_CLIENTES = '".$COMPLEMENTO_CLIENTES."'

                        WHERE ID_CLIENTES = ".$ID_CLIENTES."
                ";

        if (mysqli_query($conn, $sql)) {
            $data = array("return" => true);
        } else {
            $data = array("return" => mysqli_error($conn));
        }

    echo json_encode($data);

?>
