$(document).ready(function() {
    $('#receitaDescricao').empty()

    var url = "client/receitasMVC/receita/model/receitaViewDescricao.php"
    var dados = 'id=' 
    dados += $(this).attr('id')

    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: dados,
        url: url,
        success: function(dados) {
            $('#receitaDescricao').html(dados.descricao)
        }
    })

})