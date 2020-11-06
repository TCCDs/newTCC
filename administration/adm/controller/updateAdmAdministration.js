$(document).ready(function() {
    $('.btn-update').click(function(e) {
        e.preventDefault()

        var dados = $('#edit-adm').serialize()
        var url = "administration/adm/model/updateAdmAdministration.php"

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
                        title: 'SupermercadoCaravelas!',
                        text: 'Alteração efetuada com sucesso!',
                        type: 'success',
                        confirmButtonText: 'Feito!'
                    })

                    function atualizar() {
                        $('#conteudo').load('administration/adm/view/admAdministration.html')
                    }

                    setTimeout(atualizar, 2000)


                    $('#modalContato').modal('hide')

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'SupermercadoCaravelas!',
                        text: dados.return,
                        type: 'error',
                        confirmButtonText: 'Tente novamente...!'
                    })
                }
                $('#modalContato').modal('hide')
            }
        })
    })
})