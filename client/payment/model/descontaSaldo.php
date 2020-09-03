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

    echo "saldo ". $saldoAtualCliente;
    echo "<br>";
    echo "compra". $totalCompraCliente;
    echo "<br>";
    echo "desconto". $descontoSaldoCliente;

    

    /* UPDATE ATUALIZAR SALDO */
    $ID_CLIENTES_SALDO = 1;
    //$descontoSaldoCliente = $_POST["SALDO_CLIENTES"];
    
    try {
        $sql = "UPDATE saldo_clientes SET SALDO_CLIENTES = :SALDO_CLIENTES  WHERE ID_CLIENTE = :ID_CLIENTE";

        $resultado = $conn->getConn()->prepare($sql);
        $resultado->bindParam(':SALDO_CLIENTES', $descontoSaldoCliente);
        $resultado->bindParam(':ID_CLIENTE', $ID_CLIENTES_SALDO);
        $resultado->execute();
            
        $data = array('return' => true);

    } catch (Exception $ex){
        $data = array('return' => $ex->getMessage());
    }
    
    echo json_encode($data);
?>
