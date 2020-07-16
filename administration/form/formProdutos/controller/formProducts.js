$(document).ready(function() {
    $('#btn_login_details').click(function() {
        $('#list_login_details').removeClass('active active_tab1');
        $('#list_login_details').removeAttr('href data-toggle');
        $('#login_details').removeClass('active');
        $('#list_login_details').addClass('inactive_tab1');
        $('#list_personal_details').removeClass('inactive_tab1');
        $('#list_personal_details').addClass('active_tab1 active');
        $('#list_personal_details').attr('href', '#personal_details');
        $('#list_personal_details').attr('data-toggle', 'tab');
        $('#personal_details').addClass('active in');
    });

    $('#previous_btn_personal_details').click(function() {
        $('#list_personal_details').removeClass('active active_tab1');
        $('#list_personal_details').removeAttr('href data-toggle');
        $('#personal_details').removeClass('active in');
        $('#list_personal_details').addClass('inactive_tab1');
        $('#list_login_details').removeClass('inactive_tab1');
        $('#list_login_details').addClass('active_tab1 active');
        $('#list_login_details').attr('href', '#login_details');
        $('#list_login_details').attr('data-toggle', 'tab');
        $('#login_details').addClass('active in');
    });

    $('#btn_personal_details').click(function() {
        $('#list_personal_details').removeClass('active active_tab1');
        $('#list_personal_details').removeAttr('href data-toggle');
        $('#personal_details').removeClass('active');
        $('#list_personal_details').addClass('inactive_tab1');
        $('#list_contact_details').removeClass('inactive_tab1');
        $('#list_contact_details').addClass('active_tab1 active');
        $('#list_contact_details').attr('href', '#contact_details');
        $('#list_contact_details').attr('data-toggle', 'tab');
        $('#contact_details').addClass('active in');
    });

    $('#previous_btn_contact_details').click(function() {
        $('#list_contact_details').removeClass('active active_tab1');
        $('#list_contact_details').removeAttr('href data-toggle');
        $('#contact_details').removeClass('active in');
        $('#list_contact_details').addClass('inactive_tab1');
        $('#list_personal_details').removeClass('inactive_tab1');
        $('#list_personal_details').addClass('active_tab1 active');
        $('#list_personal_details').attr('href', '#personal_details');
        $('#list_personal_details').attr('data-toggle', 'tab');
        $('#personal_details').addClass('active in');
    });

    $('#btn_contact_details').click(function() {
        $('#btn_contact_details').attr("disabled", "disabled");
        $(document).css('cursor', 'prgress');
        $("#register_form").submit();
    });
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

                $('#mensagem').html('<span class="mensagem">Total de fornecedoreses encontrados.: ' + dados.length + '</span>');
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