$(document).ready(function() {
    $('.historico-compra').click(function() {
        $('#conteudo').load('client/historical/purchases/view/historicalPurchasesCustomers.html')
    })

    $('.historico-credito').click(function() {
        $('#conteudo').load('client/historical/credits/view/historicalCreditsCustomers.html')
    })
})