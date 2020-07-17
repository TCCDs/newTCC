<?php
	session_start();

	$total_price = 0;
	$item_details = '';

    if(!empty($_SESSION["shopping_cart"])) {
		foreach($_SESSION["shopping_cart"] as $keys => $values) {  
			$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
			$item_details .= $values["product_name"] . ', ';
        }      
    }    
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Finalizar Pagamento</title>
		<script src="../../../components/js/jquery-3.4.1.min.js"></script>
		<link rel="stylesheet" href="../../../components/css/bootstrap.min.css" />
		<script src="../../../components/js/bootstrap.min.js"></script>

		<script src="https://js.stripe.com/v2/"></script>
        <script src="../../../components/js/jquery.creditCardValidator.js"></script>
        
        <style>
            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                /*height: 50px;*/
                background-color: blue;
                color: white;
                text-align: center;
            }
        </style>
	</head>
	<body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
					<form method="post" id="order_process_form" action="../model/payment.php">
                        <div class="shadow p-3 mb-5 bg-white rounded mt-3">
                            <h4 class="mt-2 text-center">
                                Finalizar compra
                            </h4>

                            <div class="col-12 col-md-12 mt-4">
                                <h6 class="mt-2 text-center">
                                    Detalhes de pagamentos
                                </h6>
                            </div>

                            <div class="row">
                                <div class="col-12 col md-12">
                                    <div class="form-group">
                                        <label><b>Nome <span class="text-danger">*</span></b></label>
                                        <input type="text" name="NOME_CARTAO" id="NOME_CARTAO" class="form-control" value="" />
                                        <span id="error_NOME_CARTAO" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-12 col md-12">
                                    <div class="form-group">
                                        <label>Numero do Cartão<span class="text-danger">*</span></label>
                                        <input type="text" name="NUMERO_CARTAO" id="NUMERO_CARTAO" class="form-control" placeholder="1234 5678 9012 3456" maxlength="20" onkeypress="" />
                                        <span id="error_NUMERO_CARTAO" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-md-4 mt-3">
                                        <label>Mês de Validade</label>
                                        <input type="text" name="CARTAO_VALIDADE_MES" id="CARTAO_VALIDADE_MES" class="form-control" placeholder="MM" maxlength="2" onkeypress="return only_number(event);" />
                                        <span id="error_CARTAO_VALIDADE_MES" class="text-danger"></span>
                                    </div>
                                    <div class="col-12 col-md-4 mt-3">
                                        <label>Ano de Validade</label>
                                        <input type="text" name="CARTAO_VALIDADE_ANO" id="CARTAO_VALIDADE_ANO" class="form-control" placeholder="YYYY" maxlength="4" onkeypress="return only_number(event);" />
                                        <span id="error_CARTAO_VALIDADE_ANO" class="text-danger"></span>
                                    </div>
                                    <div class="col-12 col-md-4 mt-3">
                                        <label>CVC</label>
                                        <input type="text" name="CODIGO_CARTAO" id="CODIGO_CARTAO" class="form-control" placeholder="123" maxlength="4" onkeypress="return only_number(event);" />
                                        <span id="error_CODIGO_CARTAO" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
								
								<div class="processPayment" align="center">
									<input type="hidden" name="total_amount" value="<?php echo $total_price; ?>" />
									<input type="hidden" name="currency_code" value="BRL" />
									<input type="hidden" name="item_details" value="<?php echo $item_details; ?>" />
									<input type="button" name="button_action" id="button_action" class="btn btn-success btn-sm" onclick="stripePay(event)" value="Pay Now" />
								</div>

                                <div class="col-12 col-md-12 mt-4">
                                    <h6 class="mt-2 text-center">
                                        Detalhes da compra
                                    </h6>
                                    
                            
                                    <div class="row" id="listaProdutosCards">

                                    </div>

                                    <div class="footer" id="listaTotalProdutos">
                    
                                    </div>
                                </div>
							</div>
						</div>
					</form>
                </div>
			</div>
		</div>
	</body>
</html>

<script src="../controller/listaTotalProdutos.js"></script>
<script src="../controller/processoPagamento.js"></script>
<script src="../controller/listaProdutos.js"></script>