$('.produtos').empty()

var url = "client/products/model/customersProducts.php"

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
            let dataAtual2 = new Date(dados[i].VALIDADE_PRODUTOS);
            let dataAtualFormatada2 = (adicionaZero(dataAtual2.getDate().toString()) + "/" + (adicionaZero(dataAtual2.getMonth() + 1).toString()) + "/" + dataAtual2.getFullYear());

            var totalVendaPreco = dados[i].PRECO_VENDA_PRODUTOS
            var resultValorPreco = Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(totalVendaPreco);

            let produtos = `

            <div class="row ml-2">
            <div class="mt-3 mr-2 col-12 col-md-2">
                <div class="card" style="width: 18rem;  height: 20rem;">
                    <div class="card-body">
                            <h5 class="card-title text-dark">` + dados[i].NOME_PRODUTOS + `</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">` + resultValorPreco + `</li>
                                <li class="list-group-item">` + dataAtualFormatada2 + `</li>
                                <li class="list-group-item"><button id="` + dados[i].ID_PRODUTOS + `" class="btn  btn-block btn-outline-primary btn-sm btn-view-produtos"> <i class="mdi mdi-eye mdi-18px "></i> </button>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>

            `
            $('.produtos').append(produtos)
        }

        $('body').append('<script src="client/products/controller/viewProductsCustomers.js"></script>')
    }
})