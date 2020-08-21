$(document).ready(function() {
    $('.listaPagamento').empty()

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
                    <td class="text-center" width="40%"> ` + dados[i].NOME_CARTAO + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].NUMERO_CARTAO + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].STATUS_PAGAMENTO + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].CODIGO_PAGAMENTO + ` </td>
                </tr>
                `
                $('.listaPagamento').append(detalhesDadosCompras)
            }
        }
    })
})