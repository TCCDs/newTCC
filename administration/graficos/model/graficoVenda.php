<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","new_supermercado");

$sqlQuery = "SELECT COUNT(compras.ID_COMPRAS) AS  total_vendas, DATE_FORMAT(compras.DATA_CAD_COMPRAS, '%m/%Y') AS  data_ from compras
WHERE DATE_FORMAT(`DATA_CAD_COMPRAS`, '%Y-%m') BETWEEN '2020-01' AND '2020-12'
group BY data_
order BY data_";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>