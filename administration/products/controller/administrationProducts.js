$(document).ready(function() {
    $('tbody').empty()

    var url = "administration/products/model/administrationProducts.php"

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
                        <button id="` + dados[i].ID_PRODUTOS + `" class="btn btn-primary btn-sm btn-view-produtos"> <i class="mdi mdi-eye mdi-18px"></i> </button>
                        <button id="` + dados[i].ID_PRODUTOS + `" class="btn btn-warning btn-sm btn-edit"> <i class="mdi mdi-pencil mdi-18px"></i> </button>
                        <button id="` + dados[i].ID_PRODUTOS + `" class="btn btn-danger btn-sm btn-delete"> <i class="mdi mdi-delete mdi-18px"></i> </button>
                    </td>
                </tr>
                `
                $('tbody').append(produtos)
            }
            $('body').append('<script src="administration/products/controller/viewProductsAdministration.js"></script>')
                //$('body').append('<script src="administration/products/controller/edit-produto.js"></script>')
            $('body').append('<script src="administration/products/controller/deleteProductsAdministration.js"></script>')
            $('body').append('<script>$(".produtos-add").click(function(){ $("#conteudo").load("administration/form/formProdutos/view/formProducts.html")})</script>')

        }
    })
})