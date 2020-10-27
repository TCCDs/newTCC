$(document).ready(function() {
    $('.receitaCate').empty()

    var url = "client/receitasMVC/receita/model/receitaCategoria.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                receitaCategoria = `
                    <option value=" ` + dados[i].id + `"> ` + dados[i].titulo + `</option>
                `
                $('.receitaCate').append(receitaCategoria)
            }
        } 
    })
})