$(document).ready(function() {
    $('.saldo-cliente-principal').empty()

    var url = "client/dadosPainelPrincipal/model/saldoCliente.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let saldoCliente = `

                <h6 class="text-center saldo-cliente-principal"> ` + dados[i].saldo_clientes + ` </h6>
                `
                $('.saldo-cliente-principal').append(saldoCliente)
            }
        }
    })
})