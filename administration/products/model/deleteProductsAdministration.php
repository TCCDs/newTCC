<?php
    include_once('../../../server/conexao.php');

    $sql = "DELETE FROM produtos WHERE ID_PRODUTOS = ".$_POST['ID_PRODUTOS']."";

    if (mysqli_query($conn, $sql)) {
        $data = array("return" => true);
    } else {
        $data = array("return" => mysqli_error($conn));
    }

    echo json_encode($data);
?>
