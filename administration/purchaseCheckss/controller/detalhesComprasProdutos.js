$(document).ready(function() {
    $('.listaProdutos').empty()

    var url = "administration/purchaseCheck/model/detalhesComprasProdutos.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let detalhesComprasProdutos = `
                <tr>
                    <td class="text-center" width="20%"> ` + dados[i].NOME_PRODUTOS + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].QUANTIDADE_PRODUTOS + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].PRECO_PRODUTOS + ` </td>
                </tr>
                `
                $('.listaProdutos').append(detalhesComprasProdutos)
            }

        }
    })
})