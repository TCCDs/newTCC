$(document).ready(function() {
    $('.nav-receita').hide();

    $('.produtos-cliente').click(function() {
        $('#conteudo').load('client/products/view/customersProducts.html')
        $('.saldo').hide();
        $('.menu').hide();
        $('.nav-receita').hide();

    })

    $('.ctr-cliente').click(function() {
        $('#conteudo').load('client/customers/view/customers.html')
        $('.saldo').hide();
        $('.menu').hide();
        $('.nav-receita').hide();

    })

    $('.consumo').click(function() {
        $('#conteudo').load('client/customers/view/consumo.html')
        $('.saldo').hide();
        $('.menu').hide();
        $('.nav-receita').hide();

    })

    $('.home').click(function() {
        $('body').load('customerPanel.php')
    })

    $('.credito-cliente').click(function() {
        $('#conteudo').load('client/credits/view/creditsCustomers.html')
        $('.saldo').hide();
        $('.menu').hide();
        $('.nav-receita').hide();

    })

    $('.comprarProduto-cliente').click(function() {
        $('#conteudo').load('client/shopping/view/shopping.html')
        $('.saldo').hide();
        $('.menu').hide();
        $('.nav-receita').hide();

    })


    $('.payment-coin').click(function() {
        $('#conteudo').load('client/payment/view/payment-coin.html')
        $('.saldo').hide();
        // $('.menu').hide();
        $('.nav-receita').hide();

    })

    $('.leitorQrProdutos').click(function() {
        $('#conteudo').load('client/leitorQr/view/leitorProdutos.html')
        $('.saldo').hide();
        $('.menu').hide();
        $('.nav-receita').hide();

    })

    $('.testeLeitor').click(function() {
        $('#conteudo').load('client/leitorQr/view/testeLeitor.html')
        $('.saldo').hide();
        $('.menu').hide();
        $('.nav-receita').hide();

    })

    $('.leitorOfertas').click(function() {
        $('#conteudo').load('client/leitorQr/view/leitorOfertas.html')
        $('.saldo').hide();
        // $('.menu').hide();
        $('.nav-receita').hide();

    })

    $('.grafico').click(function() {
        $('#conteudo').load('graficos/graficoMoedas.php')
        $('.saldo').hide();
        // $('.menu').hide();
        $('.nav-receita').hide();

    })

    $('.credito-pagamento').click(function() {
        $('#conteudo').load('client/shopping/model/order_process.php')
        $('.saldo').hide();
        // $('.menu').hide();
        $('.nav-receita').hide();

    })


    $('.historico-cliente').click(function() {
        $('#conteudo').load('client/historical/view/customersHistory.html')
        $('.saldo').hide();
        $('.menu').hide();
        $('.nav-receita').hide();

    })

    $('.dados-usuario').click(function() {
        $('#conteudo').load('login/view/edit-usuario.html');
        $('.saldo').hide();
        $('.menu').hide();
        $('.nav-receita').hide();


    })

    $('.receitas').click(function() {
        $('#conteudo').load('client/receitas/index.php')
        $('.saldo').hide();
        $('.menu').hide();
        $('.nav-receita').hide();

    })

    $('.receitasMVC').click(function() {
        $('#conteudo').load('client/receitasMVC/partials/view/index.html')
        $('.saldo').hide();
        $('.menu').hide();
        $('.bg-menu').hide();
        $('.nav-receita').show();



    })

    $('.offer').click(function() {
        $('#conteudo').load('administration/offer/view/ofertas.html')
        $('.saldo').hide();
        $('.menu').hide();
        $('.nav-receita').hide();

    })

    /*cupom */
    $('.tax').click(function() {
        $('#conteudo').load('client/payment/view/tax.html')
        $('.saldo').hide();
        $('.menu').hide();
        $('.nav-receita').hide();

    })

    $('.inscreva').click(function() {
        $('#conteudo').load('administration/form/formUsuario/view/formUsers.html')
    })

    $('.recuperar').click(function() {
        $('#conteudo').load('recuperar/index.php')
    })

    $('.login').click(function() {
        $('body').load('index.php')
    })

    $('.logout').click(function() {
        window.location.href = "index.php";

    })

    $("#sidebar").hide();

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
        $("#sidebar").show();
    });

});

$('#show_password').hover(function(e) {
    e.preventDefault();
    if ($('#SENHA_USUARIOS').attr('type') == 'password') {
        $('#SENHA_USUARIOS').attr('type', 'text');
        $('#show_password').attr('class', 'mdi mdi-eye');
    } else {
        $('#SENHA_USUARIOS').attr('type', 'password');
        $('#show_password').attr('class', 'mdi mdi-eye-off');
    }
});