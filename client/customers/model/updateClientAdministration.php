<?php
    include_once ('../../../server/Conn.php');
    $conn = new Conn();

        $ID_CLIENTES = $_POST['ID_CLIENTES'];
        $NOME_CLIENTES = $_POST['NOME_CLIENTES'];
        $RG_CLIENTES = $_POST['RG_CLIENTES'];
        $CPF_CLIENTES = $_POST['CPF_CLIENTES'];
        $CELULAR_CLIENTES = $_POST['CELULAR_CLIENTES'];
        $CIDADE_CLIENTES = $_POST['CIDADE_CLIENTES'];
        $DATA_NASCIMENTO_CLIENTES = $_POST['DATA_NASCIMENTO_CLIENTES'];
        $SEXO_CLIENTES = $_POST['SEXO_CLIENTES'];
        $EMAIL_CLIENTES = $_POST['EMAIL_CLIENTES'];
        $CEP_CLIENTES = $_POST['CEP_CLIENTES'];
        $ESTADO_CLIENTES = $_POST['ESTADO_CLIENTES'];
        $BAIRRO_CLIENTES = $_POST['BAIRRO_CLIENTES'];
        $ENDERECO_CLIENTES = $_POST['ENDERECO_CLIENTES'];
        $COMPLEMENTO_CLIENTES = $_POST['COMPLEMENTO_CLIENTES'];
        $NACIONALIDADE_CLIENTES = $_POST['NACIONALIDADE_CLIENTES'];

        try {
            $sql = "UPDATE clientes SET NOME_CLIENTES = :NOME_CLIENTES, RG_CLIENTES = :RG_CLIENTES, CPF_CLIENTES = :CPF_CLIENTES, CELULAR_CLIENTES = :CELULAR_CLIENTES, CIDADE_CLIENTES = :CIDADE_CLIENTES,
            DATA_NASCIMENTO_CLIENTES = :DATA_NASCIMENTO_CLIENTES, SEXO_CLIENTES = :SEXO_CLIENTES, EMAIL_CLIENTES = :EMAIL_CLIENTES, CEP_CLIENTES = :CEP_CLIENTES, ESTADO_CLIENTES = :ESTADO_CLIENTES, BAIRRO_CLIENTES = :BAIRRO_CLIENTES, ENDERECO_CLIENTES = :ENDERECO_CLIENTES, COMPLEMENTO_CLIENTES = :COMPLEMENTO_CLIENTES, NACIONALIDADE_CLIENTES = :NACIONALIDADE_CLIENTES  WHERE ID_CLIENTES = :ID_CLIENTES";

            $resultado = $conn->getConn()->prepare($sql);
            $resultado->bindParam(':NOME_CLIENTES', $NOME_CLIENTES);
            $resultado->bindParam(':RG_CLIENTES', $RG_CLIENTES);
            $resultado->bindParam(':CPF_CLIENTES', $CPF_CLIENTES);
            $resultado->bindParam(':CELULAR_CLIENTES', $CELULAR_CLIENTES);
            $resultado->bindParam(':CIDADE_CLIENTES', $CIDADE_CLIENTES);
            $resultado->bindParam(':DATA_NASCIMENTO_CLIENTES', $DATA_NASCIMENTO_CLIENTES);
            $resultado->bindParam(':SEXO_CLIENTES', $SEXO_CLIENTES);
            $resultado->bindParam(':EMAIL_CLIENTES', $EMAIL_CLIENTES);
            $resultado->bindParam(':CEP_CLIENTES', $CEP_CLIENTES);
            $resultado->bindParam(':ESTADO_CLIENTES', $ESTADO_CLIENTES);
            $resultado->bindParam(':BAIRRO_CLIENTES', $BAIRRO_CLIENTES);
            $resultado->bindParam(':ENDERECO_CLIENTES', $ENDERECO_CLIENTES);
            $resultado->bindParam(':COMPLEMENTO_CLIENTES', $COMPLEMENTO_CLIENTES);
            $resultado->bindParam(':NACIONALIDADE_CLIENTES', $NACIONALIDADE_CLIENTES);
            $resultado->bindParam(':ID_CLIENTES', $ID_CLIENTES);
            $resultado->execute();
            
            $data = array('return' => true);

        } catch (Exception $ex){
            $data = array('return' => $ex->getMessage());
        }
            echo json_encode($data);
?>
