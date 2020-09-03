$(document).ready(function() {
    $('.dados-pessoais').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal.footer').empty()
        $('.modal.title').append('Edição de registro cadastrado')

        var url = "client/customers/model/viewCustomers.php"
        var dados = 'ID_CLIENTES='
        dados += $(this).attr('id')

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: dados,
            url: url,
            success: function(dados) {
                for (var i = 0; dados.length > i; i++) {
                    let produtos = `
                        <form class="mt-3" id="edit-cliente">
                            <input type="hidden"  name="ID_CLIENTES" value="` + dados[i].ID_CLIENTES + `" />

                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class=" form-group form">
                                        <input type="text" name="EMAIL_CLIENTES" id="EMAIL_CLIENTES" aria-autocomplete="off" required value="` + dados[i].EMAIL_CLIENTES + `">
                                        <label for="EMAIL_CLIENTES" class="label-input">
                                            <span class="content-input">Email</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class=" form-group form">
                                        <input type="text" name="NOME_CLIENTES" id="NOME_CLIENTES" aria-autocomplete="off" required value="` + dados[i].NOME_CLIENTES + `">
                                        <label for="NOME_CLIENTES" class="label-input">
                                            <span class="content-input">Nome</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class=" form-group form">
                                        <input type="text" name="CPF_CLIENTES" id="CPF_CLIENTES" aria-autocomplete="off" required value="` + dados[i].CPF_CLIENTES + `">
                                        <label for="CPF_CLIENTES" class="label-input">
                                            <span class="content-input">CPF</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class=" form-group form">
                                        <input type="text" name="RG_CLIENTES" id="RG_CLIENTES" aria-autocomplete="off" required value="` + dados[i].RG_CLIENTES + `">
                                        <label for="RG_CLIENTES" class="label-input">
                                            <span class="content-input">RG</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class=" form-group form">
                                        <input type="text" name="DATA_NASCIMENTO_CLIENTES" id="DATA_NASCIMENTO_CLIENTES" aria-autocomplete="off" required value="` + dados[i].DATA_NASCIMENTO_CLIENTES + `">
                                        <label for="DATA_NASCIMENTO_CLIENTES" class="label-input">
                                            <span class="content-input">Data de nascimento</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class=" form-group form">
                                        <input type="text" name="SEXO_CLIENTES" id="SEXO_CLIENTES" aria-autocomplete="off" required value="` + dados[i].SEXO_CLIENTES + `">
                                        <label for="SEXO_CLIENTES" class="label-input">
                                            <span class="content-input">Data de nascimento</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-12 col-md-6">
                                    <div class=" form-group form">
                                        <input type="text" name="CELULAR_CLIENTES" id="CELULAR_CLIENTES" aria-autocomplete="off" required value="` + dados[i].CELULAR_CLIENTES + `">
                                        <label for="CELULAR_CLIENTES" class="label-input">
                                            <span class="content-input">Data de nascimento</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class=" form-group form">
                                        <input type="text" name="NACIONALIDADE_CLIENTES" id="NACIONALIDADE_CLIENTES" aria-autocomplete="off" required value="` + dados[i].NACIONALIDADE_CLIENTES + `">
                                        <label for="NACIONALIDADE_CLIENTES" class="label-input">
                                            <span class="content-input">Data de nascimento</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-block btn-primary btn-update"> <i class="mdi mdi-content-save"></i> Salvar </button>
                        </form>
                    `

                    $('.modal-body').append(produtos)
                }
                $('#modalClient').modal('show')
                $('body').append('<script src="client/customers/controller/updateCustomersUser.js"></script>')
            }
        })
    })
})