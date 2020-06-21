<?php
	//order_process.php
	session_start();

	$total_price = 0;
	$item_details = '';
	$order_details = '
		<div class="table-responsive" id="order_table">
			<table class="table table-bordered table-striped">
				<tr>  
					<th>Product Name</th>  
					<th>Quantity</th>  
					<th>Price</th>  
					<th>Total</th>  
				</tr>
	';

	if(!empty($_SESSION["shopping_cart"])) {
		foreach($_SESSION["shopping_cart"] as $keys => $values) {
			$order_details .= '
				<tr>
					<td>'.$values["product_name"].'</td>
					<td>'.$values["product_quantity"].'</td>
					<td align="right">$ '.$values["product_price"].'</td>
					<td align="right">$ '.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>
				</tr>
			';

			$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
			$item_details .= $values["product_name"] . ', ';
		}

		$item_details = substr($item_details, 0, -2);
		$order_details .= '
			<tr>  
				<td colspan="3" align="right">Total</td>  
				<td align="right">$ '.number_format($total_price, 2).'</td>
			</tr>
		';
	}

	$order_details .= '</table>';

?>

<!DOCTYPE html>
<html>
	<head>
		<title>PHP Shopping Cart with Stripe Payment Integration</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://js.stripe.com/v2/"></script>
		<script src="../../../components/js/jquery.creditCardValidator.js"></script>
		
		<style>
			.popover {
				width: 100%;
				max-width: 800px;
			}

			.require {
				border:1px solid #FF0000;
				background-color: #cbd9ed;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<h3 align="center"><a href="#">Finalizar Compra</a></h3>
			<span id="message"></span>
			<div class="panel panel-default">
				<div class="panel-heading">Prcesso de Pagemto</div>
				<div class="panel-body">
					<form method="post" id="order_process_form" action="../model/payment.php">
						<div class="row">
							<div class="col-md-8" style="border-right:1px solid #ddd;">
								<!-- detalhes do cliente -->
								<h4 align="center">Detalhes do Cliente</h4>
								<div class="form-group">
									<label><b>Nome <span class="text-danger">*</span></b></label>
									<input type="text" name="NOME_CARTAO" id="NOME_CARTAO" class="form-control" value="" />
									<span id="error_NOME_CARTAO" class="text-danger"></span>
								</div>
								<!--
								<div class="form-group">
									<label><b>Email Address <span class="text-danger">*</span></b></label>
									<input type="text" name="EMAIL_CLIENTE" id="EMAIL_CLIENTE" class="form-control" value="" />
									<span id="error_EMAIL_CLIENTE" class="text-danger"></span>
								</div>
								-->
								<hr />

								<!-- detalhes de pagamentos -->
								<h4 align="center">Detalhes de Pagamentos</h4>
								<div class="form-group">
									<label>Numero do Cartão<span class="text-danger">*</span></label>
									<input type="text" name="NUMERO_CARTAO" id="NUMERO_CARTAO" class="form-control" placeholder="1234 5678 9012 3456" maxlength="20" onkeypress="" />
									<span id="error_NUMERO_CARTAO" class="text-danger"></span>
								</div>
								
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label>Mês de Validade</label>
											<input type="text" name="CARTAO_VALIDADE_MES" id="CARTAO_VALIDADE_MES" class="form-control" placeholder="MM" maxlength="2" onkeypress="return only_number(event);" />
											<span id="error_CARTAO_VALIDADE_MES" class="text-danger"></span>
										</div>

										<div class="col-md-4">
											<label>Ano de Validade</label>
											<input type="text" name="CARTAO_VALIDADE_ANO" id="CARTAO_VALIDADE_ANO" class="form-control" placeholder="YYYY" maxlength="4" onkeypress="return only_number(event);" />
											<span id="error_CARTAO_VALIDADE_ANO" class="text-danger"></span>
										</div>

										<div class="col-md-4">
											<label>CVC</label>
											<input type="text" name="CODIGO_CARTAO" id="CODIGO_CARTAO" class="form-control" placeholder="123" maxlength="4" onkeypress="return only_number(event);" />
											<span id="error_CODIGO_CARTAO" class="text-danger"></span>
										</div>
									</div>
								</div>
								
								<br />

								<div class="processPayment" align="center">
									<input type="hidden" name="total_amount" value="<?php echo $total_price; ?>" />
									<input type="hidden" name="currency_code" value="BRL" />
									<input type="hidden" name="item_details" value="<?php echo $item_details; ?>" />
									<input type="button" name="button_action" id="button_action" class="btn btn-success btn-sm" onclick="stripePay(event)" value="Pay Now" />
								</div>
								<br />
							</div>

							<div class="col-md-4">
								<h4 align="center">Detalhes da Compra</h4>
								<?php
									echo $order_details;
								?>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

<script src="../controller/processoPagamento.js"></script>