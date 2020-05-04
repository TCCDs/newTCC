<?php
    include '../../../server/conexao.php';

    //$cookie_carrinho = stripslashes($_COOKIE['shopping_cart']);
    //$cart_carrinho = json_decode($cookie_carrinho, true);

    //$qrcode = $_POST['qrcode'];

    $QR_CODE_PRODUTOS  = 15962390;
    $sql = mysqli_query ($conn, "SELECT * FROM produtos where QR_CODE_PRODUTOS = '$QR_CODE_PRODUTOS ' ORDER BY ID_PRODUTOS limit 1");
    while($resultado = mysqli_fetch_assoc($sql)) {
        $listarProdutos[] = array_map('utf8_encode', $resultado);
    }

    echo json_encode($listarProdutos);
 ?>
