$(document).ready(function() {
    $('.btn-adicionar').click(function(e) {
        e.preventDefault()

        var dados = $('#form-qrcode').serialize()
        var url = "client/leitorQr/model/leitorProdutos.php"

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: url,
            async: true,
            data: dados,
            success: function(dados) {
                if (dados.return == true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'SysAgenda!',
                        text: 'Cadastro efetuado com sucesso!',
                        type: 'success',
                        confirmButtonText: 'Feito!'
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'SysAgenda!',
                        text: dados.return,
                        type: 'error',
                        confirmButtonText: 'Tente novamente...!'
                    })
                }
                $('#form-qrcode input').val("")
            }
        })
    })
})