$(document).ready(function() {
    $('.supermercado').empty()

    var url = "client/payment/model/taxSupermarket.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let supermercado = `
                    <div class="col-12 col-md-12">
                        <h5> ` + dados[i].NOME + `</h5>
                    </div>

                    <div class="col-12 col-md-12 mt-2">
                        CNPJ : ` + dados[i].CNPJ + `
                    </div>

                    <div class="row mt-2">
                        <div class="col-6 col-md-6">
                            <small>
                                Telefone : ` + dados[i].TELEFONE + `
                            </small>
                        </div>
                        <div class="col-6 col-md-6">
                            <small>
                            ` + dados[i].ENDERECO + `, ` + dados[i].NUMERO + `
                            </small>
                        </div>
                    </div>
                `
                $('.supermercado').append(supermercado)
            }
        }
    })
})