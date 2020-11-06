<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();

    $idProdutos = $_POST['ID_ADMINISTRADOR'];
    $statusADMINISTRADOR = 'D';

    try {
        //$sql = "DELETE FROM ADMINISTRADOR WHERE ID_ADMINISTRADOR = :ID_ADMINISTRADOR";
        $sql = "UPDATE ADMINISTRADOR SET STATUS_ADMINISTRADOR = :STATUS_ADMINISTRADOR WHERE ID_ADMINISTRADOR = :ID_ADMINISTRADOR";
        $resultado = $conn->getConn()->prepare($sql);
        $resultado->bindParam(':ID_ADMINISTRADOR', $idADMINISTRADOR);
        $resultado->bindParam(':STATUS_ADMINISTRADOR', $statusADMINISTRADOR);
        $resultado->execute();

        $data = array('return' => true);

    } catch (Exception $ex){
        $data = array('return' => $ex->getMessage());
    }
        echo json_encode($data);
?>
