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
			$('.loading').html("<img src='loading.gif' width='45'>");
			$.ajax({
				url: 'recuperar/send-form.php',
				type: 'POST',
				data: $('.formF').serialize(),
				success: function(data){
					let timerInterval
                    Swal.fire({
                        title: 'Supermercado Caravelas!',
                        html: 'Realizando recuperação em <b></b> milisegundos.',
                        timer: 2000,
                        timerProgressBar: true,
                        willOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                                const content = Swal.getContent()
                                if (content) {
                                    const b = content.querySelector('b')
                                    if (b) {
                                        b.textContent = Swal.getTimerLeft()
                                    }
                                }
                            }, 100)
                        },
                        onClose: () => {
                            clearInterval(timerInterval)
                        }
                    })
					$('.mostrar').html(data);
					$('.loading').hide();
					$('.formF')[0].reset();
				}
			});
			return false;
		});
	});
</script>	
