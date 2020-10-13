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
                let cupomSupermercado = `
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
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
                                        R$ ` + dados[i].PRECO_PRODUTOS + `
                                    </h6>
                                </div>
                            </div>

                            <div class="col-4 col-md-4">
                                <div class="row">
                                    <span>Subtotal</span>
                                </div>
                                <div class="row mt-1">
                                    <h6>
                                        R$ ` + dados[i].PRECO_PRODUTOS * dados[i].QUANTIDADE_PRODUTOS + `
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