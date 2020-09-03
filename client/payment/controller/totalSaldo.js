$(document).ready(function() {
    $('.totalSaldo').empty()

    var url = "client/payment/model/totalSaldo.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let totalSaldo = `
                    <h3 class="totalSaldo">` + dados[i].saldo_clientes + `</h3>
                `
                $('.totalSaldo').append(totalSaldo)
            }
        }
    })
})