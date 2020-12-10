<?php
header('Content-Type: application/json');
include_once ('../../../server/Connect.php');
$conn = new Conn();
$ID_USUARIOS = $_SESSION['ID_USUARIOS'];

$sql = "SELECT 
			sum(compras.VALOR_COMPRAS) AS  total_gastos, 
			DATE_FORMAT(compras.DATA_CAD_COMPRAS, '%m/%Y') AS  data_ ,
			clientes.NOME_CLIENTES
		FROM 
			compras
		INNER JOIN clientes ON compras.ID_CLIENTES_COMPRAS = clientes.ID_CLIENTES
		WHERE 
		DATE_FORMAT(`DATA_CAD_COMPRAS`, '%Y-%m') BETWEEN  '2020-01' AND '2020-12' AND clientes.ID_USUARIOS = :ID_USUARIOS
		GROUP BY data_
		ORDER BY data_";

$resultado = $conn->getConn()->prepare($sql);
$resultado->bindParam(':ID_USUARIOS', $ID_USUARIOS);
$resultado->execute();


$data = array();
foreach ($resultado as $row) {
	$data[] = $row;
}

echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>