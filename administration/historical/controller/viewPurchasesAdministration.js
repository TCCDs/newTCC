$(document).ready(function() {
    $('.btn-view-credito').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal.footer').empty()

        var url = "administration/historical/model/viewPurchasesAdministration.php"
        var dados = 'ID_COMPRAS='
        dados += $(this).attr('id')

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: dados,
            url: url,
            success: function(dados) {
                for (var i = 0; dados.length > i; i++) {
                    var totalDesconto = dados[i].TOTAL_DESCONTO_COMPRAS
                    var resultValorMoedas = Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(totalDesconto);
                    

                    let historicoCompras = `
                        <p> Total Desconto: ` + resultValorMoedas + ` </p>
                        <p> Total Itens: ` + dados[i].TOTAL_ITENS_COMPRAS + ` </p>
                        <p> Status: ` + dados[i].STATUS_COMPRAS + ` </p>
                    `

                    $('.modal-title').append(dados[i].NOME_CLIENTES)
                    $('.modal-body').append(historicoCompras)
                }
                $('#modalContato').modal('show')
            }
        })
    })
})