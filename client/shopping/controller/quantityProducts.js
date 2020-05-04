$(document).ready(function(data) {
    $(document).on('keyup', '.quantity', function() {
        var product_id = $(this).data("product_id");
        var quantity = $(this).val();
        var action = "quantity_change";
        if (quantity != '') {
            $.ajax({
                url: "client/shopping/model/action.php",
                method: "POST",
                dataType: "json",
                data: { product_id: product_id, quantity: quantity, action: action },
                success: function(data) {


                }

            });
        }
    });
});