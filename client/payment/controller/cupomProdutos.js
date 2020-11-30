$(document).ready(function() {
    $('#cupomProdutos').empty()

    var url = "client/payment/model/cupomProdutos.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                var totalPreco = dados[i].PRECO_PRODUTOS
                var resultValorPreco = Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(totalPreco);

                var resultQuantidade = dados[i].QUANTIDADE_PRODUTOS
                var subTotal = (resultValorPreco * resultQuantidade)

                var resultSubTotal = Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(subTotal);

                let cupomSupermercado = `
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <h6>
                                ` + dados[i].NOME_PRODUTOS + `
                                </h6>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-4 col-md-4">
                                <div class="row">
                                    <span>Quantidade</span>
                                </div>
                                <div class="row mt-1 ">
                                    <h6>
                                    ` + dados[i].QUANTIDADE_PRODUTOS + `
                                    </h6>
                                </div>
                            </div>

                            <div class="col-4 col-md-4">
                                <div class="row">
                                    <span>Preço unitário</span>
                                </div>
                                <div class="row mt-1">
                                    <h6>
                                         ` + resultValorPreco + `
                                    </h6>
                                </div>
                            </div>

                            <div class="col-4 col-md-4">
                                <div class="row">
                                    <span>Subtotal</span>
                                </div>
                                <div class="row mt-1">
                                    <h6>
                                        R$: ` + resultSubTotal + `
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                `
                $('#cupomProdutos').append(cupomSupermercado)
            }
        }
    })
})