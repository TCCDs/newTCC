<?php
header('Content-Type: application/json');
include_once ('../../../server/Connect.php');
$conn = new Conn();
$ID_USUARIOS = $_SESSION['ID_USUARIOS'];

$sql ="SELECT 
			SUM(moedas.VALOR_MOEDAS) AS  total_moedas, 
			DATE_FORMAT(moedas.DATA_CAD_MOEDAS, '%m/%Y') AS  data_,
			clientes.NOME_CLIENTES
		FROM
			moedas
		INNER JOIN clientes ON moedas.ID_CLIENTES_MOEDAS = clientes.ID_CLIENTES
		WHERE 
		DATE_FORMAT(`DATA_CAD_MOEDAS`, '%Y-%m') BETWEEN '2020-01' AND '2020-12' AND clientes.ID_USUARIOS = :ID_USUARIOS
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