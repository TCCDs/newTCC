<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();

    $idAdministrador = $_POST['ID_ADMINISTRADOR'];
    $statusAdministrador = 'D';

    try {
        //$sql = "DELETE FROM ADMINISTRADOR WHERE ID_ADMINISTRADOR = :ID_ADMINISTRADOR";
        $sql = "UPDATE administrador SET STATUS_ADMINISTRADOR = :STATUS_ADMINISTRADOR WHERE ID_ADMINISTRADOR = :ID_ADMINISTRADOR";
        $resultado = $conn->getConn()->prepare($sql);
        $resultado->bindParam(':ID_ADMINISTRADOR', $idAdministrador);
        $resultado->bindParam(':STATUS_ADMINISTRADOR', $statusAdministrador);
        $resultado->execute();

        $data = array('return' => true);

    } catch (Exception $ex){
        $data = array('return' => $ex->getMessage());
    }
        echo json_encode($data);
?>
