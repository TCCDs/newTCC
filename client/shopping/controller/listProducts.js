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
                    <tr>
                        <td>` + data[i].product_name + `</td>
                        <td><input type="text" name="quantity[]" id="quantity` + data[i].product_id + `" value="` + data[i].product_quantity + `" data-product_id="` + data[i].product_id + `" class="form-control quantity" /></td>
                        <td align="right">R$ ` + data[i].product_price + `</td>
                        <td align="right">R$ ` + data[i].product_quantity * data[i].product_price + `</td>
                        <td><button name="delete" class="btn btn-danger btn-xs delete" id="` + data[i].product_id + `">Remove</button></td>
                    </tr>
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