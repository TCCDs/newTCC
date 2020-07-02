$(document).ready(function() {
    $('.dataCompra-cliente').empty()

    var url = "client/customers/model/dataCompra.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let dataCompra = `

                <h6 class="text-left dataCompra-cliente">` + dados[i].DATA_CAD + `</h6>
                `
                $('.dataCompra-cliente').append(dataCompra)
            }
        }
    })
})