$(document).ready(function() {
    $('tbody').empty()

    var url = "client/receitasMVC/receita/model/receita.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let receita = `
                    <tr>
                        <td> ` + dados[i].id + `</td>
                        <td> ` + dados[i].titulo + `</td>
                        <td> ` + dados[i].slug + `</td>
                        <td> ` + dados[i].cattitulo + `</td>
                        <td> ` + dados[i].data + `</td>
                        <td>
                            <button id="` + dados[i].id + `" class="btn btn-receitaEditar"> 
                                Editar
                            </button>

                            <button id="` + dados[i].id + `" class="btn btn-info ml-2 btn-receitaView"> 
                                Ver
                            </button>
                        </td>
                    </tr>
                `
                $('tbody').append(receita)
            }
            //$('body').append('<script src="site/receita/controller/receitaEditar.js"></script>')
            $('body').append('<script src="client/receitasMVC/receita/controller/receitaView.js"></script>')
            $('body').append('<script src="client/receitasMVC/receita/controller/editar_receitas.js"></script>')

        }
    })
})