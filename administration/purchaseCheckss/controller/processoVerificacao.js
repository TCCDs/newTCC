$(document).ready(function() {
    $('.btn-adicionar').click(function(e) {
        e.preventDefault()

        var dados = $('#add-credito').serialize()
        var url = "administration/purchaseCheck/model/processoVerificacao.php"

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: url,
            async: true,
            data: dados,
            success: function(dados) {
                $('#conteudo').load('administration/purchaseCheck/view/detalhesCompras.html')

                $('#add-credito input').val("")
            }
        })
    })
})