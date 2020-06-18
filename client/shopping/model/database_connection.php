
<?php

//database_connection.php
//$connect = new PDO("mysql:host=localhost;dbname=carrinho", "root", "");


$localhost = "localhost";
$database = "testing";
$username = "root";
$password = "";

if ($connect = mysqli_connect($localhost, $username, $password, $database)) {
   // echo "banco de dados conectado...";
} else {
    echo "Erro: ".mysqli_connect_error();
}
?>
