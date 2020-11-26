$(document).ready(function() {
    $('.ultimaVendas').empty()

    var url = "administration/dadosPanelAdministration/model/ultimaVenda.php"

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
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let dataAtual2 = new Date(dados[i].datas_vendas);
                let dataAtualFormatada2 = (adicionaZero(dataAtual2.getDate().toString()) + "/" + (adicionaZero(dataAtual2.getMonth() + 1).toString()) + "/" + dataAtual2.getFullYear() + " " + (adicionaZero(dataAtual2.getHours()).toString()) + ":" + (adicionaZero(dataAtual2.getMinutes()).toString()) + ":" + dataAtual2.getSeconds());

                let ultimaVendas = `
                    <small class="ultimaVendas">` + dataAtualFormatada2 + `</small>
                `
                $('.ultimaVendas').append(ultimaVendas)
            }
        }
    })
})