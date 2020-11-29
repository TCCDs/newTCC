$(document).ready(function() {
    $('.btn-receitaView').click(function(e) {

        e.preventDefault()

        $('#modalReceita').modal('show')
            // $('.modal-title').empty()
            // $('.modal-body').empty()
            // $('.modal-footer').empty()

        // var url = "client/receitasMVC/receita/model/receitaView.php"
        // var dados = 'id='
        // dados += $(this).attr('id')

        // $.ajax({
        //     type: 'POST',
        //     dataType: 'json',
        //     data: dados,
        //     url: url,
        //     success: function(dados) {
        //         for (var i = 0; dados.length > i; i++) {
        //             let receita = `
        //                 <p> Slug: ` + dados[i].slug + ` </p>
        //                 <p> Categoria: ` + dados[i].cattitulo + ` </p>
        //                 <p> Data: ` + dados[i].data + ` </p>
        //             `

        //             $('.modal-title').append(dados[i].titulo)
        //             $('.modal-body').append(receita)
        //         }
        //         $('#modalReceita').modal('show')
        //     }
        // })
    })
})