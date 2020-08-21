$(document).ready(function() {
    $('.produtos').empty()

    var url = "client/products/model/customersProducts.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let produtos = `
                <div class="row ml-2">
                <div class="mt-3 mr-2 col-12 col-md-2">
                    <div class="card" style="width: 18rem;  height: 20rem;">
                        <div class="card-body">
                                <h5 class="card-title text-dark">` + dados[i].NOME_PRODUTOS + `</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">` + dados[i].PRECO_VENDA_PRODUTOS + `</li>
                                    <li class="list-group-item">` + dados[i].VALIDADE_PRODUTOS + `</li>
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
})