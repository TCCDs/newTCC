$(document).ready(function() {
    $('tbody').empty()

    var url = "administration/customers/model/customerAdministration.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let cliente = `
                <tr>
                    <td class="text-center" width="40%"> ` + dados[i].NOME_CLIENTES + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].RG_CLIENTES + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].CPF_CLIENTES + ` </td>
                    <td class="text-center" width="40%"> ` + dados[i].DATA_NASCIMENTO_CLIENTES + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].CELULAR_CLIENTES + ` </td>
                    <td class="text-center" width="20%"> ` + dados[i].EMAIL_CLIENTES + ` </td>
                    <td class="text-center" width="15%">
                        <button id="` + dados[i].ID_CLIENTES + `" class="btn btn-outline-primary btn-sm btn-view-clientes"> <i class="mdi mdi-eye mdi-18px"></i> </button>
                        <button id="` + dados[i].ID_CLIENTES + `" class="btn btn-outline-warning btn-sm btn-edit-clientes"> <i class="mdi mdi-pencil mdi-18px"></i> </button>
                    </td>
                </tr>
                `
                $('tbody').append(cliente)
            }
            $('body').append('<script src="administration/customers/controller/viewClientAdministration.js"></script>')
            $('body').append('<script src="administration/customers/controller/editClientAdministration.js"></script>')
        }
    })
})