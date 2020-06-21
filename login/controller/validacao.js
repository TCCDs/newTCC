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
                if (dados.return == true) {
                    let url = 'customerPanel.html'
                    $(location).attr('href', url)
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Supermercado Caravelas!',
                        text: dados.return,
                        type: 'error',
                        confirmButtonText: 'Tentar novamente....'
                    })
                    $('#formLogin input').val("")
                }
            }
        })
    })
})