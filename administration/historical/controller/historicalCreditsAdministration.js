$(document).ready(function() {
    $('.historical').empty()

    var url = "administration/historical/model/historicalCreditsAdministration.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                var valorMoedas = dados[i].VALOR_MOEDAS

                /*var confMoedas = {
                    style: "currency",
                    currency: "BRL"
                }

                var resultValorMoedas = valorMoedas.toLocaleString('pt-BR', confMoedas)

                console.log(resultValorMoedas)*/
               var resultValorMoedas = parseFloat(valorMoedas).toFixed(2).replace('.', ',')

                let historicoMoedas = `
                <div class="row ml-2">
                <div class="mt-3 mr-2 col-12 col-md-2">
                    <div class="card" style="width: 20rem;  height: 13rem;">
                        <div class="card-body">
                                <h5 class="card-title text-dark">` + dados[i].NOME_CLIENTES + `</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">` + resultValorMoedas + `</li>
                                    <li class="list-group-item"> <button id="` + dados[i].ID_MOEDAS + `" class="btn btn-outline-primary btn-block btn-sm btn-view-credito"> <i class="mdi mdi-eye mdi-18px"></i> </button>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
                `
                $('.historical').append(historicoMoedas)
            }
            $('body').append('<script src="administration/historical/controller/viewCreditsAdministration.js"></script>')

        }
    })
})