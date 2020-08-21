$(document).ready(function() {
    $('.historico-compra').click(function() {
        $('#conteudo').load('administration/historical/view/historicalPurchasesAdministration.html')
    })

    $('.historico-credito').click(function() {
        $('#conteudo').load('administration/historical/view/historicalCreditsAdministration.html')
    })
})