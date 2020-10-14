<?php
    session_start();
    include_once ('../../../server/Connect.php');
    $conn = new Conn();

    $qr_code = $_POST['qrcode'];

    $sql = "SELECT  produtos.NOME_PRODUTOS AS NOME_PRODUTOS,
                produtos.QR_CODE_PRODUTOS,
                ofertas.PRECO_OFERTA AS PRECO_VENDA_PRODUTOS
            FROM ofertas
            INNER JOIN produtos ON ofertas.ID_PRODUTOS = produtos.ID_PRODUTOS
            WHERE produtos.QR_CODE_PRODUTOS = :QR_CODE AND ofertas.STATUS_OFERTA = 'A'
            ";

    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':QR_CODE', $qr_code, PDO::PARAM_INT);
    $resultado->execute();

    while($resultado_user = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $produtos[] = array_map('utf8_encode', $resultado_user);
    }

    $_SESSION['testeProdutos'] = json_encode($produtos,  JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    header("Location: ../view/testeLeitor.html");

?>