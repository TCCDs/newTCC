$(document).ready(function() {
    $('.listaDadosCompras').empty()

    var url = "administration/purchaseCheck/model/processoVerificacao.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let detalhesDadosCompras = `
                <tr>
                    <td class="text-center" width="40%"> ` + dados[i].CODIGO_COMPRAS + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].NOME_PRODUTOS + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].VALOR_COMPRAS + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].DATA_CAD + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].STATUS_COMPRAS + ` </td>
                </tr>
                `
                $('.listaDadosCompras').append(detalhesDadosCompras)
            }
            //$('body').append('<script src="client/historical/controller/controlePaginas.js"></script>')
        }
    })
})