<div class="container">
	<div class="row">
		<div class="col-12 col-md-12">
		<h3 id="textual-inputs">Recuperar senha</h3>
		</div>
	</div>

		<form action="" method="post" enctype="multipart/form-data" class="form">

		<div id="formCad">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class=" form-group form">
						<input type="text" name="email" id="example-search-input" aria-autocomplete="off" required>
						<label for="email" class="label-input">
							<span class="content-input">Digite seu email</span>
						</label>
					</div>
				</div>
			</div>
			<button type="submit" name="ok" id="ok" class="btn btn-primary pull-left" id="btn-contato">Enviar mensagem</button>
			<!-- <div class="loading" style="float: left;margin-left:20px;"></div> -->
			</div>	
		</form>		
	
		<div class="mostrar"></div>
	
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
