$(document).ready(function() {

    $('.registrar').click(function(e) {
        e.preventDefault()

        var dados = $('#register_form').serialize()
        var url = "administration/form/formMarca/model/formBrands.php"

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
                        text: 'Cadastro efetuado com sucesso!',
                        type: 'success',
                        confirmButtonText: 'Feito!'
                    })
                    $('#conteudo').load('administration/form/formMarca/view/formBrands.html')
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Supermercado Caravelas!',
                        text: dados.return,
                        type: 'error',
                        confirmButtonText: 'Tente novamente...!'
                    })
                }
                // $('#register_form input').val("")
            }
        })
    })

});