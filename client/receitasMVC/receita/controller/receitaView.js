$(document).ready(function() {
    $('#titulo').empty()
    $('#linha_fina').empty()
    $('tbody').empty()

    var url = "client/receitasMVC/receita/model/receitaView.php"
    var dados = 'id=' 
    dados += $(this).attr('id')

    console.log(dados)
    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: dados,
        url: url,
        success: function(dados) {
            for (var i = 0; dados.length > i; i++) {
                let receita = `
                    <tr>
                        <td> ` + dados[i].id + `</td>
                        <td> ` + dados[i].slug + `</td>
                        <td> ` + dados[i].cattitulo + `</td>
                        <td> ` + dados[i].data + `</td>
                    </tr>

                `
                $('#titulo').append(dados[i].titulo)
                $('#linha_fina').append(dados[i].linha_fina)
                $('tbody').append(receita)
            }
        }
    })

})