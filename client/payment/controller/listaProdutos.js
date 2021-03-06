$(document).ready(function() {
    $('#listaProdutosCards').empty()

    var url = "client/payment/model/listaProdutos.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            var total = 0
            for (var i = 0; i < dados.length; i++) {
                var totalPreco = dados[i].product_price
                var resultValorPreco = Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(totalPreco);

                total = total + (dados[i].product_quantity * dados[i].product_price)

                let listaProdutos = `
                    <div class="mt-3 col-12 col-sm-6 col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-12 col-md-12">
                                    ` + dados[i].product_name + `
                                </div>
                            </div>

                            <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                            <div class="col-12 col-md-6">
                                                Quantidade
                                            </div>

                                            <div class="col-12 col-md-6>
                                                <small>` + dados[i].product_quantity + `</small>
                                            </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="col-12 col-md-6">
                                            Preço
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <small> ` + resultValorPreco + `</small>
                                        </div>
                                    </li>
                                <li class="list-group-item">
                                    <div class="col-12 col-md-6">
                                        Subtotal 
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <small> R$ ` + total + `</small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                `


                $('#listaProdutosCards').append(listaProdutos)
            }
        }
    })
})