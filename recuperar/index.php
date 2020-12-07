
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
	
	
<link rel="stylesheet" href="../components/css/bootstrap.css">	
<link rel="stylesheet" href="../components/css/recupera.css">	


	<script src="js/sweetalert.js"></script>
	
</head>
<body>
<div class="container">
			<div class="jumbotron mt-2">
				<h1 class="display-4">Recuperar senha</h1>
			</div>
		<form action="" method="post" enctype="multipart/form-data" class="form">
		
		<div class="row">
			<div class="col-12 col-md-12">
					<div class="form-group">
							<label for="my-input">Email de recuperação</label>
							<input id="my-input" name="email" class="recuperaSenha" type="text" aria-autocomplete="off" placeholder="Digite o email de recuperação" required>
					</div>
			</div>
				<button type="submit" name="ok" id="ok" class="btn btn-block acao" id="btn-contato">Enviar mensagem</button>
				<div class="loading" style="float: left;margin-left:20px;"></div>
		</div>
		</form>		
		<div class="mostrar"></div>
	</div><!-- container -->	

	<script src="../components/js/jquery-3.4.1.min.js"></script>
	<script src="../components/js/bootstrap.js"></script>

<script>
	$(function(){
		$('.form').submit(function(){
			$('.loading').html("<img src='loading.gif' width='45'>");
			$.ajax({
				url: 'send-form.php',
				type: 'POST',
				data: $('.form').serialize(),
				success: function(data){
					$('.mostrar').html(data);
					$('.loading').hide();
					$('.form')[0].reset();
				}
			});
			return false;
		});
	});
</script>	

</body>
</html>