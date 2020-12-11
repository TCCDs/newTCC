$(document).ready(function() {

 /*   $('.registrar').click(function(e) {
        e.preventDefault()

        var dados = $('#register_form').serialize()*/
        var url = "administration/form/formUsuario/model/validacaoFormUser.php"

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: url,
            async: true,
            data: dados,
            success: function(dados) {
                if (dados.return == true) {
                   /* Swal.fire({
                        icon: 'success',
                        title: 'Supermercado Caravelas!',
                        text: 'Cadastro efetuado com sucesso!',
                        type: 'success',
                        confirmButtonText: 'Feito!'
                    })*/
                    $('#conteudo').load('administration/form/formClientes/view/formClient.html')
                }
            }
        })
   // })

});