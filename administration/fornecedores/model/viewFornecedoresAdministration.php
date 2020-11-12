<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();

    $ID_FORNECEDORES = $_POST['ID_FORNECEDORES'];

    $sql = "SELECT * FROM fornecedores WHERE ID_FORNECEDORES = :ID_FORNECEDORES";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_FORNECEDORES',$ID_FORNECEDORES, PDO::PARAM_INT);
    $resultado->execute();

    while($resultadoFornecedores = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $fornecedor[] = array_map('utf8_encode', $resultadoFornecedores);
    }

    echo json_encode($fornecedor, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
