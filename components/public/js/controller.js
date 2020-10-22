$(document).ready(function() {
    $('.sobre').click(function() {
        $('#conteudo').load('receitas/view/sobre/view/sobre.html');
    })

    $('.receita').click(function() {
        $('#conteudo').load('receitas/view/receita/view/receita.html')
    })

    $('.categoria').click(function() {
        $('#conteudo').load('receitas/view/categoria/view/categoria.html')
    })
})
