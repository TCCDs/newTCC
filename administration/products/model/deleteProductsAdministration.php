<?php
    include_once ('../../../server/Conn.php');
    $conn = new Conn();

    $idProdutos = $_POST['ID_PRODUTOS'];
    $statusProdutos = 'D';

    try {
        //$sql = "DELETE FROM produtos WHERE ID_PRODUTOS = :ID_PRODUTOS";
        $sql = "UPDATE produtos SET STATUS_PRODUTOS = :STATUS_PRODUTOS WHERE ID_PRODUTOS = :ID_PRODUTOS";
        $resultado = $conn->getConn()->prepare($sql);
        $resultado->bindParam(':ID_PRODUTOS', $idProdutos);
        $resultado->bindParam(':STATUS_PRODUTOS', $statusProdutos);
        $resultado->execute();

        $data = array('return' => true);

    } catch (Exception $ex){
        $data = array('return' => $ex->getMessage());
    }
        echo json_encode($data);
?>
