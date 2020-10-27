$(document).ready(function() {
    $('tbody').empty()

    var url = "client/receitasMVC/categoria/model/categoriaPrincipal.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let categoria = `
                    <tr>
                        <td> ` + dados[i].id + `</td>
                        <td> ` + dados[i].titulo + `</td>
                        <td> ` + dados[i].slug + `</td>
                        <td>
                            <button id="` + dados[i].id + `" class="btn btn-warning btn-categoriaEditar"> 
                                Editar
                            </button>
                        </td>
                    </tr>
                `
                $('tbody').append(categoria)
            }
            //$('body').append('<script src="site/categoria/controller/editar_categoria.js"></script>')
        }
    })
})