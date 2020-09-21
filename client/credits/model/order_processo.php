<?php
	session_start();

	$VALOR_MOEDAS = $_POST['VALOR_MOEDAS'];
    $_SESSION['moedas_clientes'] = $VALOR_MOEDAS;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <link rel="stylesheet" href="../../../components/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../../components/css/login.css" />
		<script src="../../../components/js/bootstrap.min.js"></script>
		<script src="https://js.stripe.com/v2/"></script>
        <script src="../../../components/js/jquery.creditCardValidator.js"></script>
    <title>Finalizar pagamento</title>
</head>
<body>
<div class="container">
    <div class="jumbotron mt-2">
        <h1 class="display-4">Finalizar compra</h1>
        <hr class="my-4">
             <div class="row">
                        <div class="col-6 col-md-6">
                            <h6>Valor Adicionado</h6>
                        </div>
                        <div class="col-6 col-md-6">
                         R$   <?php echo $_SESSION['moedas_clientes']; ?>
                        </div>
                    </div>  
                  </div>
                    <form method="post" id="order_process_form" action="../model/payment.php">
                        <div class="row">
                            <div class="col-12 col md-12">
                                <div class="form-group form">
                                    <input type="text" name="NOME_CARTAO" id="NOME_CARTAO" aria-autocomplete="off" required>
                                    <label for="NOME_CARTAO" class="label-input">
                                        <span class="content-input">Nome</span>
                                        <span id="error_NOME_CARTAO" class="text-danger"></span>
                                    </label>
                                </div>
                            </div>
                             <div class="col-12 col md-12">
                                <div class="form-group form">
                                        <input type="text" name="NUMERO_CARTAO" id="NUMERO_CARTAO" maxlength="20" onkeypress="" aria-autocomplete="off" required />
                                        <label for="NUMERO_CARTAO" class="label-input">
                                        <span class="content-input">Número do cartão</span>
                                        <span id="error_NUMERO_CARTAO" class="text-danger"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class=" form-group form">
                            <input type="text" name="CARTAO_VALIDADE_MES" id="CARTAO_VALIDADE_MES" aria-autocomplete="off" required  maxlength="2" onkeypress="return only_number(event);">
                            <label for="CARTAO_VALIDADE_MES" class="label-input">
                                <span class="content-input">Mês de Validade</span>
                                <span id="error_CARTAO_VALIDADE_MES" class="text-danger"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class=" form-group form">
                        <input type="text" name="CARTAO_VALIDADE_ANO" id="CARTAO_VALIDADE_ANO" aria-autocomplete="off" required  maxlength="4" onkeypress="return only_number(event);">
                            <label for="CARTAO_VALIDADE_ANO" class="label-input">
                                <span class="content-input">Ano de Validade</span>
                                <span id="error_CARTAO_VALIDADE_ANO" class="text-danger"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class=" form-group form">
                        <input type="text" name="CODIGO_CARTAO" id="CODIGO_CARTAO" aria-autocomplete="off" required  maxlength="4" onkeypress="return only_number(event);">
                            <label for="CODIGO_CARTAO" class="label-input">
                                <span class="content-input">CVC</span>
                                <span id="error_CODIGO_CARTAO" class="text-danger"></span>
                            </label>
                        </div>
                    </div>
                </div>
								
                <div class="processPayment" align="center">
                    <input type="hidden" name="total_amount" value="<?php echo $_SESSION['moedas_clientes']; ?>" />
                    <input type="hidden" name="currency_code" value="BRL" />
                    <input type="button" name="button_action" id="button_action" class="btn btn-success btn-block btn-md" onclick="stripePay(event)" value="Pagar agora" />
                </div>
                                
                               


        </form>
    </div>
    
</body>
</html>
<script src="../controller/processoPagamento.js"></script>
