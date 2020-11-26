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
                var totalSaldoCliente = dados[i].saldo_clientes
                var resultSaldo = Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(totalSaldoCliente);

                let totalSaldo = `
                    <h3 class="totalSaldo">` + resultSaldo + `</h3>
                `
                $('.totalSaldo').append(totalSaldo)
            }
        }
    })
})