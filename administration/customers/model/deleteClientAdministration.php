<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();

    $idClient = $_POST['ID_CLIENTES'];
    $statusClient = 'D';

    try {
        $sql = "UPDATE clientes SET STATUS_CLIENTES = :STATUS_CLIENTES WHERE ID_CLIENTES = :ID_CLIENTES";
        $resultado = $conn->getConn()->prepare($sql);
        $resultado->bindParam(':ID_CLIENTES', $idClient);
        $resultado->bindParam(':STATUS_CLIENTES', $statusClient);
        $resultado->execute();

        $data = array('return' => true);

    } catch (Exception $ex){
        $data = array('return' => $ex->getMessage());
    }
        echo json_encode($data);
?>
