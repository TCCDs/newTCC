<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulário em Ajax e Alerta Personalizado</title>
	
	<!-- jquery -->
	<script  src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	<script src="js/sweetalert.js"></script>
	
</head>
<body>
	<div class="container">
		
		<br><br>
		<h3 id="textual-inputs">Formulário em Ajax</h3>
		<br><br>
		
		<form action="" method="post" enctype="multipart/form-data" class="form">
			<div class="form-group row">
			  	<label for="example-search-input" class="col-xs-2 col-form-label">Email*</label>
				<div class="col-xs-10">
					<input class="form-control" name="email" type="email" value="" id="example-search-input" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 col-form-label"></label>
				<div class="col-xs-10">
					<button type="submit" name="ok" id="ok" class="btn btn-primary" id="btn-contato">Enviar mensagem</button>
					<div class="loading" style="float: left;margin-left:20px;"></div>
				</div>
			</div>
		</form>		
	
		<div class="mostrar"></div>
	</div><!-- container -->	
	
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