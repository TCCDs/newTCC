$(document).ready(function(data) {
    $(document).on('click', '.delete', function() {
        var product_id = $(this).attr("id");
        var action = "remove";
        if (confirm("Are you sure you want to remove this product?")) {
            $.ajax({
                url: "client/shopping/model/action.php",
                method: "POST",
                dataType: "json",
                data: { product_id: product_id, action: action },
                success: function(data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Supermecado Caravelas',
                        type: 'error',
                        confirmButtonText: 'Deseja excluir? '
                    })
                }
            });
        } else {
            return false;
        }
    });
});