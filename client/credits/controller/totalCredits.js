$(document).ready(function() {
    $('tbody').empty()

    var url = "client/credits/model/totalCredits.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let moedas = `
                <tr>
                    <td class="text-center" width="40%"> ` + dados[i].NOME_CLIENTES + ` </td>
                    <td class="text-center" width="40%"> ` + dados[i].MOEDAS + ` </td>
                </tr>
                `
                $('tbody').append(moedas)
            }
            $('body').append('<script src="client/credits/controller/addCredits.js"></script>')
        }
    })
})