$(document).ready(function() {

    var url = "client/shopping/model/shopping.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(data) {
            var i = 0;
            while (data[i]) {
                let listarProdutos = `
                <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title"> ` + data[i].NOME_PRODUTOS + `</h5>
                  <h4 class="card-title text-success mt-2"> ` + data[i].PRECO_VENDA_PRODUTOS + `</h4>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><input type="text"  name="quantity" id="quantity` + data[i].ID_PRODUTOS + `" class="form-control" value="1" />
                  </li>
                  <li class="list-group-item"><input type="hidden" name="hidden_name" id="name` + data[i].ID_PRODUTOS + `" value="` + data[i].NOME_PRODUTOS + `" />
                  </li>
                  <li class="list-group-item"><input type="hidden" name="hidden_price" id="price` + data[i].ID_PRODUTOS + `" value="` + data[i].PRECO_VENDA_PRODUTOS + `" /></li>
                </ul>
                <div class="card-body">
                <input type="button" name="add_to_cart" id="` + data[i].ID_PRODUTOS + `" style="margin-top:5px;" class="btn btn-warning form-control add_to_cart" value="Adicionar o carrinho" />
                </div>
              </div>
                `
                $('#products').append(listarProdutos)
                i++;
            }

            $('body').append('<script src="client/shopping/controller/addProducts.js"></script>')
            $('body').append('<script src="client/shopping/controller/deleteProducts.js"></script>')
            $('body').append('<script src="client/shopping/controller/qtdP.js"></script>')

        }
    })
})