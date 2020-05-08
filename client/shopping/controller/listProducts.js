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
                  <h4 class="card-title text-success mt-2"><input type="text" name="quantity[]" id="quantity` + data[i].product_id + `" value="` + data[i].product_quantity + `" data-product_id="` + data[i].product_id + `" class="form-control quantity" disabled /> </h4>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                  <div class="row ">
                  <div class="col-6 col-md-6">
                <h6>Preço Unitário</h6></div>
                  <div class="col-6 col-md-6"> 
                  <h6>R$ ` + data[i].product_price + `</h6>
                  </div>               
                  </li>
                  <li class="list-group-item">
                  <div class="row ">
                  <div class="col-6 col-md-6">
                <h6>Preço Total</h6></div>
                  <div class="col-6 col-md-6"> 
                  <h6>R$ ` + data[i].product_quantity * data[i].product_price + `</h6>
                  </div>
                  </li>
                  <li class="list-group-item"><button name="delete" class="btn btn-danger btn-block btn-xs delete" id="` + data[i].product_id + `">Remove</button></li>
                </ul>
              </div>
              
                    `
                var total = total + (data[i].product_quantity * data[i].product_price);
                $('.modal-body').append(listarProdutosCompra)
                $('#cart').append(listarProdutosCompra)

            }

            //console.log(totalResult);
            let listarProdutosCompra = `
            <div class="col-12 col-md-12 saldo fixed-bottom ">
             <div class="card text-center mt-2 ">
                <div class="card-header">
                <div class="row ">
                <div class="col-6 col-md-6">
                <small>Saldo</small>
                <h4>20,00</h4></div>
                <div class="col-6 col-md-6"> 
                <small>Total</small>
                <h4>R$ ` + total + `</h4>
                </div>
               </div>
                </div>
                <div class="card-body">
                 <form id="addHistoricoCompra">
                 <input type="button" name="place_order" class="btn btn-md btn-block btn-warning place_order" value="Finalizar Compra" />
                </form>
                </div>
            </div>  
            </div>           
            `

            $('.modal-body').append(listarProdutosCompra)
            $('#cart').append(listarProdutosCompra)


            // $('#order_table').html(data.order_table);

            //$('body').append('<script src="cliente/comprar/controller/addProdutos.js"></script>')
            //$('body').append('<script src="cliente/comprar/controller/carFinalizar.js"></script>')

        }
    })
})