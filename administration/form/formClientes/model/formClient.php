<?php
session_start();

//$connect = new PDO("mysql:host=localhost;dbname=new_supermercado", "root", "");
include_once('../../../../server/Conn.php');
$conn = new Conn();

if(isset($_POST["NOME_CLIENTES"])) {

    try {
        $sql = "INSERT INTO clientes (ID_USUARIOS, NOME_CLIENTES, RG_CLIENTES, CPF_CLIENTES, SEXO_CLIENTES, DATA_NASCIMENTO_CLIENTES, EMAIL_CLIENTES, CELULAR_CLIENTES, CEP_CLIENTES, CIDADE_CLIENTES, ESTADO_CLIENTES, ENDERECO_CLIENTES, NUMERO_CLIENTES, BAIRRO_CLIENTES, NACIONALIDADE_CLIENTES, COMPLEMENTO_CLIENTES)
                VALUES (:ID_USUARIOS, :NOME_CLIENTES, :RG_CLIENTES, :CPF_CLIENTES, :SEXO_CLIENTES, :DATA_NASCIMENTO_CLIENTES, :EMAIL_CLIENTES, :CELULAR_CLIENTES, :CEP_CLIENTES, :CIDADE_CLIENTES, :ESTADO_CLIENTES, :ENDERECO_CLIENTES, :NUMERO_CLIENTES, :BAIRRO_CLIENTES, :NACIONALIDADE_CLIENTES, :COMPLEMENTO_CLIENTES)
    ";

    $user_data = array(
        ':ID_USUARIOS'                  => $_SESSION['idUsuario'],
        ':NOME_CLIENTES'                => $_POST["NOME_CLIENTES"],
        ':RG_CLIENTES'                  => $_POST["RG_CLIENTES"],
        ':CPF_CLIENTES'                 => $_POST["CPF_CLIENTES"],
        ':SEXO_CLIENTES'                => $_POST["SEXO_CLIENTES"],
        ':DATA_NASCIMENTO_CLIENTES'     => $_POST['DATA_NASCIMENTO_CLIENTES'],
        ':EMAIL_CLIENTES'               => $_POST["EMAIL_CLIENTES"],
        ':CELULAR_CLIENTES'             => $_POST["CELULAR_CLIENTES"],
        ':CEP_CLIENTES'                 => $_POST["CEP_CLIENTES"],
        ':CIDADE_CLIENTES'              => $_POST["CIDADE_CLIENTES"],
        ':ESTADO_CLIENTES'              => $_POST["ESTADO_CLIENTES"],
        ':ENDERECO_CLIENTES'            => $_POST["ENDERECO_CLIENTES"],
        ':NUMERO_CLIENTES'              => $_POST['NUMERO_CLIENTES'],
        ':BAIRRO_CLIENTES'              => $_POST["BAIRRO_CLIENTES"],
        ':NACIONALIDADE_CLIENTES'       => $_POST["NACIONALIDADE_CLIENTES"],
        ':COMPLEMENTO_CLIENTES'         => $_POST["COMPLEMENTO_CLIENTES"]
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