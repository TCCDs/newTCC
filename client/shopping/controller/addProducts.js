$(document).ready(function(data) {
    $('.add_to_cart').click(function() {
        var product_id = $(this).attr("id");
        var product_name = $('#name' + product_id).val();
        var product_price = $('#price' + product_id).val();
        var product_quantity = $('#quantity' + product_id).val();
        var action = "add";
        if (product_quantity > 0) {
            $.ajax({
                url: "client/shopping/model/action.php",
                method: "POST",
                dataType: "json",
                data: {
                    product_id: product_id,
                    product_name: product_name,
                    product_price: product_price,
                    product_quantity: product_quantity,
                    action: action
                },
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Supermecado Caravelas',
                        type: 'success',
                        confirmButtonText: 'O produto foi adicionado ao carrinho '
                    })
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Supermecado Caravelas',
                type: 'error',
                confirmButtonText: 'Digite o número da quantidade '
            })
        }
    });
});