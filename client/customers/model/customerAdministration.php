<?php
    session_start();
    //include_once('../../../server/conexao.php');
    include_once ('../../../server/Conn.php');

    $id_usuarios_clientes = $_SESSION['ID_USUARIOS'];
    
    $conn = new Conn();

    $sql = "SELECT * FROM clientes
    INNER  JOIN usuarios ON clientes.ID_USUARIOS_CLIENTES = usuarios.ID_USUARIOS
    WHERE clientes.ID_USUARIOS_CLIENTES = :ID_USUARIOS_CLIENTES ";
    
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_USUARIOS_CLIENTES', $id_usuarios_clientes, PDO::PARAM_INT);
    $resultado->execute();

    while($resultado_user = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $cliente[] = array_map('utf8_encode', $resultado_user);

    }

    echo json_encode($cliente);

?>



