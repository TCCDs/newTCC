$(document).ready(function() {
    $('.totalFornecedores').empty()

    var url = "administration/dadosPanelAdministration/model/totalFornecedores.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let totalFornecedores = `
                    <small class="totalFornecedores">` + dados[i].total_fornecedores + `</small>
                `
                $('.totalFornecedores').append(totalFornecedores)
            }
        }
    })
})