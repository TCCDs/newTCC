$(document).ready(function() {
    $('.listaClientesRapido').empty()

    var url = "administration/dadosPanelAdministration/model/listaClientesRapido.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let listaClientesRapido = `
                <tr>
                    <td class="text-center" width="40%"> ` + dados[i].NOME_CLIENTES + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].CELULAR_CLIENTES + ` </td>
                </tr>
                `
                $('.listaClientesRapido').append(listaClientesRapido)
            }
        }
    })
})

//td class="text-center" width="20%"> ` + dados[i].EMAIL_CLIENTES + ` </td>