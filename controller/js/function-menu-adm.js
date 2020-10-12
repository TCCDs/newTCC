$(document).ready(function() {
    $('.produtos-adm').click(function() {
        $('#conteudo').load('administration/products/view/administrationProducts.html')
    })

    $('.ctr-adm').click(function() {
        $('#conteudo').load('administration/customers/view/customerAdministration.html')
    })

    $('.historico-adm').click(function() {
        $('#conteudo').load('administration/historical/view/administrationHistory.html')
    })
    $('.fornecedor-adm').click(function() {
        $('#conteudo').load('administration/form/formFornecedores/view/formProviders.html ')
    })

    $('.marca-adm').click(function() {
        $('#conteudo').load('administration/form/formMarca/view/formBrands.html')
    })

    // formularios
    $('.formUser-administration').click(function() {
        $('#conteudo').load('administration/form/formUsuario/view/formUsers.html')
    })

    $('.formProducts-administration').click(function() {
        $('#conteudo').load('administration/form/formProdutos/view/formProducts.html')
    })

    $('.formBrands-administration').click(function() {
        $('#conteudo').load('administration/form/formMarca/view/formBrands.html')
    })

    $('.formProviders-administration').click(function() {
        $('#conteudo').load('administration/form/formFornecedores/view/formProviders.html')
    })

    $('.formClient-administration').click(function() {
        $('#conteudo').load('administration/form/formClientes/view/formClient.html')
    })

    $('.verificarCompra-adm').click(function() {
        $('#conteudo').load('administration/purchaseCheck/view/verificarCompra.html')
    })


    $('.receitas').click(function() {
        $('#conteudo').load('administration/receitas/public/index.php')
    })

    $(".sidebar-dropdown > a").click(function() {
        $(".sidebar-submenu").slideUp(200);
        if (
            $(this)
            .parent()
            .hasClass("active")
        ) {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .parent()
                .removeClass("active");
        } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .next(".sidebar-submenu")
                .slideDown(200);
            $(this)
                .parent()
                .addClass("active");
        }
    });

    $("#close-sidebar").click(function() {
        $(".page-wrapper").removeClass("toggled");
    });
    $("#show-sidebar").click(function() {
        $(".page-wrapper").addClass("toggled");
    });

    var atual_fs, next_fs, prev_fs;
    var register_form = $('form[name=register_form]');

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


})