$(document).ready(function() {
    $('.credito').empty()

    var url = "client/historical/purchases/model/detalhesComprasDados.php"

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
                let dataAtual2 = new Date(dados[i].DATA_CAD_COMPRAS);
                let dataAtualFormatada2 = (adicionaZero(dataAtual2.getDate().toString()) + "/" + (adicionaZero(dataAtual2.getMonth() + 1).toString()) + "/" + dataAtual2.getFullYear());

                var totalCompras = dados[i].VALOR_COMPRAS
                var resultValorCompras = Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(totalCompras);
                let detalhesDadosCompras = `
                    <div class="row">
                        <div class="mt-3 ml-2 mr-2 col-12 col-sm-6 col-md-4">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                        <h5 class="card-title text-dark text-center">` + dados[i].CODIGO_COMPRAS + `</h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Nome do produto<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].NOME_PRODUTOS + `</div></div></li>
                                            <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Valor da compra<span/></div><div class="col-12 col-md-12 mt-2">` + resultValorCompras + `</div></div></li>
                                            <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Data de cadastro<span/></div><div class="col-12 col-md-12 mt-2">` + dataAtualFormatada2 + `</div></div></li>
                                            <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Status da compra<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].STATUS_COMPRAS + `</div></div></li>
                                            <li class="list-group-item">  
                                                <button id="` + dados[i].CODIGO_ITENS + `" class="btn btn-block btn-outline-primary btn-sm btn-detalhes"> 
                                                    <i class="mdi mdi-eye mdi-18px"></i> 
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
            $('body').append('<script src="client/historical/purchases/controller/detalhesComprasProdutos.js"></script>')
        }
    })
})