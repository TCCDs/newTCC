<div class="container">
	<div class="row">
		<div class="col-12 col-md-12">
		<h3 id="textual-inputs">Recuperar senha</h3>
		</div>
	</div>

		<form action="" method="post" enctype="multipart/form-data" class="form">
			<div class="form-cad">
				<div class="row">
					<div class="col-12 col md-12">
						<div class=" form-group form">
							<div class="col-12 col-md-12">
								<input class="btn btn-block btn-success" name="email" type="email" value="" id="example-search-input" >
								</div>
							</div>
						</div>

			<div class="form-group row">
				<label class="col-xs-2 col-form-label"></label>
				<div class="col-xs-10">
					<button type="submit" name="ok" id="ok" class="btn btn-primary pull-left" id="btn-contato">Enviar mensagem</button>
					<div class="loading" style="float: left;margin-left:20px;"></div>
				</div>
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
