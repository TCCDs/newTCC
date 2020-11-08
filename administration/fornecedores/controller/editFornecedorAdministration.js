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
                                    <input type="text" name="CNPJ_FORNECEDORES" id="CNPJ_FORNECEDORES" aria-autocomplete="off" value="` + dados[i].CNPJ_FORNECEDORES + `">
                                    <label for="CNPJ_FORNECEDORES" class="label-input">
                                        <span class="content-input">CNPJ</span>
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
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class=" form-group form">
                                    <input type="text" name="CELULAR_FORNECEDORES" id="CELULAR_FORNECEDORES" aria-autocomplete="off" value="` + dados[i].CELULAR_FORNECEDORES + `">
                                    <label for="CELULAR_FORNECEDORES" class="label-input">
                                        <span class="content-input">Celular</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class=" form-group form">
                                    <input type="text" name="SEXO_FORNECEDORES" id="SEXO_FORNECEDORES" aria-autocomplete="off" value="` + dados[i].SEXO_FORNECEDORES + `">
                                    <label for="SEXO_FORNECEDORES" class="label-input">
                                        <span class="content-input">Gênero</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class=" form-group form">
                                    <input type="text" name="DATA_NASCIMENTO_FORNECEDORES" id="DATA_NASCIMENTO_FORNECEDORES" aria-autocomplete="off" value="` + dados[i].DATA_NASCIMENTO_FORNECEDORES + `">
                                    <label for="DATA_NASCIMENTO_FORNECEDORES" class="label-input">
                                        <span class="content-input">Data de nascimento</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class=" form-group form">
                                    <input type="text" name="NACIONALIDADE_FORNECEDORES" id="NACIONALIDADE_FORNECEDORES" aria-autocomplete="off" value="` + dados[i].NACIONALIDADE_FORNECEDORES + `">
                                    <label for="NACIONALIDADE_FORNECEDORES" class="label-input">
                                        <span class="content-input">Nacionalidade</span>
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