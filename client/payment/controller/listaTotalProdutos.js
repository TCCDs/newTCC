$(document).ready(function() {
    $('.listaTotalProdutos').empty()

    var url = "client/payment/model/listaProdutos.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            var total = 0;
            for (var i = 0; i < dados.length; i++) {
                total = total + (dados[i].product_quantity * dados[i].product_price)
            }

            var totalPreco = total
            var resultValorPreco = Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(totalPreco);

            let listaProdutos = `        
                <h3> ` + resultValorPreco + ` </h3>
            `

            $('.listaTotalProdutos').append(listaProdutos)
        }
    })
})