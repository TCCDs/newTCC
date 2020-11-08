$(document).ready(function() {
    $('.btn-view-adm').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal-footer').empty()

        var url = "administration/adm/model/viewAdmAdministration.php"
        var dados = 'ID_ADMINISTRADOR='
        dados += $(this).attr('id')

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: dados,
            url: url,
            success: function(dados) {
                for (var i = 0; dados.length > i; i++) {
                    let adm = `
                        <p> Sexo: ` + dados[i].SEXO_ADMINISTRADOR + ` </p>
                        <p> Cep: ` + dados[i].CEP_ADMINISTRADOR + ` </p>
                        <p> Estados: ` + dados[i].ESTADO_ADMINISTRADOR + ` </p>
                        <p> Endereco: ` + dados[i].ENDERECO_ADMINISTRADOR + ` </p>
                        <p> Cidade: ` + dados[i].CIDADE_ADMINISTRADOR + ` </p>
                        <p> Bairro: ` + dados[i].BAIRRO_ADMINISTRADOR + ` </p>
                        <p> Complemento: ` + dados[i].COMPLEMENTO_ADMINISTRADOR + ` </p>
                    `

                    $('.modal-title').append(dados[i].NOME_ADMINISTRADOR)
                    $('.modal-body').append(adm)
                }
                $('#modalContato').modal('show')
            }
        })
    })
})