$(document).ready(function() {
    $('tbody').empty()

    var url = "client/receitasMVC/categoria/model/categoriaPrincipal.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let categoria = `
                    <tr>
                        <td> ` + dados[i].id + `</td>
                        <td> ` + dados[i].titulo + `</td>
                        <td> ` + dados[i].slug + `</td>
                        <td>
                            <a href="receita/editar/` + dados[i].id + `" class="btn btn-warning">Editar</a>
                        </td>
                    </tr>
                `
                $('tbody').append(categoria)
            }
        }
    })
})