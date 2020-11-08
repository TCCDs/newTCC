$(document).ready(function() {
    $('.btn-edit-marcas').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal.footer').empty()
        $('.modal.title').append('Edição de registro cadastrado')

        var url = "administration/adm/model/viewmarcaAdministration.php"
        var dados = 'ID_MARCA='
        dados += $(this).attr('id')

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: dados,
            url: url,
            success: function(dados) {
                for (var i = 0; dados.length > i; i++) {
                    let marca = `
                    <form class="mt-3" id="edit-adm">
                    <input type="hidden"  name="ID_MARCA" value="` + dados[i].ID_MARCA + `" />
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class=" form-group form">
                                    <input type="text" name="NOME_MARCA" id="NOME_MARCA" aria-autocomplete="off" value="` + dados[i].NOME_MARCA + `">
                                    <label for="NOME_MARCA" class="label-input">
                                        <span class="content-input">Nome da marca</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class=" form-group form">
                                    <input type="text" name="CODIGO_MARCA" id="CODIGO_MARCA" aria-autocomplete="off" value="` + dados[i].CODIGO_MARCA + `">
                                    <label for="CODIGO_MARCA" class="label-input">
                                        <span class="content-input">Código da marca</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                            <button class="btn btn-info btn-block btn-update"> Salvar </button>
                        </form>
                    `

                    $('.modal-body').append(marca)
                }
                $('#modalContato').modal('show')
                $('body').append('<script src="administration/marca/controller/updatemarcaAdministration.js"></script>')
            }
        })
    })
})