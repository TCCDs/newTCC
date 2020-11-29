$(document).ready(function() {
    $('.btn-update').click(function(e) {
        e.preventDefault()

        var dados = $('#edit-cliente').serialize()
        var url = "client/customers/model/updateCustomersAddress.php"

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

                    function atualizar() {
                        $('#conteudo').load('client/customers/view/customers.html')
                    }

                    setTimeout(atualizar, 2000)


                    $('#modalClient').modal('hide')

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'SupermercadoCaravelas!',
                        text: dados.mensagem,
                        type: 'error',
                        confirmButtonText: 'Tente novamente...!'
                    })
                }
                $('#modalClient').modal('hide')
            }
        })
    })
})