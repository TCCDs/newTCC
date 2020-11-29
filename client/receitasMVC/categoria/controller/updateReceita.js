$(document).ready(function() {
    $('.btn-update').click(function(e) {
        e.preventDefault()

        var dados = $('#edit-categoria').serialize()
        var url = "client/receitasMVC/categoria/model/editar.php"

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
                        title: 'Supermercado Caravelas!',
                        text: 'Alteração efetuada com sucesso!',
                        type: 'success',
                        confirmButtonText: 'Feito!'
                    })

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'SupermercadoCaravelas!',
                        text: dados.mensagem,
                        type: 'error',
                        confirmButtonText: 'Tente novamente...!'
                    })
                }
                $('#modal-categoria').modal('hide')
            }
        })
    })
})