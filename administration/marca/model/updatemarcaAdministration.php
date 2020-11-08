<?php
    include_once('../../../server/conexao.php');

    $ID_MARCA = $_POST['ID_MARCA'];
    $NOME_MARCA = $_POST['NOME_MARCA'];
    $CODIGO_MARCA = $_POST['CODIGO_MARCA'];


        $sql = "UPDATE marca
                    SET NOME_MARCA = '".$NOME_MARCA."',
                        CODIGO_MARCA = '".$CODIGO_MARCA."',
                        WHERE ID_MARCA = '".$ID_MARCA."'
                ";

        if (mysqli_query($conn, $sql)) {
            $data = array("return" => true);
        } else {
            $data = array("return" => mysqli_error($conn));
        }

    echo json_encode($data);

?>
