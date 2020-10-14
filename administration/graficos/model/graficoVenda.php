<?php
header('Content-Type: application/json');
include_once('../../../server/Connect.php');
$conn = new Conn();

$sql = "SELECT 
			COUNT(compras.ID_COMPRAS) AS  total_vendas, 
			DATE_FORMAT(compras.DATA_CAD_COMPRAS, '%m/%Y') AS  data_ 
		from 
			compras
		WHERE DATE_FORMAT(`DATA_CAD_COMPRAS`, '%Y-%m') BETWEEN '2020-01' AND '2020-12'
		group BY data_
		order BY data_";

$resultado = $conn->getConn()->prepare($sql);
$resultado->execute();

$data = array();
foreach ($resultado as $row) {
	$data[] = $row;
}

echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>