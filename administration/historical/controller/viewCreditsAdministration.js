$(document).ready(function() {
    $('.btn-view-credito').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal.footer').empty()

        var url = "administration/historical/model/viewCreditsAdministration.php"
        var dados = 'ID_MOEDAS='
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
            data: dados,
            url: url,
            success: function(dados) {
                for (var i = 0; dados.length > i; i++) {
                    let dataAtual2 = new Date(dados[i].DATA_CAD_MOEDAS);
                    let dataAtualFormatada2 = (adicionaZero(dataAtual2.getDate().toString()) + "/" + (adicionaZero(dataAtual2.getMonth() + 1).toString()) + "/" + dataAtual2.getFullYear() + " " + (adicionaZero(dataAtual2.getHours()).toString()) + ":" + (adicionaZero(dataAtual2.getMinutes()).toString()) + ":" + dataAtual2.getSeconds());

                    let moedas = `
                        <p> Data: ` + dataAtualFormatada2 + ` </p>
                    `

                    $('.modal-title').append(dados[i].NOME_CLIENTES)
                    $('.modal-body').append(moedas)
                }
                $('#modalContato').modal('show')
            }
        })
    })
})