$(document).ready(function() {
    $('.finalizar').click(function(e) {
        e.preventDefault()

        var dados = $('#PayClient').serialize()
        var url = "client/payment/model/descontaSaldo.php"

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: url,
            async: true,
            data: dados,
            success: function(dados) {
                if (dados.return == true) {
                    let timerInterval
                    Swal.fire({
                        title: 'Supermercado Caravelas!',
                        html: 'Realizando pagamento em <b></b> milisegundos.',
                        timer: 2000,
                        timerProgressBar: true,
                        willOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                                const content = Swal.getContent()
                                if (content) {
                                    const b = content.querySelector('b')
                                    if (b) {
                                        b.textContent = Swal.getTimerLeft()
                                    }
                                }
                            }, 100)
                        },
                        onClose: () => {
                            clearInterval(timerInterval)
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            $('#conteudo').load('client/payment/view/tax.html')
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Supermercado Caravelas!',
                        text: dados.return,
                        type: 'error',
                        confirmButtonText: 'Tente novamente...!'
                    })
                }
                // $('#add-contato input').val("")
            }
        })
    })
})