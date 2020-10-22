$(document).ready(function() {
    $('.sobre').click(function() {
        $('#conteudo').load('client/receitasMVC/sobre/view/sobre.html');
    })

    $('.receita').click(function() {
        $('#conteudo').load('client/receitasMVC/receita/view/receita.html')
    })

    $('.categoria').click(function() {
        $('#conteudo').load('client/receitasMVC/categoria/view/categoria.html')
    })

    $('.home').click(function() {
        $('#conteudo').load('client/receitasMVC/home/view/home.html')
    })
})
