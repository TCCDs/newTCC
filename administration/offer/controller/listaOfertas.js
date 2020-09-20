$(document).ready(function() {
    $('#display_item').empty()

    var url = "administration/offer/model/listaOfertas.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(data) {
            var i = 0;
            while (data[i]) {
                let produtos = `
                    <ul class='screens animate'>
                        <li class='screen active'>
                            <div class="col-12 col-md-12">
                                <div class="card1">
                                    <img class="img-fluid img-card1" src="img/camil.png" alt=" Arroz Camil">
                                </div>

                                <h3 class="mt-4 text-light text-product">
                                    ` + data[i].NOME_PRODUTOS + `
                                </h3>

                                <h5 class="mt-4 text-light text-price"> R$ ` + data[i].PRECO_VENDA_PRODUTOS + ` </h5>
                                <input type="text"  name="quantity" id="quantity` + data[i].ID_PRODUTOS + `" class="form-control" value="1" />
                                <input type="hidden" name="hidden_name" id="name` + data[i].ID_PRODUTOS + `" value="` + data[i].NOME_PRODUTOS + `" />
                                <input type="hidden" name="hidden_price" id="price` + data[i].ID_PRODUTOS + `" value="` + data[i].PRECO_VENDA_PRODUTOS + `" />
                                <button name="add_to_cart" id="` + data[i].ID_PRODUTOS + `" class="btn btn-block mt-4 btn-offer">Adicionar ao carrinho</button>
                            </div>
                        </li>
                    </ul>

                `

                $('#display_item').append(produtos)
                i++;
            }
        }
    })
})

