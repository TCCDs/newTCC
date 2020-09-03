$(document).ready(function() {
    $('.totalMarca').empty()

    var url = "administration/dadosPanelAdministration/model/totalMarca.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let totalMarca = `
                    <small class="totalMarca">` + dados[i].total_marca + `</small>
                `
                $('.totalMarca').append(totalMarca)
            }
        }
    })
})