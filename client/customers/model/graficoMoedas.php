<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","new_supermercado");

$sqlQuery ="SELECT 
SUM(moedas.VALOR_MOEDAS) AS  total_moedas, 
DATE_FORMAT(moedas.DATA_CAD_MOEDAS, '%m/%Y') AS  data_,
clientes.NOME_CLIENTES
FROM
moedas
INNER JOIN clientes ON moedas.ID_CLIENTES_MOEDAS = clientes.ID_CLIENTES
WHERE 
DATE_FORMAT(`DATA_CAD_MOEDAS`, '%Y-%m') BETWEEN '2020-01' AND '2020-12' AND clientes.ID_USUARIOS = 1
GROUP BY data_
ORDER BY data_";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>