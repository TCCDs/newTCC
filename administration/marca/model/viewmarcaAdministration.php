<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();

    $ID_MARCA = $_POST['ID_marca'];

    $sql = "SELECT * FROM marca WHERE ID_MARCA = :ID_MARCA";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_MARCA',$ID_MARCA, PDO::PARAM_INT);
    $resultado->execute();

    while($resultadoMarca = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $marca[] = array_map('utf8_encode', $resultadoMarca);
    }

    echo json_encode($marca, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
