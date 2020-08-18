$(document).ready(function() {
    $('.produtos-cliente').click(function() {
        $('#conteudo').load('client/products/view/customersProducts.html')
        $('.saldo').hide();
        $('.menu').hide();
    })

    $('.ctr-cliente').click(function() {
        $('#conteudo').load('client/customers/view/customers.html')
        $('.saldo').hide();
        $('.menu').hide();

    })

    $('.home').click(function() {
        $('body').load('customerPanel.html')
    })

    $('.credito-cliente').click(function() {
        $('#conteudo').load('client/credits/view/creditsCustomers.html')
        $('.saldo').hide();
        $('.menu').hide();
    })

    $('.qrcode-cliente').click(function() {
        $('#conteudo').load('client/qrcode/view/qrcode-cliente.html')
        $('.saldo').hide();
        $('.menu').hide();
    })
    $('.comprarProduto-cliente').click(function() {
        $('#conteudo').load('client/payment/view/payment-select.html')
        $('.saldo').hide();
        $('.menu').hide();
    })

    $('.moeda').click(function() {
        $('#conteudo').load('client/shopping/view/shopping.html')
        $('.saldo').hide();
        $('.menu').hide();
    })

    /*$('.comprarProduto-cliente').click(function() {
        $('#conteudo').load('client/shopping/view/order_process.html')
        $('.saldo').hide();
        $('.menu').hide();
    })*/

    $('.historico-cliente').click(function() {
        $('#conteudo').load('client/historical/view/customersHistory.html')
        $('.saldo').hide();
        $('.menu').hide();
    })

    $('.dados-usuario').click(function() {
        $('#conteudo').load('login/view/edit-usuario.html');
        $('.saldo').hide();
        $('.menu').hide();

    })

    $('.inscreva').click(function() {
        $('#conteudo').load('client/customers/view/cad-user.html')

    })
    $('.login').click(function() {
        $('body').load('index.html')
    })

    $('.logout').click(function() {
        window.location.href = "index.html";

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