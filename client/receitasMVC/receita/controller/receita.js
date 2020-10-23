/*$(document).ready(function() {
    $('tbody').empty()

    var url = "client/receitasMVC/receita/model/receita.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let receita = `
                    <tr>
                        <td> ` + dados[i].id + `</td>
                        <td> ` + dados[i].titulo + `</td>
                        <td> ` + dados[i].slug + `</td>
                        <td> ` + dados[i].cattitulo + `</td>
                        <td> ` + dados[i].data|date('d/m/Y H:i:s') + `</td>
                        <td>
                            <a href="{{BASE}}receita/editar/` + dados[i].id + `" class="btn btn-warning">Editar</a>
                            <a href="{{BASE}}receita/ver/` + dados[i].slug + `" class="btn btn-info ml-2">Ver</a>
                        </td>
                    </tr>
                `
                $('tbody').append(receita)
            }
        }
    })
})*/


$(document).ready(function() {
    $('.receitasPrincipal').empty()

    var url = "client/receitasMVC/receita/model/receita.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let receitaPrincipal = `
                <div class="row ml-2">
                    <div class="mt-3 mr-2 col-12 col-md-2">
                        <div class="card" style="width: 18rem;  height: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title text-dark">` + dados[i].titulo + `</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-right">
                                        <div class="row">
                                            <small class="text-left">slug</small>
                                        </div>

                                        <h5> ` + dados[i].id + ` </h5>
                                    </li>

                                    <li class="list-group-item text-right">
                                        <div class="row">
                                            <small class="text-left">slug</small>
                                        </div>

                                        <h5> ` + dados[i].slug + ` </h5>
                                    </li>

                                    <li class="list-group-item text-right">
                                        <div class="row">
                                            <small class="text-left">Categoria Receita</small>
                                        </div>

                                        <h5>` + dados[i].cattitulo + `</h5>
                                    </li>

                                    <li class="list-group-item text-right">
                                        <div class="row">
                                            <small class="text-left">Publicação</small>
                                        </div>

                                        <h5> ` + dados[i].data|date('d/m/Y H:i:s') + `</h5>
                                    </li>

                                    <li class="list-group-item">
                                        <button id="` + dados[i].id + `" class="btn btn-warning btn-receitaEditar"> 
                                            Editar
                                        </button>

                                        <button id="` + dados[i].slug + `" class="btn btn-info ml-2 btn-receitaView"> 
                                            Ver
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                `
                $('.receitasPrincipal').append(receitaPrincipal)
            }

            $('body').append('<script src="client/receitasMVC/receita/controller/receitaEditar.js"></script>')
            $('body').append('<script src="client/receitasMVC/receita/controller/receitaView.js"></script>')
        }
    })
})