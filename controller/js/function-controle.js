$(document).ready(function() {
    $('.cliente-controle').click(function() {
        $('#conteudo').load('customerPanel.html')
    })

    $('.adm-controle').click(function() {
        $('#conteudo').load('administration.html')
    })

})