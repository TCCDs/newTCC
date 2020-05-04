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
                    <div class="col-md-4" style="margin-top:12px;">
                        <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:350px;" align="center">
                            <h4 class="text-info"> ` + data[i].NOME_PRODUTOS + ` </h4>
                            <h4 class="text-danger"> R$` + data[i].PRECO_VENDA_PRODUTOS + ` </h4>

                            <input type="text"  name="quantity" id="quantity` + data[i].ID_PRODUTOS + `" class="form-control" value="1" />
                            <input type="hidden" name="hidden_name" id="name` + data[i].ID_PRODUTOS + `" value="` + data[i].NOME_PRODUTOS + `" />
                            <input type="hidden" name="hidden_price" id="price` + data[i].ID_PRODUTOS + `" value="` + data[i].PRECO_VENDA_PRODUTOS + `" />
                            <input type="button" name="add_to_cart" id="` + data[i].ID_PRODUTOS + `" style="margin-top:5px;" class="btn btn-warning form-control add_to_cart" value="Add to Cart" />
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