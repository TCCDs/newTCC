<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();

    $ID_MOEDAS = $_POST['ID_MOEDAS'];

    $sql = "SELECT * FROM moedas WHERE ID_MOEDAS = :ID_MOEDAS";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_MOEDAS', $ID_MOEDAS, PDO::PARAM_INT);
    $resultado->execute();

    while($resultadoHistoricoMoedas = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $historicoMoedas[] = array_map('utf8_encode', $resultadoHistoricoMoedas);
    }

    echo json_encode($historicoMoedas, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
