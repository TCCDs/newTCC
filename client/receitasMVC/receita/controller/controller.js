$(document).ready(function() {
    $('.btn-receitaView').click(function() {
        $('body').load('client/receitasMVC/receita/view/ver.html')
    })

    $('.btn-receitaEditar').click(function() {
        $('body').load('client/receitasMVC/receita/view/editar.html')
    })
})