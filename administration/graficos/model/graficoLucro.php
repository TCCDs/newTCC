<?php
header('Content-Type: application/json');
include_once('../../../server/Conn.php');
$conn = new Conn();

$sql ="	SELECT 
			sum(compras.VALOR_COMPRAS) AS  lucro_bruto, 
			DATE_FORMAT(compras.DATA_CAD_COMPRAS, '%m/%Y') AS  data_ 
		FROM 
			compras
		WHERE 
		DATE_FORMAT(`DATA_CAD_COMPRAS`, '%Y-%m') BETWEEN  '2020-01' AND '2020-12'
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