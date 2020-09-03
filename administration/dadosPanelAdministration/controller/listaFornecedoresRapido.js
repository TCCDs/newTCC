$(document).ready(function() {
    $('.listaFornecedoresRapido').empty()

    var url = "administration/dadosPanelAdministration/model/listaFornecedoresRapido.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let listaFornecedoresRapido = `
                <tr>
                    <td class="text-center" width="40%"> ` + dados[i].NOME_FANTASIA_FORNECEDORES + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].EMAIL_FORNECEDORES + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].CELULAR_FORNECEDORES + ` </td>
                </tr>
                `
                $('.listaFornecedoresRapido').append(listaFornecedoresRapido)
            }
        }
    })
})