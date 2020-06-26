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
        $('#conteudo').load('administration/providers/view/fornecedor-adm.html')
    })

    $('.marca-adm').click(function() {
        $('#conteudo').load('administration/brands/view/marca-adm.html')
    })

    $('.verificarCompra-adm').click(function() {
        $('#conteudo').load('administration/purchaseCheck/view/verificarCompra.html')
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





})