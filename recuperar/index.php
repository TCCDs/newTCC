<form action="" method="post" enctype="multipart/form-data" class="formF" >
<div class="row">
        <div class="col-12 col-md-12">
			<div class="form-group form">
				<input type="text" name="email" id="example-search-input" aria-autocomplete="off" required>
					<label for="example-search-input" class="label-input">
							<span class="content-input">Email*</span>
						</label>
			</div>
			<button type="submit" name="ok" id="ok" class="btn btn-primary" id="btn-contato">Enviar mensagem</button>
			<div class="loading" style="float: left;margin-left:20px;"></div>

			</div>

<!-- 
					<button type="submit" name="ok" id="ok" class="btn btn-primary" id="btn-contato">Enviar mensagem</button>
					<div class="loading" style="float: left;margin-left:20px;"></div> -->
			</div>
		</form>		
	
		<div class="mostrar"></div>
	
<script>
	$(function(){
		$('.formF').submit(function(e){
			e.preventDefault()
			$('.loading').html("<img src='recuperar/loading.gif' width='45'>");
			$.ajax({
				url: 'recuperar/send-form.php',
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
