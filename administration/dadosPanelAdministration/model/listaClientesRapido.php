<?php
    include_once('../../../server/Connect.php');
    $conn = new Conn();

    $sql = "SELECT 
                clientes.ID_CLIENTES,
                clientes.NOME_CLIENTES, 
                login_usuarios.LOGIN_USUARIOS,
                clientes.CELULAR_CLIENTES 
            FROM 
                clientes
            INNER JOIN login_usuarios ON clientes.ID_USUARIOS = login_usuarios.ID_USUARIOS
            ORDER BY clientes.ID_CLIENTES DESC LIMIT 10";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->execute();

    while ($resultadoListaClientes = $resultado->fetch(PDO::FETCH_ASSOC)):
        $listaClientesRapido[] = array_map('utf8_encode', $resultadoListaClientes);
    endwhile;

    echo json_encode($listaClientesRapido, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

?>