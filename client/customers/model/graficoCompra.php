<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","new_supermercado");

$sqlQuery = "SELECT 
COUNT(compras.ID_COMPRAS) AS  total_vendas, 
DATE_FORMAT(compras.DATA_CAD_COMPRAS, '%m/%Y') AS  data_ ,
clientes.NOME_CLIENTES
FROM 
compras
INNER JOIN clientes ON compras.ID_CLIENTES_COMPRAS = clientes.ID_CLIENTES
WHERE 
DATE_FORMAT(`DATA_CAD_COMPRAS`, '%Y-%m') BETWEEN  '2020-01' AND '2020-12' AND clientes.ID_USUARIOS = 1
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