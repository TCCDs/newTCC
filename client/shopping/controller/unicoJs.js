$(document).ready(function() {
    load_ofertas();
    load_product();
    load_cart_data();

    function load_ofertas() {
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
                    <div class="col-12 col-md-12">
                    <div class='walkthrough show reveal mt-2'>
                        <div class='walkthrough-body'>
                            <ul class='screens animate'>
                                <li class='screen active'>
                                    <div class="col-12 col-md-12 ">
                                        <div class="card1">
                                            <img class="img-fluid img-card1" src="" alt=" ">
                                        </div>
                                        <h3 class="mt-4 text-light text-product">
                                        ` + data[i].NOME_PRODUTOS + `
                                        </h3>
                                        <h5 class="mt-4 text-light text-price">R$` + data[i].PRECO_OFERTA + `</h5>
                                        <input type="text"  name="quantity" id="quantity` + data[i].ID_OFERTA + `" class="form-control" value="1" />
                                        <input type="hidden" name="hidden_name" id="name` + data[i].ID_OFERTA + `" value="` + data[i].NOME_PRODUTOS + `" />
                                        <input type="hidden" name="hidden_price" id="price` + data[i].ID_OFERTA + `" value="` + data[i].PRECO_OFERTA + `" />
                                        <input type="button" name="add_to_cart" id="` + data[i].ID_OFERTA + `" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Adicionar no carrinho" />                                    </div>
                                </li>
                            </ul>
                            <button class='prev-screen'>
                          <i class='mdi mdi-skip-previous-outline'></i>
                        </button>
                            <button class='next-screen'>
                          <i class='mdi mdi-skip-next'></i>
                        </button>
                        </div>
                        <div class='walkthrough-pagination'>
                            <a class='dot active'></a>
                            <a class='dot'></a>
                            <a class='dot'></a>
                            <a class='dot'></a>
                            <a class='dot'></a>
                        </div>
                        `

                    $('#display_item_ofertas').append(produtos)
                    i++;
                }
            }
        })
    }


    function load_product() {
        var url = "client/leitorQr/model/testeLeitor.php"

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: url,
            async: true,
            success: function(data) {
                var i = 0;
                while (data[i]) {
                    let listaProdutos = `
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="text-center">  ` + data[i].DESCRICAO + ` </h5>
                                    <h4 class="text-center"> ` + data[i].NOME_PRODUTOS + ` </h4>
                                    <h5 class="text-center mt-2"> R$` + data[i].PRECO_VENDA_PRODUTOS + ` </h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                <div class="col-12 col-md-12">
                                <div class=" form-group form">
                                    <input type="text" name="quantity" id="quantity` + data[i].ID_PRODUTOS + `" aria-autocomplete="off" required  value="1">
                                    <label for="quantity" class="label-input">
                                        <span class="content-input">Quantidade</span>
                                    </label>
                                </div>
                            </div>
                                    <input type="hidden" name="hidden_name" id="name` + data[i].ID_PRODUTOS + `" value="` + data[i].NOME_PRODUTOS + `" />
                                    <input type="hidden" name="hidden_price" id="price` + data[i].ID_PRODUTOS + `" value="` + data[i].PRECO_VENDA_PRODUTOS + `" />
                                    <input type="button" name="add_to_cart" id="` + data[i].ID_PRODUTOS + `" style="margin-top:5px;" class="btn btn-info form-control add_to_cart" value="Adicionar ao carrinho" />
                                </ul>
                            </div>
                        `

                    $('#display_item').append(listaProdutos)
                    i++;
                }
            }
        })
    }

    function load_cart_data() {
        $.ajax({
            url: "client/shopping/model/fetch_cart.php",
            method: "POST",
            dataType: "json",
            success: function(data) {
                $('#cart_details').html(data.cart_details);
                $('.total_price').text(data.total_price);
            }
        })
    }

    $('#cart-popover').popover({
        html: true,
        container: 'body',
        content: function() {
            return $('#popover_content_wrapper').html();
        }
    });

    $(document).on('click', '.add_to_cart', function() {
        var product_id = $(this).attr('id');
        var product_name = $('#name' + product_id + '').val();
        var product_price = $('#price' + product_id + '').val();
        var product_quantity = $('#quantity' + product_id).val();
        var action = 'add';

        if (product_quantity > 0) {
            $.ajax({
                url: "client/shopping/model/action.php",
                method: "POST",
                data: {
                    product_id: product_id,
                    product_name: product_name,
                    product_price: product_price,
                    product_quantity: product_quantity,
                    action: action
                },
                success: function(data) {
                    // load_cart_data();
                    Swal.fire({
                        title: 'Deseja adicionar mais produtos?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Finalizar compra',
                        confirmButtonText: 'Sim'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#conteudo').load('client/leitorQr/view/leitorProdutos.html')
                            $('.saldo').hide();
                            $('.menu').hide();
                        } else {
                            $('#conteudo').load('client/shopping/view/shopping.html')
                            $('.saldo').hide();
                            $('.menu').hide();
                        }
                    })
                }
            })
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Digite uma quantidade válida',
            })
        }
    });

    $(document).on('click', '.delete', function() {
        var product_id = $(this).attr('id');
        var action = 'remove';
        Swal.fire({
            icon: 'question',
            title: 'Supermercado Caravelas!',
            text: 'Deseja excluir um item?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Desistir da exclusão',
            confirmButtonText: 'Confirmar a exclusão'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "client/shopping/model/action.php",
                    method: "POST",
                    data: { product_id: product_id, action: action },
                    success: function(data) {
                        load_cart_data();
                        Swal.fire({
                            icon: 'success',
                            title: 'Supermercado Caravelas!',
                            text: 'Exclusão efetuada com sucesso',
                            type: 'success',
                            confirmButtonText: 'Feito!'
                        })
                    }
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Supermercado Caravelas!',
                    text: 'Operação cancelada com sucesso',
                    type: 'success',
                    confirmButtonText: 'Feito!'
                })
            }
        });
    });


    $(document).on('click', '#clear_cart', function() {
        var action = 'empty';
        $.ajax({
            url: "client/shopping/model/action.php",
            method: "POST",
            data: { action: action },
            success: function() {
                load_cart_data();
                Swal.fire({
                    icon: 'success',
                    title: 'Supermercado Caravelas!',
                    text: 'Carrinho limpo!!',
                    type: 'success',
                    confirmButtonText: 'Feito!'
                })
            }
        })
    });
});