$(document).ready(function() {
    $('.totalProdutos').empty()

    var url = "administration/dadosPanelAdministration/model/totalProdutos.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let totalProdutos = `
                    <small class="totalProdutos">` + dados[i].total_produtos + `</small>
                `
                $('.totalProdutos').append(totalProdutos)
            }
        }
    })
})