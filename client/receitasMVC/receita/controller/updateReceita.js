$(document).ready(function() {
    $('.btn-update').click(function(e) {
        e.preventDefault()

        var dados = $('#edit-receita').serialize()
        var url = "client/receitasMVC/receita/model/adicionar.php"

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
                    $('#conteudo').load('client/receitasMVC/receita/view/receita.html')
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Supermercado Caravelas!',
                        text: dados.return,
                        type: 'error',
                        confirmButtonText: 'Tente novamente...!'
                    })
                }
                $('#edit-receitainput').val("")
            }
        })
    })

});