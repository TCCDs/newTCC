$(document).ready(function() {
    $('.historical').empty()

    var url = "administration/historical/model/historicalCreditsAdministration.php"

    function adicionaZero(numero) {
        if (numero <= 9)
            return "0" + numero;
        else
            return numero;
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let dataAtual2 = new Date(dados[i].DATA_CAD_MOEDAS);
                let dataAtualFormatada2 = (adicionaZero(dataAtual2.getDate().toString()) + "/" + (adicionaZero(dataAtual2.getMonth() + 1).toString()) + "/" + dataAtual2.getFullYear());

                var valorMoedas = dados[i].VALOR_MOEDAS
                var resultValorMoedas = Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(valorMoedas);

                let historicoMoedas = `
                <div class="row">
                <div class="mt-3  mr-2 col-12 col-sm-6 col-md-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                        <h5 class="card-title text-dark">` + dados[i].NOME_CLIENTES + `</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Código<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].CODIGOS + `</div></div></li>
                                <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Valor de Moedas<span/></div><div class="col-12 col-md-12 mt-2">` + resultValorMoedas + `</div></div></li>
                                <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Data de cadastro<span/></div><div class="col-12 col-md-12 mt-2">` + dataAtualFormatada2 + `</div></div></li>
                                <li class="list-group-item"> <button id="` + dados[i].ID_MOEDAS + `" class="btn btn-block btn-outline-primary btn-sm btn-view-credito"> <i class="mdi mdi-eye mdi-18px"></i> </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
             </div>
                `
                $('.historical').append(historicoMoedas)
            }
            //$('body').append('<script src="administration/historical/controller/viewCreditsAdministration.js"></script>')

        }
    })
})

/*
                <div class="row ml-2">
                <div class="mt-3 mr-2 col-12 col-md-2">
                    <div class="card" style="width: 20rem;  height: 13rem;">
                        <div class="card-body">
                                <h5 class="card-title text-dark">` + dados[i].NOME_CLIENTES + `</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"> ` + resultValorMoedas + `</li>
                                    <li class="list-group-item"> <button id="` + dados[i].ID_MOEDAS + `" class="btn btn-outline-primary btn-block btn-sm btn-view-credito"> <i class="mdi mdi-eye mdi-18px"></i> </button>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
*/