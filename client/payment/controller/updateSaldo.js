$(document).ready(function() {
    $('.btnUpdateSaldo').click(function(e) {
        e.preventDefault()

        //var dados = $('#edit-cliente').serialize()
        var url = "client/payment/model/descontaSaldo.php"

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
                        text: 'Alteração efetuada com sucesso!',
                        type: 'success',
                        confirmButtonText: 'Feito!'
                    })

                    function atualizar() {
                        $('#conteudo').load('client/payment/view/payment-coin.html')
                    }

                    setTimeout(atualizar, 2000)


                    $('#modalClient').modal('hide')

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'SysAgenda!',
                        text: dados.return,
                        type: 'error',
                        confirmButtonText: 'Tente novamente...!'
                    })
                }
                $('#modalClient').modal('hide')
            }
        })
    })
})