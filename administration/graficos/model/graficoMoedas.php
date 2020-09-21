<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","new_supermercado");

$sqlQuery ="SELECT 
SUM(moedas.VALOR_MOEDAS) AS  total_moedas, DATE_FORMAT(moedas.DATA_CAD_MOEDAS, '%m/%Y') AS  data_
FROM
moedas
WHERE 
DATE_FORMAT(`DATA_CAD_MOEDAS`, '%Y-%m') BETWEEN '2020-01' AND '2020-12' 
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