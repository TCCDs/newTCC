$(document).ready(function() {
    $('.btn-login').click(function(login) {
        login.preventDefault()

        var dados = $('#form-login').serialize()
        var url = 'login/model/validacao.php'

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: url,
            async: true,
            data: dados,
            success: function(dados) {

                if (dados.return == 1) {
                    let url = 'customerPanel.php'
                    $(location).attr('href', url)

                } else if (dados.return == 2) {
                    let url = 'administration.php'
                    $(location).attr('href', url)

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Supermercado Caravelas!',
                        text: dados.return,
                        type: 'error',
                        confirmButtonText: 'Tentar novamente....',
                    })

                    let url = 'index.php'
                    $(location).attr('href', url)

                    $('#form-login input').val("")
                }
            }
        })
    })
})