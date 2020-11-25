$(document).ready(function() {
    $('.dataCompra-cliente').empty()

    var url = "client/customers/model/dataCompra.php"

        function adicionaZero(numero) {
        if (numero <= 9)
            return "0" + numero;
        else
            return numero;
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let dataAtual2 = new Date(dados[i].DATA_CAD);
                let dataAtualFormatada2 = (adicionaZero(dataAtual2.getDate().toString()) + "/" + (adicionaZero(dataAtual2.getMonth() + 1).toString()) + "/" + dataAtual2.getFullYear());

                let dataCompra = `

                <h6 class="text-left dataCompra-cliente">` + dados[i].dataAtualFormatada2 + `</h6>
                `
                $('.dataCompra-cliente').append(dataCompra)
            }
        }
    })
})