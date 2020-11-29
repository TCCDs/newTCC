$(document).ready(function() {
    $('.btn-categoriaEditar').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal-footer').empty()
        $('.modal-title').append('Edição de registro cadastrado')

        var url = "client/receitasMVC/categoria/model/categoriaView.php"
        var dados = 'titulo='
        dados += $(this).attr('id')

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: dados,
            url: url,
            success: function(dados) {
                for (var i = 0; dados.length > i; i++) {
                    let categorias = `
                        <form class="mt-3" id="edit-categoria">
                            <input type="hidden"  name="titulo" value="` + dados[i].titulo + `" />

                            <form id="register_form" method="post">
                            <div class="col-12 col-md-12 receita_form">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class=" form-group form">
                                            <input type="text" name="txtTitulo" id="txtTitulo" aria-autocomplete="off" required>
                                            <label for="txtTitulo" class="label-input">
                                                    <span class="content-input">Título aqui</span>
                                                </label>
                                        </div>
                                    </div>
                        
                                    <div class="col-12 col-md-6">
                                        <div class=" form-group form">
                                            <input type="text" name="txtSlug" id="txtSlug" aria-autocomplete="off" required>
                                            <label for="txtSlug" class="label-input">
                                                    <span class="content-input">Slug aqui</span>
                                                </label>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="row mt-3">
                                    <div class="col-12 col-md-12">
                                        <input type="submit" name="registrar" value="Adicionar" class="btn btn-info btn-block btn-update btn-cat">
                                    </div>
                                </div>
                            </div>
                        </form>
                    `

                    $('.modal-body').append(categorias)
                }
                $('#modal-categoria').modal('show')
                $('body').append('<script src="client/receitasMVC/categoria/controller/updateReceita.js"></script>')
            }
        })
    })

})