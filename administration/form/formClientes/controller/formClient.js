$(document).ready(function() {
    var atual_fs, next_fs, prev_fs;

    $('.next').click(function() {
        atual_fs = $(this).parent();
        next_fs = $(this).parent().next();

        $('#progress li').eq($('#formCad').index(next_fs)).addClass('ativo');

        atual_fs.hide(800);
        next_fs.show(800);
    });
    $('.prev').click(function() {
        atual_fs = $(this).parent();
        prev_fs = $(this).parent().prev();

        $('#progress li').eq($('#formCad').index(atual_fs)).removeClass('ativo');

        atual_fs.hide(800);
        prev_fs.show(800);
    });

    $('.registrar').click(function(e) {
        e.preventDefault()

        var dados = $('#register_form').serialize()
        var url = "administration/form/formClientes/model/validacaoFormClient.php"

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
                   // $('#conteudo').load('administration/form/formClientes/view/formClient.html')
                   $('#conteudo').load('administration/form/credito/model/addCredito.php')
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Supermercado Caravelas!',
                        text: dados.mensagem,
                        type: 'error',
                        confirmButtonText: 'Tente novamente...!'
                    })
                }
                // $('#register_form input').val("")
            }
        })
    })

});