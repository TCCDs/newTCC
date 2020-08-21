$(document).ready(function() {
    $('.saldo-cliente-principal').empty()

    var url = "client/customers/model/saldoCliente.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let saldoCliente = `

                <h4 class="saldo-cliente-principal"> ` + dados[i].MOEDAS + ` </h4>
                `
                $('.saldo-cliente-principal').append(saldoCliente)
            }
        }
    })
})