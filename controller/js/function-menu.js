$(document).ready(function() {
    $('.produtos-cliente').click(function() {
        $('#conteudo').load('client/products/view/administrationProducts.html')
    })

    $('.ctr-cliente').click(function() {
        $('#conteudo').load('client/customers/view/customerAdministration.html')
    })

    $('.credito-cliente').click(function() {
        $('#conteudo').load('client/credits/view/customerCredits.html')
    })

    $('.qrcode-cliente').click(function() {
        $('#conteudo').load('client/qrcode/view/qrcode-cliente.html')
    })

    $('.comprarProduto-cliente').click(function() {
        $('#conteudo').load('client/shopping/view/shopping.html')
    })

    $('.historico-cliente').click(function() {
        $('#conteudo').load('client/historical/view/administrationHistory.html')
    })

    $('.dados-usuario').click(function() {
        $('#conteudo').load('login/view/edit-usuario.html')
    })

    $('.inscreva').click(function() {
        $('#conteudo').load('login/view/cadCliente.html')

    })
    $('.login').click(function() {
        $('body').load('index.html')
    })
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