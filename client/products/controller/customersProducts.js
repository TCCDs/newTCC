$(document).ready(function() {
    $('tbody').empty()

    var url = "client/products/model/customersProducts.php"

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
                    <td class="text-center" width="20%"> ` + dados[i].PRECO_VENDA_PRODUTOS + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].VALIDADE_PRODUTOS + ` </td>
                    <td class="text-center" width="15%">
                        <button id="` + dados[i].ID_PRODUTOS + `" class="btn btn-outline-primary btn-sm btn-view-produtos"> <i class="mdi mdi-eye mdi-18px"></i> </button>
                    </td>
                </tr>
                `
                $('tbody').append(produtos)
            }
            $('body').append('<script src="client/products/controller/viewProductsCustomers.js"></script>')
        }
    })
})