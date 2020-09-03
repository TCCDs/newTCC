$(document).ready(function() {
    $('.ultimaVendas').empty()

    var url = "administration/dadosPanelAdministration/model/ultimaVenda.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let ultimaVendas = `
                    <small class="ultimaVendas">` + dados[i].datas_vendas + `</small>
                `
                $('.ultimaVendas').append(ultimaVendas)
            }
        }
    })
})