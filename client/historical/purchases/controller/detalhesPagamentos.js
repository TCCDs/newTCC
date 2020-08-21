$(document).ready(function() {
    $('.listaPagamento').empty()

    var url = "client/historical/purchases/model/detalhesComprasDados.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let detalhesDadosCompras = `
                <div class="row">
                <div class="mt-3 ml-2 mr-2 col-12 col-sm-6 col-md-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                                <h5 class="card-title text-dark">Detalhes do pagamento</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">` + dados[i].NOME_CARTAO + `</li>
                                    <li class="list-group-item">` + dados[i].NUMERO_CARTAO + `</li>
                                    <li class="list-group-item">` + dados[i].STATUS_PAGAMENTO + `</li>
                                    <li class="list-group-item">` + dados[i].CODIGO_PAGAMENTO + `</li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
                `
                $('.listaPagamento').append(detalhesDadosCompras)
            }
        }
    })
})