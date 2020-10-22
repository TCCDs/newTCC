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
                        <td> ` + dados[i].data|date('d/m/Y H:i:s') + `</td>
                        <td>
                            <a href="{{BASE}}receita/editar/` + dados[i].id + `" class="btn btn-warning">Editar</a>
                            <a href="{{BASE}}receita/ver/` + dados[i].slug + `" class="btn btn-info ml-2">Ver</a>
                        </td>
                    </tr>
                `
                $('tbody').append(receita)
            }
        }
    })
})