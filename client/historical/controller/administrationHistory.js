$(document).ready(function() {
    $('.historico-compra').click(function() {
        $('#conteudo').load('client/historical/purchases/view/historicalPurchasesAdministration.html')
    })

    $('.historico-credito').click(function() {
        $('#conteudo').load('client/historical/credits/view/historicalCreditsAdministration.html')
    })
})