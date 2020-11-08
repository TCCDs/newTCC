$(document).ready(function() {
    $('.btn-delete').click(function(e) {
        e.preventDefault()

        var dados = 'ID_PRODUTOS='
        dados += $(this).attr('id')

        Swal.fire({
            icon: 'success',
            title: 'Supermercado Caravelas!',
            text: 'Alteração efetuada com sucesso!',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Desistir da exclusão',
            confirmButtonText: 'Confirmar a exclusão'
        }).then((result) => {
            if (result.value) {
                //aqui sera colocado o script de exclusao
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: dados,
                    url: 'administration/products/model/deleteProductsAdministration.php',
                    success: function(dados) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Supermercado Caravelas!',
                            text: 'Exclusão efetuada com sucesso',
                            type: 'success',
                            confirmButtonText: 'Feito!'
                        })
                        $('#conteudo').load('administration/products/view/administrationProducts.html')
                    }
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Supermercado Caravelas!',
                    text: 'Operação cancelada com sucesso',
                    type: 'success',
                    confirmButtonText: 'Feito!'
                })
            }
        })
    })
})