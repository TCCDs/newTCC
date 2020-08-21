$(document).ready(function() {
    $('.saldo-cliente').empty()

    var url = "client/customers/model/saldoCliente.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let saldoCliente = `

                <h6 class="text-left saldo-cliente"> ` + dados[i].MOEDAS + ` </h6>
                `
                $('.saldo-cliente').append(saldoCliente)
            }
        }
    })
})