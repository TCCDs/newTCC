$(document).ready(function() {
    $('.btn').click(function(e){
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal.footer').empty()

    //$('.listaDadosCompras').empty()

    var url = "client/historical/purchases/model/viewComprasDados.php"
    //let idCodigo = `CODIGO_COMPRAS=${$(this).attr('id')}`
    var dados = "CODIGO_COMPRAS="
    dados += $(this).attr('id')

    function adicionaZero(numero) {
        if (numero <= 9)
            return "0" + numero;
        else
            return numero;
    }


    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        //data: idCodigo,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let dataAtual2 = new Date(dados[i].DATA_CAD_COMPRAS);
                let dataAtualFormatada2 = (adicionaZero(dataAtual2.getDate().toString()) + "/" + (adicionaZero(dataAtual2.getMonth() + 1).toString()) + "/" + dataAtual2.getFullYear());

                var totalCompras = dados[i].VALOR_COMPRAS
                var resultValorCompras= Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(totalCompras);

                let viewDetalhesDadosCompras = `
                    <p> Nome do Produto: ` + dados[i].NOME_PRODUTOS + ` </p>
                    <p> Valor da compra: ` + resultValorCompras + ` </p>
                    <p> Data de Cadastro: ` + dataAtualFormatada2 + ` </p>
                    <p> Status da compra: ` + dados[i].STATUS_COMPRAS + ` </p>
                `

                $('.modal-title').append(dados[i].CODIGO_COMPRAS)
                $('.modal-body').append(viewDetalhesDadosCompras)
               // $('.listaDadosCompras').append(detalhesDadosCompras)
            }
            $('#modalContato').modal('show')
        }
    })
})
})

/*
    <div class="row">
        <div class="mt-3 ml-2 mr-2 col-12 col-sm-6 col-md-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-dark">Dados da compra</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Código da compra<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].CODIGO_COMPRAS + `</div></div></li>
                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Nome do Produto<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].NOME_PRODUTOS + `</div></div></li>
                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Valor da compra<span/></div><div class="col-12 col-md-12 mt-2">` + resultValorCompras + `</div></div></li>
                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Data de Cadastro<span/></div><div class="col-12 col-md-12 mt-2">` + dataAtualFormatada2 + `</div></div></li>
                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Status da compra<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].STATUS_COMPRAS + `</div></div></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
*/