<?php
    session_start();
    $connect = mysqli_connect("localhost", "root", "", "new_shopping");  

    require_once '../../../vendor/autoload.php';

    use chillerlan\QRCode\QRCode;
    use chillerlan\QRCode\QROptions;

    $options = new QROptions([
        //versao do QRCode
        'version' => 5,
        //Error Correction Feature Level L
        'eccLevel' => QRCode::ECC_H, 
    ]);

    echo '<img src="'.(new QRCode($options))->render($_SESSION["QR_CODE"]).'" width="200"><br><hr>'; 

?>

<a href="../../../customerPanel.html"> Verificar compra </a>