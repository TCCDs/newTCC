$(document).ready(function() {
    $('.listaProdutos').empty()

    var url = "client/historical/purchases/model/detalhesComprasProdutos.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let detalhesComprasProdutos = `
                <div class="row">
                    <div class="mt-3 mr-2 col-12 col-md-2">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                    <h5 class="card-title text-dark">` + dados[i].NOME_PRODUTOS + `</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">` + dados[i].QUANTIDADE_PRODUTOS + `</li>
                                        <li class="list-group-item">` + dados[i].PRECO_PRODUTOS + `</li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
                `
                $('.listaProdutos').append(detalhesComprasProdutos)
            }

        }
    })
})