$(document).ready(function() {
    $('.nome-cliente').empty()

    var url = "client/customers/model/nomeCliente.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let nomeCliente = `
                    <h6 class="mt-2 text-center nome-cliente">` + dados[i].NOME_CLIENTES + `</h6>
                `
                $('.nome-cliente').append(nomeCliente)
            }
        }
    })
})