$(document).ready(function() {
    $('.totalVendas').empty()

    var url = "administration/dadosPanelAdministration/model/totalVendas.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let totalVendas = `
                    <small class="totalVendas">` + dados[i].total_vendas + `</small>
                `
                $('.totalVendas').append(totalVendas)
            }
        }
    })
})