<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();

    $sql = "SELECT * FROM fornecedores";
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while($resultadoFornecedor = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $fornecedor[] = array_map('utf8_encode', $resultadoFornecedor);

    }

    echo json_encode($fornecedor, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

?>
