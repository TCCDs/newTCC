<?php
    session_start();
    include_once ('../../../server/Conn.php');
    $conn = new Conn();

    $qr_code = $_POST['qrcode'];

    $sql = "SELECT * FROM produtos WHERE produtos.QR_CODE_PRODUTOS = :QR_CODE";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':QR_CODE', $qr_code, PDO::PARAM_INT);
    $resultado->execute();

    while($resultado_user = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $produtos[] = array_map('utf8_encode', $resultado_user);
    }

    $_SESSION['testeProdutos'] = json_encode($produtos);
    header("Location: ../view/testeLeitor.html");

?>