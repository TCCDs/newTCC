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
                    let url = 'customerPanel.html'
                    $(location).attr('href', url)

                } else if (dados.return == 2) {
                    let url = 'administration.html'
                    $(location).attr('href', url)

                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'SysAgenda!',
                        text: dados.return,
                        type: 'error',
                        confirmButtonText: 'Tentar novamente....',
                    })

                    let url = 'index.html'
                    $(location).attr('href', url)

                    $('#formLogin input').val("")
                }
            }
        })
    })
})