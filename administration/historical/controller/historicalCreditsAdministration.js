$(document).ready(function() {
    $('tbody').empty()

    var url = "administration/historical/model/historicalCreditsAdministration.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let historicoMoedas = `
                <tr>
                    <td class="text-center" width="40%"> ` + dados[i].NOME_CLIENTES + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].VALOR_MOEDAS + ` </td>
                    <td class="text-center" width="15%">
                        <button id="` + dados[i].ID_MOEDAS + `" class="btn btn-outline-primary btn-sm btn-view-credito"> <i class="mdi mdi-eye mdi-18px"></i> </button>
                    </td>
                </tr>
                `
                $('tbody').append(historicoMoedas)
            }
            $('body').append('<script src="administration/historical/controller/viewCreditsAdministration.js"></script>')

        }
    })
})