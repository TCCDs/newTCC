<?php
    include_once ('../../../server/Conn.php');
    $conn = new Conn();

        $ID_CLIENTES = $_POST['ID_CLIENTES'];
        $CEP_CLIENTES = $_POST['CEP_CLIENTES'];
        $ESTADO_CLIENTES = $_POST['ESTADO_CLIENTES'];
        $CIDADE_CLIENTES = $_POST['CIDADE_CLIENTES'];
        $ENDERECO_CLIENTES = $_POST['ENDERECO_CLIENTES'];
        $NUMERO_CLIENTES = $_POST['NUMERO_CLIENTES'];
        $BAIRRO_CLIENTES = $_POST['BAIRRO_CLIENTES'];
        $COMPLEMENTO_CLIENTES = $_POST['COMPLEMENTO_CLIENTES'];


        try {
            $sql = "UPDATE clientes SET CEP_CLIENTES = :CEP_CLIENTES, ESTADO_CLIENTES = :ESTADO_CLIENTES, CIDADE_CLIENTES = :CIDADE_CLIENTES, ENDERECO_CLIENTES = :ENDERECO_CLIENTES, NUMERO_CLIENTES = :NUMERO_CLIENTES, BAIRRO_CLIENTES = :BAIRRO_CLIENTES,  COMPLEMENTO_CLIENTES = :COMPLEMENTO_CLIENTES  WHERE ID_CLIENTES = :ID_CLIENTES";

            $resultado = $conn->getConn()->prepare($sql);
            $resultado->bindParam(':CEP_CLIENTES', $CEP_CLIENTES);
            $resultado->bindParam(':ESTADO_CLIENTES', $ESTADO_CLIENTES);
            $resultado->bindParam(':CIDADE_CLIENTES', $CIDADE_CLIENTES);
            $resultado->bindParam(':ENDERECO_CLIENTES', $ENDERECO_CLIENTES);
            $resultado->bindParam(':NUMERO_CLIENTES', $NUMERO_CLIENTES);
            $resultado->bindParam(':BAIRRO_CLIENTES', $BAIRRO_CLIENTES);
            $resultado->bindParam(':COMPLEMENTO_CLIENTES', $COMPLEMENTO_CLIENTES);
            $resultado->bindParam(':ID_CLIENTES', $ID_CLIENTES);
            $resultado->execute();
            
            $data = array('return' => true);

        } catch (Exception $ex){
            $data = array('return' => $ex->getMessage());
        }
            echo json_encode($data);
?>
