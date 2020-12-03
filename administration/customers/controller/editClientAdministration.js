$(document).ready(function() {
    $('.btn-edit-clientes').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal.footer').empty()
        $('.modal.title').append('Edição de registro cadastrado')

        var url = "administration/customers/model/viewClientAdministration.php"
        var dados = 'ID_CLIENTES='
        dados += $(this).attr('id')

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: dados,
            url: url,
            success: function(dados) {
                for (var i = 0; dados.length > i; i++) {
                    let cliente = `
                    <form class="mt-3" id="edit-cliente">
                    <input type="hidden"  name="ID_CLIENTES" value="` + dados[i].ID_CLIENTES + `" />
                    <div class="row">
                    <div class="col-12 col md-12">
                        <div class=" form-group form">
                            <input type="text" name="NOME_CLIENTES" id="NOME_CLIENTES" aria-autocomplete="off" value="` + dados[i].NOME_CLIENTES + `">
                            <label for="NOME_CLIENTES" class="label-input">
                                <span class="content-input">Nome</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class=" form-group form">
                            <input type="text" name="RG_CLIENTES" id="RG_CLIENTES" aria-autocomplete="off" value="` + dados[i].RG_CLIENTES + `">
                            <label for="RG_CLIENTES" class="label-input">
                                <span class="content-input">RG</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class=" form-group form">
                            <input type="text" name="CPF_CLIENTES" id="CPF_CLIENTES" aria-autocomplete="off" value="` + dados[i].CPF_CLIENTES + `">
                            <label for="CPF_CLIENTES" class="label-input">
                                <span class="content-input">CPF</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class=" form-group form">
                            <input type="text" name="SEXO_CLIENTES" id="SEXO_CLIENTES" aria-autocomplete="off" value="` + dados[i].SEXO_CLIENTES + `">
                            <label for="SEXO_CLIENTES" class="label-input">
                                <span class="content-input">Gêreno</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class=" form-group form">
                            <input type="text" name="DATA_NASCIMENTO_CLIENTES" id="DATA_NASCIMENTO_CLIENTES" aria-autocomplete="off" value="` + dados[i].DATA_NASCIMENTO_CLIENTES + `">
                            <label for="DATA_NASCIMENTO_CLIENTES" class="label-input">
                                <span class="content-input">Data nascimento</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class=" form-group form">
                            <input type="text" name="CELULAR_CLIENTES" id="CELULAR_CLIENTES" aria-autocomplete="off" value="` + dados[i].CELULAR_CLIENTES + `">
                            <label for="CELULAR_CLIENTES" class="label-input">
                                <span class="content-input">Celular</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                <div class="col-12 col-md-6">
                    <div class=" form-group form">
                        <input type="text" name="CEP_CLIENTES" id="CEP_CLIENTES" aria-autocomplete="off" value="` + dados[i].CEP_CLIENTES + `">
                        <label for="CEP_CLIENTES" class="label-input">
                            <span class="content-input">CEP</span>
                        </label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class=" form-group form">
                        <input type="text" name="ESTADO_CLIENTES" id="ESTADO_CLIENTES" aria-autocomplete="off" value="` + dados[i].ESTADO_CLIENTES + `">
                        <label for="ESTADO_CLIENTES" class="label-input">
                            <span class="content-input">Estado</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class=" form-group form">
                        <input type="text" name="CIDADE_CLIENTES" id="CIDADE_CLIENTES" aria-autocomplete="off" value="` + dados[i].CIDADE_CLIENTES + `">
                        <label for="CIDADE_CLIENTES" class="label-input">
                            <span class="content-input">Cidade</span>
                        </label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class=" form-group form">
                        <input type="text" name="ENDERECO_CLIENTES" id="ENDERECO_CLIENTES" aria-autocomplete="off" value="` + dados[i].ENDERECO_CLIENTES + `">
                        <label for="ENDERECO_CLIENTES" class="label-input">
                            <span class="content-input">Endereço</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class=" form-group form">
                        <input type="text" name="BAIRRO_CLIENTES" id="BAIRRO_CLIENTES" aria-autocomplete="off" value="` + dados[i].BAIRRO_CLIENTES + `">
                        <label for="BAIRRO_CLIENTES" class="label-input">
                            <span class="content-input">Bairro</span>
                        </label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class=" form-group form">
                        <input type="text" name="NACIONALIDADE_CLIENTES" id="NACIONALIDADE_CLIENTES" aria-autocomplete="off" value="` + dados[i].NACIONALIDADE_CLIENTES + `">
                        <label for="NACIONALIDADE_CLIENTES" class="label-input">
                            <span class="content-input">Nacionalidade</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-12 col-md-12">
                <div class=" form-group form">
                    <input type="text" name="COMPLEMENTO_CLIENTES" id="COMPLEMENTO_CLIENTES" aria-autocomplete="off" value="` + dados[i].COMPLEMENTO_CLIENTES + `">
                    <label for="COMPLEMENTO_CLIENTES" class="label-input">
                        <span class="content-input">Complemento</span>
                    </label>
                </div>
            </div>
        </div>

                            <button class="btn btn-info btn-block btn-update"> Salvar </button>
                        </form>
                    `

                    $('.modal-body').append(cliente)
                }
                $('#modalContato').modal('show')
                $('body').append('<script src="administration/customers/controller/updateClientAdministration.js"></script>')
            }
        })
    })
})