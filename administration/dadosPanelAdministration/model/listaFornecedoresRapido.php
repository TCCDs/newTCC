<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();

    $sql = "SELECT 
                fornecedores.ID_FORNECEDORES,
                fornecedores.NOME_FANTASIA_FORNECEDORES,
                fornecedores.EMAIL_FORNECEDORES,
                fornecedores.CELULAR_FORNECEDORES
            FROM 
                fornecedores
            ORDER BY fornecedores.ID_FORNECEDORES DESC LIMIT 10";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while ($resultadoListaFornecedores = $resultado->fetch(PDO::FETCH_ASSOC)):
        $listaFornecedoresRapido[] = array_map('utf8_encode', $resultadoListaFornecedores);
    endwhile;

    echo json_encode($listaFornecedoresRapido, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

?>