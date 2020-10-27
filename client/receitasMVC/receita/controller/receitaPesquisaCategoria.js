$(function(){
    $('.carregando').hide();
    $('#slCategoria').change(function(){
        var resultPesquisa =  $(this).val()
        console.log(resultPesquisa)
        if( resultPesquisa ) {
            $('tbody').hide();
            $('.carregando').show();
            $.getJSON('client/receitasMVC/receita/model/pesquisaCategoria.php?search=',{slCategoria: resultPesquisa, ajax: 'true'}, function(dados){
                var valor = '';	
                for (var i = 0; i < dados.length; i++) {
                    valor += `<tr>
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
                            </tr>`;
        
                }	
                $('tbody').html(valor).show();
                $('.carregando').hide();
            });
        } else {
            $('.carregando').hide();
            $('tbody').html('Nenhuma empresa encontrada');
        }
    });
});