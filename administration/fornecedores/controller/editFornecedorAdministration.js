$(document).ready(function() {
    $('.btn-edit-fornecedores').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal-footer').empty()
        $('.modal-title').append('Edição de registro cadastrado')

        var url = "administration/fornecedores/model/viewFornecedoresAdministration.php"
        var dados = 'ID_FORNECEDORES='
        dados += $(this).attr('id')

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: dados,
            url: url,
            success: function(dados) {
                for (var i = 0; dados.length > i; i++) {
                    let fornecedores = `
                    <form class="mt-3" id="edit-adm">
                    <input type="hidden"  name="ID_FORNECEDORES" value="` + dados[i].ID_FORNECEDORES + `" />
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class=" form-group form">
                                    <input type="text" name="NOME_FANTASIA_FORNECEDORES" id="NOME_FANTASIA_FORNECEDORES" aria-autocomplete="off" value="` + dados[i].NOME_FANTASIA_FORNECEDORES + `">
                                    <label for="NOME_FANTASIA_FORNECEDORES" class="label-input">
                                        <span class="content-input">Nome fantasia</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class=" form-group form">
                                    <input type="text" name="RAZAO_SOCIAL_FORNECEDORES" id="RAZAO_SOCIAL_FORNECEDORES" aria-autocomplete="off" value="` + dados[i].RAZAO_SOCIAL_FORNECEDORES + `">
                                    <label for="RAZAO_SOCIAL_FORNECEDORES" class="label-input">
                                        <span class="content-input">Razão social</span>
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
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class=" form-group form">
                                    <input type="text" name="EMAIL_FORNECEDORES" id="EMAIL_FORNECEDORES" aria-autocomplete="off" value="` + dados[i].EMAIL_FORNECEDORES + `">
                                    <label for="EMAIL_FORNECEDORES" class="label-input">
                                        <span class="content-input">Email</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                            <button class="btn btn-info btn-block btn-update"> Salvar </button>
                        </form>
                    `

                    $('.modal-body').append(fornecedores)
                }
                $('#modalContato').modal('show')
                $('body').append('<script src="administration/fornecedores/controller/updateFornecedoresAdministration.js"></script>')
            }
        })
    })
})