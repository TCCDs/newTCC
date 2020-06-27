$(function() {
    var atual_fs, next_fs, prev_fs;
    var formulario = $('form[name=formulario]');

    function next(elem) {
        atual_fs = $(elem).parent();
        next_fs = $(elem).parent().next();

        $('#progress li').eq($('fieldset').index(next_fs)).addClass('ativo');

        atual_fs.hide(800);
        next_fs.show(800);
    }
    $('.prev').click(function() {
        atual_fs = $(this).parent();
        prev_fs = $(this).parent().prev();

        $('#progress li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        atual_fs.hide(800);
        prev_fs.show(800);
    });

    $('input[name=next1]').click(function() {
        var array = formulario.serializeArray();
        if (array[0].value == '' || array[1].value == '' || array[2].value == '' || array[3].value == '') {

            Swal.fire({
                icon: 'error',
                title: 'Supermercado Caravelas!',
                text: 'Preencha todos os campos da etapa 1!',
                type: 'error',
                confirmButtonText: 'Feito!'
            })
        } else {
            Swal.fire({
                icon: 'success',
                title: 'Supermercado Caravelas!',
                text: '1 primeira etapa cadastrada com sucesso!',
                type: 'success',
                confirmButtonText: 'Feito!'
            })
            next($(this));
        }
    });

    $('input[name=next2]').click(function() {
        var array = formulario.serializeArray();
        if (array[4].value == '' || array[5].value == '' || array[6].value == '' || array[7].value == '' || array[8].value == '') {

            Swal.fire({
                icon: 'error',
                title: 'Supermercado Caravelas!',
                text: 'Preencha todos os campos da etapa 2!',
                type: 'error',
                confirmButtonText: 'Feito!'
            })
        } else {
            Swal.fire({
                icon: 'success',
                title: 'Supermercado Caravelas!',
                text: '2 primeira etapa cadastrada com sucesso!',
                type: 'success',
                confirmButtonText: 'Feito!'
            })
            next($(this));
        }
    });

    $('input[name-btn-add]').click(function(evento) {
        var array = formulario.serializeArray();
        if (array[9].value == '' || array[10].value == '' || array[11].value == '') {


            Swal.fire({
                icon: 'error',
                title: 'Supermercado Caravelas!',
                text: 'Preencha todos os campos da etapa 3!',
                type: 'error',
                confirmButtonText: 'Feito!'
            })
        } else {
            var dados = $('#formulario').serialize()
            var url = "add-produto.php"

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
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Supermercado Caravelas!',
                            text: dados.return,
                            type: 'error',
                            confirmButtonText: 'Tente novamente...!'
                        })
                    }
                    $('#formulario input').val("")
                }
            })
        }
        evento.preventDefault();
    });
});