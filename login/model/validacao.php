<?php
    include_once("../../server/conexao.php");

    $LOGIN_USUARIOS = $_POST['LOGIN_USUARIOS'];
    $SENHA_USUARIOS = $_POST['SENHA_USUARIOS'];

    $sql = "SELECT *, count(ID_USUARIOS) as registro FROM usuarios
                WHERE LOGIN_USUARIOS = '".$LOGIN_USUARIOS."' AND SENHA_USUARIOS = '".$SENHA_USUARIOS."' ";

    if (mysqli_query($conn, $sql)) {

        $pesquisa = mysqli_query($conn, $sql); //gerando um array com a consulta do banco de dados

        while ($resultado = mysqli_fetch_array($pesquisa)) {
            if ($resultado['registro'] == 1) {
                session_start();
                $_SESSION['ID_USUARIOS'] = $resultado['ID_USUARIOS'];
                $data = array("return" => true);
            } else {
                $data = array("return" => "Usuario e/ou senha não validado");
            }
        }
    }

    echo json_encode($data);

?>
