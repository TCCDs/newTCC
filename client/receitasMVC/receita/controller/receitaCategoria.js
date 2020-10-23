$(document).ready(function() {
    $('.receitaCate').empty()

    var url = "client/receitasMVC/receita/model/receitaCate.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let receitaCategoria = `
                    <div class="col-md-8">
                        <select name="slCategoria" id="slCategoria" class="form-control">
                            <option value=" ` + dados[i].id + `"  ` + dados[i].id + ` == categoriaId ? 'selected' : ''}}> ` + dados[i].titulo + `</option>
                        </select>
                    </div>
                `
                $('.receitaCate').append(receitaCategoria)
            }
        }
    })
})