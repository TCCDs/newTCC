<?php
    session_start();
    include_once ("../../../server/Conn.php");
    $conn = new Conn();

    /* DESCONTO SALDO MOEDA VIRTUAL */
    $ID_USUARIOS = $_SESSION['ID_USUARIOS'];
    $sql = 'SELECT sum(saldo_clientes.SALDO_CLIENTES) AS saldo_clientes,
                clientes.NOME_CLIENTES 
            FROM saldo_clientes
            INNER JOIN clientes ON saldo_clientes.ID_CLIENTE = clientes.ID_CLIENTES
            WHERE clientes.ID_USUARIOS = :ID_USUARIOS
            ORDER BY clientes.NOME_CLIENTES ASC';
    
    $resultado = $conn->getConn()->prepare($sql);
    $resultado->bindParam(':ID_USUARIOS', $ID_USUARIOS, PDO::PARAM_INT);
    $resultado->execute();
    
    while($saldoAtual = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $saldoAtualCliente = $saldoAtual["saldo_clientes"];
    }

    $_SESSION['saldo_clientes'] = $saldoAtualCliente;


    /* TOTAL DA COMPRA */
    $totalCompraCliente = 0;
    if(!empty($_SESSION["shopping_cart"])) {
        foreach($_SESSION["shopping_cart"] as $keys => $values) {
            $totalCompraCliente = $totalCompraCliente + ($values["product_quantity"] * $values["product_price"]);
        }   
    }
    
    if ($totalCompraCliente > $saldoAtualCliente) {
        echo "saldo insuficiente";
    } else {
        $descontoSaldoCliente = $_SESSION['saldo_clientes'] - $totalCompraCliente;
    }

    // -- -- //

    $codigo_compras = mt_rand();
    $total_desconto_compras = 0;
    $status_compras = 'F';
            
    try {
        $sql =  "
            INSERT INTO compras
                (ID_CLIENTES_COMPRAS, CODIGO_COMPRAS, VALOR_COMPRAS, TOTAL_DESCONTO_COMPRAS, STATUS_COMPRAS) 
            VALUES 
                (:ID_CLIENTES_COMPRAS, :CODIGO_COMPRAS, :VALOR_COMPRAS, :TOTAL_DESCONTO_COMPRAS, :STATUS_COMPRAS)
        ";
                
        $resultado = $conn->getConn()->prepare($sql);
        $resultado->bindParam(':ID_CLIENTES_COMPRAS', $ID_USUARIOS);
        $resultado->bindParam(':CODIGO_COMPRAS', $codigo_compras);
        $resultado->bindParam(':VALOR_COMPRAS', $totalCompraCliente);
        $resultado->bindParam(':TOTAL_DESCONTO_COMPRAS', $total_desconto_compras);
        $resultado->bindParam(':STATUS_COMPRAS', $status_compras);
        $resultado->execute();
        $id_compras = $conn->getConn()->lastInsertId();

        $data = array('return' => true);

    }catch (Exception $ex){
        $data = array('return' => $ex->getMessage());
    }
    

    #itens da compras 
    $qr_code = mt_rand();
    $codigo_itens = mt_rand();

    $_SESSION["CODIGO_ITENS"] = $codigo_itens;
    $_SESSION["QR_CODE"] = $qr_code;
    
    foreach($_SESSION["shopping_cart"] as $keys => $values) {
        try {
            $query = "
            INSERT INTO compras_itens
                (CODIGO_ITENS, NOME_PRODUTOS, QUANTIDADE_PRODUTOS, PRECO_PRODUTOS, QR_CODE, ID_COMPRAS) 
            VALUES 
                (:CODIGO_ITENS, :NOME_PRODUTOS, :QUANTIDADE_PRODUTOS, :PRECO_PRODUTOS, :QR_CODE, :ID_COMPRAS)
        ";
    
        $resultado = $conn->getConn()->prepare($query);
        $resultado->bindParam(':CODIGO_ITENS', $_SESSION["CODIGO_ITENS"]);
        $resultado->bindParam(':NOME_PRODUTOS', $values["product_name"]);
        $resultado->bindParam(':QUANTIDADE_PRODUTOS', $values["product_quantity"]);
        $resultado->bindParam(':PRECO_PRODUTOS', $values["product_price"]);
        $resultado->bindParam(':QR_CODE', $_SESSION["QR_CODE"]);
        $resultado->bindParam(':ID_COMPRAS', 	$id_compras);
        $resultado->execute();

        $data = array('return' => true);

        } catch (Exception $ex){
            $data = array('return' => $ex->getMessage());
        }
    }

    /* UPDATE ATUALIZAR SALDO */
    try {
        $sql = "UPDATE saldo_clientes SET SALDO_CLIENTES = :SALDO_CLIENTES  WHERE ID_CLIENTE = :ID_CLIENTE";

        $resultado = $conn->getConn()->prepare($sql);
        $resultado->bindParam(':SALDO_CLIENTES', $descontoSaldoCliente);
        $resultado->bindParam(':ID_CLIENTE', $ID_USUARIOS);
        $resultado->execute();
            
        $data = array('return' => true);

    } catch (Exception $ex){
        $data = array('return' => $ex->getMessage());
    }
    
    echo json_encode($data);
?>