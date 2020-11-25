$(document).ready(function() {
    $('#cupomClientes').empty()

    var url = "client/payment/model/cupomClientes.php"

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

                let cupomSupermercadoCliente = `
                    <hr class="mt-2">

                    <div class="row text-center">
                        <div class="col-6 col-md-6">
                            <h4>
                                Total
                            </h4>
                        </div>
                        <div class="col-6 col-md-6">
                            <h4>
                                ` + dados[i].VALOR_COMPRAS + `
                            </h4>
                        </div>
                    </div>


                    <hr class="mt-2">

                    <div class="col-6 col-md-6 ">
                        <small>
                            <div class="row">
                                Data da Compra
                            </div>
                            <div class="row">
                            ` + dataAtualFormatada2 + `
                            </div>
                        </small>
                    </div>

                <hr class="mt-2">

                    <div class="row">
                        <div class="col-6 col-md-6">
                            <h5>Pagamento</h5>
                        </div>
                        <div class="col-6 col-md-6">
                            <h6>` + dados[i].TIPO_PAGAMENTO + `</h6>
                        </div>
                    </div>

                    <div class="card-footer text-muted">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <h5>Consumidor</h5>
                            </div>
                            <div class="col-6 col-md-6">` + dados[i].NOME_CLIENTES + `</div>
                            <div class="col-6 col-md-6">` + dados[i].CPF_CLIENTES + `</div>
                        </div>
                    </div>
                `
                $('#cupomClientes').append(cupomSupermercadoCliente)
            }
        }
    })
})