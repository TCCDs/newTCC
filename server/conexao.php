<?php

    $localhost = "localhost";
    $database = "new_supermercado";
    $username = "root";
    $password = "";

    if ($conn = mysqli_connect($localhost, $username, $password, $database)) {
        //echo "banco de dados conectado...";
    } else {
        echo "Erro: ".mysqli_connect_error();
    }
?>