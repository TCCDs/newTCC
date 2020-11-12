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
        var url = "administration/form/formProdutos/model/validacaoFormProducts.php"

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
                    $('#conteudo').load('administration/form/formProdutos/view/formProducts.html')
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


$(document).ready(function() {
    //Carrega os fornecedores
    $('#btnfornecedores').click(function(e) {
        $('#btnfornecedores').hide();
        $('#mensagem').html('<span class="mensagem">Aguarde, carregando ...</span>');

        $.getJSON('administration/form/formProdutos/model/consulta.php?opcao=fornecedores', function(dados) {
            if (dados.length > 0) {
                var option = '<option>Selecione o Fornecedores </option>';
                $.each(dados, function(i, obj) {
                    option += '<option value="' + obj.ID_FORNECEDORES + '">' + obj.NOME_FANTASIA_FORNECEDORES + '</option>';
                })

                $('#mensagem').html('<span class="mensagem">Total de fornecedoreses encontrados : ' + dados.length + '</span>');
                $('#cmbfornecedores').html(option).show();
            } else {
                Reset();
                $('#mensagem').html('<span class="mensagem">Não foram encontrados fornecedores!</span>');
            }
        })
    })

    //Carrega os marca
    $('#btnmarca').click(function(e) {
        $('#btnmarca').hide();
        $('#mensagem').html('<span class="mensagem">Aguarde, carregando ...</span>');

        $.getJSON('administration/form/formProdutos/model/consulta.php?opcao=marca', function(dados) {
            if (dados.length > 0) {
                var option = '<option>Selecione a Marca </option>';
                $.each(dados, function(i, obj) {
                    option += '<option value="' + obj.ID_MARCA + '">' + obj.NOME_MARCA + '</option>';
                })

                $('#mensagem').html('<span class="mensagem">Total de marcas encontrados.: ' + dados.length + '</span>');
                $('#cmbmarca').html(option).show();
            } else {
                Reset();
                $('#mensagem').html('<span class="mensagem">Não foram encontrados marcas!</span>');
            }
        })
    })


    //Resetar Selects
    function Reset() {
        $('#cmbfornecedores').empty().append('<option>Carregar Fornecedores</option>>');
        $('#cmbmarca').empty().append('<option>Carregar Marcas</option>>');
    }
});