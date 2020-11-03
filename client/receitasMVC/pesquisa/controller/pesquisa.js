/*$(function(){
	//Pesquisar os cursos sem refresh na página
	$("#pesquisa").keyup(function(){
		var pesquisa = $(this).val();
		//Verificar se há algo digitado
		if(pesquisa != ''){
			var dados = {
				palavra : pesquisa
			}		
			$.post('client/receitasMVC/pesquisa/model/pesquisa.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$("tbody").html(retorna);
			});
		}else{
			$("tbody").html('');
		}		
	});
});*/


$(document).ready(function(){

    $('#pesquisa').keyup(function(){

        $('#form-pesquisa').submit(function(){
            var dados = $(this).serialize();

            $.ajax({
                url: 'client/receitasMVC/pesquisa/model/pesquisa.php',
                method: 'post',
                dataType: 'json',
                data: dados,
                success: function(dados){
					for (var i = 0; i < dados.length; i++) {
						let pesquisa = `
							<tr>
								<td> ` + dados[i].id + `</td>
								<td> ` + dados[i].titulo + `</td>
								<td> ` + dados[i].slug + `</td>
								<td> ` + dados[i].cattitulo + `</td>
								<td> ` + dados[i].data + `</td>
								<td>
									<button id="` + dados[i].id + `" class="btn btn-warning btn-receitaEditar"> 
										Editar
									</button>
		
									<button id="` + dados[i].slug + `" class="btn btn-info ml-2 btn-receitaView"> 
										Ver
									</button>
								</td>
							</tr>
						`
						$('tbody').append(pesquisa)
					}
                    //$('#resultado').empty().html(data);
                }
            });

            return false;
        });

        $('#form-pesquisa').trigger('submit');

    });
});