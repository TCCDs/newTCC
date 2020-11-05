<?php
session_start();

//$connect = new PDO("mysql:host=localhost;dbname=new_supermercado", "root", "");
include_once('../../../../server/Connect.php');
$conn = new Conn();

if(isset($_POST["NOME_ADMINISTRADOR"])) {

    try {
        $sql = "INSERT INTO ADMINISTRADOR (ID_ADMINISTRADOR, NOME_ADMINISTRADOR, RG_ADMINISTRADOR, CPF_ADMINISTRADOR, SEXO_ADMINISTRADOR, DATA_NASCIMENTO_ADMINISTRADOR, EMAIL_ADMINISTRADOR, CELULAR_ADMINISTRADOR, CEP_ADMINISTRADOR, CIDADE_ADMINISTRADOR, ESTADO_ADMINISTRADOR, ENDERECO_ADMINISTRADOR, NUMERO_ADMINISTRADOR, BAIRRO_ADMINISTRADOR, NACIONALIDADE_ADMINISTRADOR, COMPLEMENTO_ADMINISTRADOR)
                VALUES (:ID_ADMINISTRADOR, :NOME_ADMINISTRADOR, :RG_ADMINISTRADOR, :CPF_ADMINISTRADOR, :SEXO_ADMINISTRADOR, :DATA_NASCIMENTO_ADMINISTRADOR, :EMAIL_ADMINISTRADOR, :CELULAR_ADMINISTRADOR, :CEP_ADMINISTRADOR, :CIDADE_ADMINISTRADOR, :ESTADO_ADMINISTRADOR, :ENDERECO_ADMINISTRADOR, :NUMERO_ADMINISTRADOR, :BAIRRO_ADMINISTRADOR, :NACIONALIDADE_ADMINISTRADOR, :COMPLEMENTO_ADMINISTRADOR)
    ";

    $user_data = array(
        ':ID_ADMINISTRADOR'                  => $_SESSION['idAdministrador'],
        ':NOME_ADMINISTRADOR'                => $_POST["NOME_ADMINISTRADOR"],
        ':RG_ADMINISTRADOR'                  => $_POST["RG_ADMINISTRADOR"],
        ':CPF_ADMINISTRADOR'                 => $_POST["CPF_ADMINISTRADOR"],
        ':SEXO_ADMINISTRADOR'                => $_POST["SEXO_ADMINISTRADOR"],
        ':DATA_NASCIMENTO_ADMINISTRADOR'     => $_POST['DATA_NASCIMENTO_ADMINISTRADOR'],
        ':EMAIL_ADMINISTRADOR'               => $_POST["EMAIL_ADMINISTRADOR"],
        ':CELULAR_ADMINISTRADOR'             => $_POST["CELULAR_ADMINISTRADOR"],
        ':CEP_ADMINISTRADOR'                 => $_POST["CEP_ADMINISTRADOR"],
        ':CIDADE_ADMINISTRADOR'              => $_POST["CIDADE_ADMINISTRADOR"],
        ':ESTADO_ADMINISTRADOR'              => $_POST["ESTADO_ADMINISTRADOR"],
        ':ENDERECO_ADMINISTRADOR'            => $_POST["ENDERECO_ADMINISTRADOR"],
        ':NUMERO_ADMINISTRADOR'              => $_POST['NUMERO_ADMINISTRADOR'],
        ':BAIRRO_ADMINISTRADOR'              => $_POST["BAIRRO_ADMINISTRADOR"],
        ':NACIONALIDADE_ADMINISTRADOR'       => $_POST["NACIONALIDADE_ADMINISTRADOR"],
        ':COMPLEMENTO_ADMINISTRADOR'         => $_POST["COMPLEMENTO_ADMINISTRADOR"]
    );

    /*$statement = $connect->prepare($query);
    $statement->execute($user_data);*/

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute($user_data);

        $data = array('return' => true);

    } catch (Exception $ex){
        $data = array('return' => $ex->getMessage());
    }
        echo json_encode($data);
}
?>