$(document).ready(function() {
    $('.credito').empty()

    var url = "client/historical/credits/model/historicalCreditsCustomers.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let historicoMoedas = `
                <div class="row">
                    <div class="mt-3  mr-2 col-12 col-sm-6 col-md-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                            <h5 class="card-title text-dark">` + dados[i].NOME_CLIENTES + `</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">` + dados[i].CODIGOS + `</li>
                                    <li class="list-group-item">` + dados[i].VALOR_MOEDAS + `</li>
                                    <li class="list-group-item">` + dados[i].DATA_CAD_MOEDAS + `</li>
                                    <li class="list-group-item">` + dados[i].NOME_CARTAO + `</li>
                                    <li class="list-group-item">` + dados[i].NUMERO_CARTAO + `</li>
                                    <li class="list-group-item"> <button id="` + dados[i].ID_MOEDAS + `" class="btn btn-outline-primary btn-sm btn-view-credito"> <i class="mdi mdi-eye mdi-18px"></i> </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                 </div>
                `
                $('.credito').append(historicoMoedas)
            }
            //$('body').append('<script src="client/historical/controller/viewCreditsAdministration.js"></script>')

        }
    })
})