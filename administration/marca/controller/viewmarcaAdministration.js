$(document).ready(function() {
    $('.btn-view-marcas').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal.footer').empty()

        var url = "administration/marca/model/viewmarcaAdministration.php"
        var dados = 'ID_MARCA='
        dados += $(this).attr('id')

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: dados,
            url: url,
            success: function(dados) {
                for (var i = 0; dados.length > i; i++) {
                    let marcas = `
                        <p> Estoque: ` + dados[i].CODIGO_MARCA + ` </p>
                    `

                    $('.modal-title').append(dados[i].NOME_MARCA)
                    $('.modal-body').append(marcas)
                }
                $('#modalContato').modal('show')
            }
        })
    })
})