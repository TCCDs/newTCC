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
                var totalSaldo = dados[i].saldo_clientes
                    var resultSaldo = Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(totalSaldo);

                let saldoCliente = `

                <h6 class="text-center saldo-cliente-principal"> ` + resultSaldo + ` </h6>
                `
                $('.saldo-cliente-principal').append(saldoCliente)
            }
        }
    })
})