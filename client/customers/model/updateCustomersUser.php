<?php
    include_once ('../../../server/Conn.php');
    $conn = new Conn();

        $ID_CLIENTES = $_POST['ID_CLIENTES'];
        $EMAIL_CLIENTES = $_POST['EMAIL_CLIENTES'];
        $NOME_CLIENTES = $_POST['NOME_CLIENTES'];
        $CPF_CLIENTES = $_POST['CPF_CLIENTES'];
        $RG_CLIENTES = $_POST['RG_CLIENTES'];
        $DATA_NASCIMENTO_CLIENTES = $_POST['DATA_NASCIMENTO_CLIENTES'];
        $SEXO_CLIENTES = $_POST['SEXO_CLIENTES'];
        $NACIONALIDADE_CLIENTES = $_POST['NACIONALIDADE_CLIENTES'];
        $CELULAR_CLIENTES = $_POST['CELULAR_CLIENTES'];

        try {
            $sql = "UPDATE clientes SET EMAIL_CLIENTES = :EMAIL_CLIENTES, NOME_CLIENTES = :NOME_CLIENTES, CPF_CLIENTES = :CPF_CLIENTES, RG_CLIENTES = :RG_CLIENTES, DATA_NASCIMENTO_CLIENTES = :DATA_NASCIMENTO_CLIENTES, SEXO_CLIENTES = :SEXO_CLIENTES, NACIONALIDADE_CLIENTES = :NACIONALIDADE_CLIENTES, CELULAR_CLIENTES = :CELULAR_CLIENTES  WHERE ID_CLIENTES = :ID_CLIENTES";

            $resultado = $conn->getConn()->prepare($sql);
            $resultado->bindParam(':EMAIL_CLIENTES', $EMAIL_CLIENTES);
            $resultado->bindParam(':NOME_CLIENTES', $NOME_CLIENTES);
            $resultado->bindParam(':CPF_CLIENTES', $CPF_CLIENTES);
            $resultado->bindParam(':RG_CLIENTES', $RG_CLIENTES);
            $resultado->bindParam(':DATA_NASCIMENTO_CLIENTES', $DATA_NASCIMENTO_CLIENTES);
            $resultado->bindParam(':SEXO_CLIENTES', $SEXO_CLIENTES);
            $resultado->bindParam(':NACIONALIDADE_CLIENTES', $NACIONALIDADE_CLIENTES);
            $resultado->bindParam(':CELULAR_CLIENTES', $CELULAR_CLIENTES);
            $resultado->bindParam(':ID_CLIENTES', $ID_CLIENTES);
            $resultado->execute();
            
            $data = array('return' => true);

        } catch (Exception $ex){
            $data = array('return' => $ex->getMessage());
        }
            echo json_encode($data);
?>
