$(document).ready(function() {
    $('.listaClientes').empty()

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
                                <h5 class="card-title text-dark">Dados do cliente</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Nome do cliente<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].NOME_CLIENTES + `</div></div></li>
                                    <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>CEP<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].CEP_CLIENTES + `</div></div></li>
                                    <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Cidade<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].CIDADE_CLIENTES + `</div></div></li>
                                    <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Estado<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].ESTADO_CLIENTES + `</div></div></li>
                                    <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Endereço<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].ENDERECO_CLIENTES + `</div></div></li>
                                    <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Número<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].NUMERO_CLIENTES + `</div></div></li>
                                    <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Bairro<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].BAIRRO_CLIENTES + `</div></div></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                `
                $('.listaClientes').append(detalhesDadosCompras)
            }

            $('#modalContato').modal('show')
        }
    })
})