$(document).ready(function() {
    $('.btn-update').click(function(e) {
        e.preventDefault()

        var dados = $('#edit-cliente').serialize()
        var url = "administration/customers/model/updateClientAdministration.php"

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
                        $('#conteudo').load('administration/customers/view/customerAdministration.html')
                    }

                    setTimeout(atualizar, 2000)


                    $('#modalContato').modal('hide')

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'SupermercadoCaravelas!',
                        text: dados.mensagem,
                        type: 'error',
                        confirmButtonText: 'Tente novamente...!'
                    })
                }
                $('#modalContato').modal('hide')
            }
        })
    })
})