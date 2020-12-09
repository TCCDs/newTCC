$(document).ready(function() {
    $('.btn-adicionar').click(function(e) {
        e.preventDefault()

        var produtos = $('#form-qrcode').serialize()
        var url = "client/leitorQr/model/leitorProdutos.php"

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: url,
            async: true,
            data: produtos,
            success: function(produtos) {
                if (produtos.length > 0) {
                    $('#conteudo').load('client/leitorQr/view/leitorProdutos.html')
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Supermercado Caravelas!',
                        text: 'Código inválido',
                        type: 'error',
                        confirmButtonText: 'Tente novamente...!'
                    })
                }
                $('#form-qrcode input').val("")
            }
        })
    })
})