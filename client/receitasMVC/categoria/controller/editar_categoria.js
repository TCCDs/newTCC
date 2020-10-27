$(document).ready(function() {

    $('#table-cliente').on('click', 'button.btn-categoriaEditar', function(e){

        e.preventDefault();

        $('.modal-title').empty();
        $('.modal-body').empty();

        $('.modal-title').append(`Edição de Categoria #${$(this).attr('id')}`)

        let idcliente = `id=${$(this).attr('id')}`

        $.ajax({
            type: 'POST',
            dataType: 'json',
            assync: true,
            data: idcliente,
            url: 'client/receitasMVC/categoria/model/categoriaView.php',
            success: function(dado){
                if(dado.tipo == "success"){

                    $('.modal-body').load('client/receitasMVC/categoria/view/editar.html', function(){
                        $('#txtTitulo').val(dado.categoria.titulo)
                        $('#txtSlug').val(dado.categoria.slug)
                        $('#txtId').val(dado.categoria.idcliente)
                    })

                    $('.btn-save').hide()
                    $('.btn-update').show()
                    $('#modal-cliente').modal('show')

                } else{
                    Swal.fire({
                        icon: 'success',
                        title: 'Supermercado Caravelas!',
                        text: 'Cadastro efetuado com sucesso!',
                        type: 'success',
                        confirmButtonText: 'Feito!'
                    })
                }
            }
        })

    })
})