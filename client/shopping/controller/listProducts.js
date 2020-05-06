$(document).ready(function() {

    var url = "client/shopping/model/listProducts.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(data) {
            total = 0;
            for (var i = 0; i < data.length; i++) {
                let listarProdutosCompra = `

                <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title"> ` + data[i].product_name + `</h5>
                  <h4 class="card-title text-success mt-2"><input type="text" name="quantity[]" id="quantity` + data[i].product_id + `" value="` + data[i].product_quantity + `" data-product_id="` + data[i].product_id + `" class="form-control quantity" /> </h4>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">R$ ` + data[i].product_price + `</li>
                  <li class="list-group-item">R$ ` + data[i].product_quantity * data[i].product_price + `
                  </li>
                  <li class="list-group-item"><button name="delete" class="btn btn-danger btn-xs delete" id="` + data[i].product_id + `">Remove</button></li>
                </ul>
                <div class="card-body">
                <input type="button" name="add_to_cart" id="` + data[i].ID_PRODUTOS + `" style="margin-top:5px;" class="btn btn-warning form-control add_to_cart" value="Adicionar o carrinho" />
                </div>
              </div>
              
                    `
                var total = total + (data[i].product_quantity * data[i].product_price);
                $('tbody').append(listarProdutosCompra)

            }

            //console.log(totalResult);
            let listarProdutosCompra = `
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">R$ ` + total + `</td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="5" align="center">
                        <form id="addHistoricoCompra">
                            <input type="button" name="place_order" class="btn btn-warning place_order" value="Finalizar Compra" />
                        </form>
                    </td>
                </tr>
            `

            $('tbody').append(listarProdutosCompra)

            // $('#order_table').html(data.order_table);

            //$('body').append('<script src="cliente/comprar/controller/addProdutos.js"></script>')
            //$('body').append('<script src="cliente/comprar/controller/carFinalizar.js"></script>')

        }
    })
})