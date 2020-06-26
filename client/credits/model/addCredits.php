<?php
    include_once('../../../server/conexao.php');
    session_start();

    $VALOR_MOEDAS = $_POST['VALOR_MOEDAS'];


    //variavel que receberá o código do usuario a quem o contato pertence
    $ID_CLIENTES_MOEDAS = $_SESSION['ID_USUARIOS'];

    if ($VALOR_MOEDAS != "") {

        $sql = "INSERT INTO moedas (VALOR_MOEDAS ,ID_CLIENTES_MOEDAS)
        VALUES ('".$VALOR_MOEDAS."','".$ID_CLIENTES_MOEDAS."')";

        if (mysqli_query($conn, $sql)) {
            $data = array("return" => true);
        } else {
            $data = array("return" => mysqli_error($conn));
        }
    } else {
        $data = array("return" => "O campos valorio é obrigatórios...");
    }

    echo json_encode($data);

?>
