$(document).ready(function() {
    $('.nome-cliente').empty()

    var url = "client/customers/model/saldoCliente.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let dataCompra = `
                    <h6 class="mt-2 text-center nome-cliente">` + dados[i].NOME_CLIENTES + `</h6>
                `
                $('.nome-cliente').append(dataCompra)
            }
        }
    })
})