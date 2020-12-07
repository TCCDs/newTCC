$(document).ready(function() {    
    $('.btn-detalhes').click(function(e){
    e.preventDefault()

    $('.modal-title').empty()
    $('.modal-body').empty()
    $('.modal.footer').empty()
   //$('.listaProdutos').empty()

    var url = "client/historical/purchases/model/detalhesComprasProdutos.php"
    var dados = "CODIGO_ITENS="
    dados += $(this).attr('id')

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let detalhesComprasProdutos = `
                <div class="row">
                    <div class="mt-3 mr-2 col-12 col-md-2">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title text-dark"><div class="row mt-2">` + dados[i].NOME_PRODUTOS + `</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Quantidade<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].QUANTIDADE_PRODUTOS + `</div></div></li>
                                    <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Preço<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].PRECO_PRODUTOS + `</div></div></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                `

                $('.modal-title').append(dados[i].NOME_PRODUTOS)
                $('.modal-body').append(detalhesComprasProdutos)
                //$('.listaProdutos').append(detalhesComprasProdutos)
            }
            $('#modalContato').modal('show')
        }
    })
})
})