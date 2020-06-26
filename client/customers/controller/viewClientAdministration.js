$(document).ready(function() {
    $('.btn-view-clientes').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal.footer').empty()

        var url = "client/customers/model/viewClientAdministration.php"
        var dados = 'ID_CLIENTES='
        dados += $(this).attr('id')

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: dados,
            url: url,
            success: function(dados) {
                for (var i = 0; dados.length > i; i++) {
                    let clientes = `
                        <p> Sexo: ` + dados[i].SEXO_CLIENTES + ` </p>
                        <p> Cep: ` + dados[i].CEP_CLIENTES + ` </p>
                        <p> Estados: ` + dados[i].ESTADO_CLIENTES + ` </p>
                        <p> Endereco: ` + dados[i].ENDERECO_CLIENTES + ` </p>
                        <p> Cidade: ` + dados[i].CIDADE_CLIENTES + ` </p>
                        <p> Bairro: ` + dados[i].BAIRRO_CLIENTES + ` </p>
                        <p> Complemento: ` + dados[i].COMPLEMENTO_CLIENTES + ` </p>
                    `

                    $('.modal-title').append(dados[i].NOME_CLIENTES)
                    $('.modal-body').append(clientes)
                }
                $('#modalContato').modal('show')
            }
        })
    })
})