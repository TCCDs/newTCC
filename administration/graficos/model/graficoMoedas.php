<?php
header('Content-Type: application/json');
include_once('../../../server/Conn.php');
$conn = new Conn();

$sql ="	SELECT 
			SUM(moedas.VALOR_MOEDAS) AS  total_moedas, DATE_FORMAT(moedas.DATA_CAD_MOEDAS, '%m/%Y') AS  data_
		FROM
			moedas
		WHERE 
		DATE_FORMAT(`DATA_CAD_MOEDAS`, '%Y-%m') BETWEEN '2020-01' AND '2020-12' 
		GROUP BY data_
		ORDER BY data_";

$resultado = $conn->getConn()->prepare($sql);
$resultado->execute();

$data = array();
foreach ($resultado as $row) {
	$data[] = $row;
}

echo json_encode($data);
?>