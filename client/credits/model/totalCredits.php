<?php
require_once("../../../server/conexao.php");
session_start();

$ID_USUARIOS_CLIENTES = $_SESSION['ID_USUARIOS'];

$sql_nomeCliente = mysqli_query($conn, "SELECT sum(moedas.VALOR_MOEDAS) AS MOEDAS, clientes.NOME_CLIENTES from moedas
INNER JOIN clientes ON moedas.ID_CLIENTES_MOEDAS = clientes.ID_CLIENTES
WHERE clientes.ID_USUARIOS_CLIENTES = '". $ID_USUARIOS_CLIENTES."'
ORDER BY clientes.NOME_CLIENTES ASC");
  while($resultado = mysqli_fetch_assoc($sql_nomeCliente)) {
    $moedas[] = array_map('utf8_encode', $resultado);
  }

echo json_encode($moedas);


?>
