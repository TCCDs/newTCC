$(document).ready(function() {
    $('.conteudo').empty()

    var url = "client/receitasMVC/home/model/home.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let receitaHome = `
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <div class="card-header card-receita"> ` + dados[i].titulo + `</div>
                            <div class="card-body">
                                <a href="client/receitasMVC/receita/view/ver.html ` + dados[i].slug + `">
                                    <img src=" ` + dados[i].thumb + `" alt=" ` + dados[i].titulo + `" class="w-100 img-thumb" />
                                </a>
                                <a href="client/receitasMVC/receita/view/ver.html ` + dados[i].slug + `" class="btn btn-receita w-100 mt-2">Acessar</a>
                            </div>
                        </div>
                    </div>
                `
                $('.conteudo').append(receitaHome)
            }
        }
    })
})