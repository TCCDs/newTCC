$(document).ready(function() {
    $('.btn-view-produtos').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal-footer').empty()

        var url = "administration/products/model/viewProductsAdministration.php"
        var dados = 'ID_PRODUTOS='
        dados += $(this).attr('id')

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: dados,
            url: url,
            success: function(dados) {
                for (var i = 0; dados.length > i; i++) {
                    let produtos = `
                        <p> Estoque: ` + dados[i].ESTOQUE_PRODUTOS + ` </p>
                        <p> Corredor: ` + dados[i].CORREDOR_PRODUTOS + ` </p>
                        <p> Pratilheira: ` + dados[i].PRATILEIRA_PRODUTOS + ` </p>
                        <p> Lote: ` + dados[i].LOTE_PRODUTOS + ` </p>
                        <p> Descrição: ` + dados[i].DESCRICAO_PRODUTOS + ` </p>
                        <p> Peso: ` + dados[i].PESO_PRODUTOS + ` </p>
                    `

                    $('.modal-title').append(dados[i].NOME_PRODUTOS)
                    $('.modal-body').append(produtos)
                }
                $('#modalContato').modal('show')
            }
        })
    })
})