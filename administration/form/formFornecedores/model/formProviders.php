<?php
//$connect = new PDO("mysql:host=localhost;dbname=new_supermercado", "root", "");
include_once("../../../../server/Conn.php");
$conn = new Conn();


if(isset($_POST["NOME_FANTASIA_FORNECEDORES"])) {
    try{
    $sql = "INSERT INTO fornecedores (NOME_FANTASIA_FORNECEDORES, RAZAO_SOCIAL_FORNECEDORES, CNPJ_FORNECEDORES, EMAIL_FORNECEDORES, CELULAR_FORNECEDORES, SEXO_FORNECEDORES, DATA_NASCIMENTO_FORNECEDORES, NACIONALIDADE_FORNECEDORES, CEP_FORNECEDORES, CIDADE_FORNECEDORES, ESTADO_FORNECEDORES, ENDERECO_FORNECEDORES, NUMERO_FORNECEDORES, BAIRRO_FORNECEDORES, COMPLEMENTO_FORNECEDORES)
                VALUES (:NOME_FANTASIA_FORNECEDORES, :RAZAO_SOCIAL_FORNECEDORES, :CNPJ_FORNECEDORES, :EMAIL_FORNECEDORES, :CELULAR_FORNECEDORES, :SEXO_FORNECEDORES, :DATA_NASCIMENTO_FORNECEDORES, :NACIONALIDADE_FORNECEDORES, :CEP_FORNECEDORES, :CIDADE_FORNECEDORES, :ESTADO_FORNECEDORES, :ENDERECO_FORNECEDORES, :NUMERO_FORNECEDORES, :BAIRRO_FORNECEDORES, :COMPLEMENTO_FORNECEDORES)
    ";

    $user_data = array(
        ':NOME_FANTASIA_FORNECEDORES'       => $_POST["NOME_FANTASIA_FORNECEDORES"],
        ':RAZAO_SOCIAL_FORNECEDORES'        => $_POST["RAZAO_SOCIAL_FORNECEDORES"],
        ':CNPJ_FORNECEDORES'                => $_POST["CNPJ_FORNECEDORES"],
        ':EMAIL_FORNECEDORES'               => $_POST["EMAIL_FORNECEDORES"],
        ':CELULAR_FORNECEDORES'             => $_POST['CELULAR_FORNECEDORES'],
        ':SEXO_FORNECEDORES'                => $_POST["SEXO_FORNECEDORES"],
        ':DATA_NASCIMENTO_FORNECEDORES'     => $_POST["DATA_NASCIMENTO_FORNECEDORES"],
        ':NACIONALIDADE_FORNECEDORES'       => $_POST["NACIONALIDADE_FORNECEDORES"],
        ':CEP_FORNECEDORES'                 => $_POST["CEP_FORNECEDORES"],
        ':CIDADE_FORNECEDORES'              => $_POST["CIDADE_FORNECEDORES"],
        ':ESTADO_FORNECEDORES'              => $_POST["ESTADO_FORNECEDORES"],
        ':ENDERECO_FORNECEDORES'            => $_POST['ENDERECO_FORNECEDORES'],
        ':NUMERO_FORNECEDORES'              => $_POST["NUMERO_FORNECEDORES"],
        ':BAIRRO_FORNECEDORES'              => $_POST["BAIRRO_FORNECEDORES"],
        ':COMPLEMENTO_FORNECEDORES'         => $_POST["COMPLEMENTO_FORNECEDORES"]
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
