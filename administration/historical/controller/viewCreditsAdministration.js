$(document).ready(function() {
    $('.btn-view-credito').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal.footer').empty()

        var url = "administration/historical/model/viewCreditsAdministration.php"
        var dados = 'ID_MOEDAS='
        dados += $(this).attr('id')

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: dados,
            url: url,
            success: function(dados) {
                for (var i = 0; dados.length > i; i++) {
                    let moedas = `
                        <p> Data: ` + dados[i].DATA_CAD_MOEDAS + ` </p>
                    `

                    $('.modal-title').append(dados[i].NOME_CLIENTES)
                    $('.modal-body').append(moedas)
                }
                $('#modalContato').modal('show')
            }
        })
    })
})