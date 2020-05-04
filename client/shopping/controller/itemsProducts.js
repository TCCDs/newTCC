$(document).ready(function() {

    var url = "client/shopping/model/itemsProducts.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            let qtdProdutos = `
                    <span class="badge"> ` + dados + ` </span>
                `
            $('.badge').append(qtdProdutos)
        }
    })
})