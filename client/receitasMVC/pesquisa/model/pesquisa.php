<?php
	include_once("../../../../server/Conn.php");
	$conn = new Conn();

	$pesquisa = $_REQUEST['pesquisa'];

	$resultPesquisa = array(
        ':titulo' => strtoupper("%{$pesquisa}%"),
        ':linha_fina' => strtoupper("%{$pesquisa}%"),
        ':descricao' => strtoupper("%{$pesquisa}%")
    );

	$sql = "SELECT 
				r.*, 
				c.titulo as cattitulo 
			FROM receita r 
			INNER JOIN receita_categoria c ON c.id = r.categoria_id 
			WHERE UPPER(r.titulo) LIKE :titulo OR 
			UPPER(r.linha_fina) LIKE  :linha_fina OR
			UPPER(r.descricao) LIKE :descricao
			ORDER BY r.titulo ASC 
		";

	$resultado = $conn->getConn()->prepare($sql);
	//$resultado->bindParam(':titulo', $estado_id, PDO::PARAM_INT);
	$resultado->execute($resultPesquisa);

	while($resultadoReceita = $resultado->fetch(PDO::FETCH_ASSOC)) {
		$receita[] = array_map('utf8_encode', $resultadoReceita);
    }
    

	echo json_encode($receita,  JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);