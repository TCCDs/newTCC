$(document).ready(function() {
    $('.btn-update').click(function(e) {
        e.preventDefault()

        var dados = $('#edit-cliente').serialize()
        var url = "client/customers/model/updateClientAdministration.php"

        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: url,
            async: true,
            data: dados,
            success: function(dados) {
                if (dados.return == true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'SysAgenda!',
                        text: 'Alteração efetuada com sucesso!',
                        type: 'success',
                        confirmButtonText: 'Feito!'
                    })

                    function atualizar() {
                        $('#conteudo').load('client/customers/view/customerAdministration.html')
                    }

                    setTimeout(atualizar, 2000)

                    $('#modalContato').modal('hide')

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'SysAgenda!',
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