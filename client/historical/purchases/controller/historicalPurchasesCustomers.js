$(document).ready(function() {
    $('.credito').empty()

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
                                    <h5 class="card-title text-dark">` + dados[i].CODIGO_COMPRAS + `</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">` + dados[i].NOME_PRODUTOS + `</li>
                                        <li class="list-group-item">` + dados[i].VALOR_COMPRAS + `</li>
                                        <li class="list-group-item">` + dados[i].DATA_CAD + `</li>
                                        <li class="list-group-item">` + dados[i].STATUS_COMPRAS + `</li>
                                        <li class="list-group-item">  <button class="btn btn-outline-primary btn-sm btn-detalhes"> <i class="mdi mdi-eye mdi-18px"></i> </button>
                                        </button>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
                `
                $('.credito').append(detalhesDadosCompras)
            }
            $('body').append('<script src="client/historical/purchases/controller/controlePaginas.js"></script>')
        }
    })
})