$(document).ready(function() {
    $('tbody').empty()

    var url = "administration/purchasesCheck/model/processoVericacao.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let produtos = `
                    <tr>
                        <td class="text-center" width="40%"> ` + dados[i].NOME_PRODUTOS + ` </td>
                        <td class="text-center" width="20%"> ` + dados[i].QUANTIDADE_PRODUTOS + ` </td>
                        <td class="text-center" width="20%"> ` + dados[i].PRECO_PRODUTOS + ` </td>
                    </tr>
                `
                $('tbody').append(produtos)
            }
        }
    })
})