<?php
    session_start();
    include_once ('../../../server/Conn.php');
    $conn = new Conn();

    $sql = "SELECT  produtos.NOME_PRODUTOS,
                    produtos.QR_CODE_PRODUTOS,
                    ofertas.PRECO_OFERTA
            FROM ofertas
            INNER JOIN produtos ON ofertas.ID_PRODUTOS = produtos.ID_PRODUTOS
            WHERE produtos.QR_CODE_PRODUTOS = 15962370 AND ofertas.STATUS_OFERTA = 'A'
            ORDER BY produtos.NOME_PRODUTOS ASC";

    $resultado = $conn->getConn()->prepare($sql);
    //$resultado->bindParam(':QR_CODE', $qr_code, PDO::PARAM_INT);
    $resultado->execute();

    while($resultado_user = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $produtos[] = array_map('utf8_encode', $resultado_user);
    }

    echo json_encode($produtos,  JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    //header("Location: ../view/ofertas.html");

?>