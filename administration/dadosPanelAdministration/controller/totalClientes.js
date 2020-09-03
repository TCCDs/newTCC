$(document).ready(function() {
    $('.totalClientes').empty()

    var url = "administration/dadosPanelAdministration/model/totalClientes.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let totalClientes = `
                    <small class="totalClientes">` + dados[i].total_clientes + `</small>
                `
                $('.totalClientes').append(totalClientes)
            }
        }
    })
})