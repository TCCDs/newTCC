<?php
	//order_process.php
    session_start();  
    
    $teste = $_SESSION["testeProdutos"];

    $arr = json_decode($teste, true);
    
	foreach($arr as $keys => $values) {
        $listaProdutos[] = array_map('utf8_encode', $values);
    }   

    echo json_encode($listaProdutos, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    
?>