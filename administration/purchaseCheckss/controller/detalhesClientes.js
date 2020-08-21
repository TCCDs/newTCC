$(document).ready(function() {
    $('.listaClientes').empty()

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
                    <td class="text-center" width="40%"> ` + dados[i].NOME_CLIENTES + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].CEP_CLIENTES + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].CIDADE_CLIENTES + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].ESTADOS_CLIENTES + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].ENDERECO_CLIENTES + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].NUMERO_CLIENTES + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].BAIRRO_CLIENTES + ` </td>
                </tr>
                `
                $('.listaClientes').append(detalhesDadosCompras)
            }
        }
    })
})