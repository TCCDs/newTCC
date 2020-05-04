$(document).ready(function() {
    $('.btn-buscar').click(function(e) {
        e.preventDefault()

        $('tbody').empty()

        var dados = $('#QR-buscar').serialize()
        var url = "client/shopping/model/ler.php"

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: url,
            async: true,
            data: dados,
            success: function(dados) {
                $('#QR-buscar').val("")
                $('body').append('<script src="cliente/comprar/controller/controler.js"></script>')
            }
        });
    });
});