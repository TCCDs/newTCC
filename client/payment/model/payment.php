<?php
        session_start();
        include_once("../../../server/Conn.php");
        $conn = new Conn();
    
        /* DESCONTO SALDO MOEDA VIRTUAL */
        $ID_USUARIOS = $_SESSION['ID_USUARIOS'];
    
        $sql = 'SELECT sum(moedas.VALOR_MOEDAS) AS MOEDAS FROM moedas
        INNER JOIN clientes ON moedas.ID_CLIENTES_MOEDAS = clientes.ID_CLIENTES
        WHERE clientes.ID_USUARIOS= :ID_USUARIOS
        ORDER BY clientes.ID_USUARIOS ASC';
    
        $resultado = $conn->getConn()->prepare($sql);
        $resultado->bindParam(':ID_USUARIOS', $ID_USUARIOS, PDO::PARAM_INT);
        $resultado->execute();
    
        while($saldoAtual = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $saldoAtualCliente = $saldoAtual["MOEDAS"];
        }
    
    
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
            $descontoSaldoCliente = $saldoAtualCliente - $totalCompraCliente;
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../components/libs/MaterialDesign/css/materialdesignicons.css">
    <link rel="stylesheet" href="./../../components/libs/sweetalert2/dist/sweetalert2.css">
    <link rel="stylesheet" href="./../../components/css/login.css">
    <link rel="stylesheet" href="./../../components/css/menuslide.css">
</head>
<body>
    

<div class="row">
    <div class="col-12 col-md-12 ">
        <div class="row" id="listaProdutosCards">

        </div>

        <div class="row mt-3  mb-7 pay">
            <div class="col-6 col-md-6">
                <div class="row text-danger">
                    <small> Valor Compra </small>
                </div>

                <div class="row">
                    <h3 class="listaTotalProdutos">R$ 45,00</h3>
                </div>
            </div>

            <div class="col-6 col-md-6">
                <div class="row ">
                    <small> Saldo Total </small>
                </div>

                <div class="row">
                    <h3 class="totalSaldo">R$ 58,00</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="../model/descontaSaldo.php" method="POST">
    <div align="center">
		<input type="text" name="SALDO_CLIENTES" value="<?php echo $descontoSaldoCliente; ?>" />
        <input type="submit" class="btn btn-success btn-sm" value="Finaliza" />
	</div>
</form>

<div class="modal fade" id="modalContato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!-- <script src="client/payment/controller/payment-coin.js"></script> -->
<script src="../controller/totalSaldo.js"></script>
<script src="../controller/listaProdutos.js"></script>
<script src="../controller/listaTotalProdutos.js"></script>