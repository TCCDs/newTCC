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

            let listaProdutos = `        
                <h3> ` + total + ` </h3>
            `

            $('.listaTotalProdutos').append(listaProdutos)
        }
    })
})