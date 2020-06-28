$(document).ready(function() {
    $('.dados-pessoais').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal.footer').empty()
        $('.modal.title').append('Edição de registro cadastrado')

        var url = "client/customers/model/viewClientAdministration.php"
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
                        <form class="mt-3" id="formulario">
                        <div class="row">
                        <div class="col-12 col-md-12">
                        <div class="form-group">
                            <div class="wrap-input100">
                                <input type="text" class="input100" placeholder="Digite seu Email" name="EMAIL_CLIENTES" value="` + dados[i].CELULAR_CLIENTES + `">
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                        <div class="form-group">
                            <div class="wrap-input100">
                                <input type="text" class="input100" placeholder="Digite seu nome" name="NOME_CLIENTES" value="` + dados[i].NOME_CLIENTES + `">
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <div class="wrap-input100">
                                <input type="text" class="input100" placeholder="Digite seu CPF" name="CPF_CLIENTES" value="` + dados[i].RG_CLIENTES + `">
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <div class="wrap-input100">
                                <input type="text" class="input100" placeholder="Digite seu RG" name="RG_CLIENTES" value="` + dados[i].CPF_CLIENTES + `">
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <div class="wrap-input100">
                            <input type="text" class="input100" placeholder="Data de Nascimento" name="DATA_NASCIMENTO"  value="` + dados[i].DATA_NASCIMENTO_CLIENTES + `">
                            <span class="focus-input100"></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <div class="wrap-input100">
                            <input type="text" class="input100" placeholder="Sexo do Usuário" name="SEXO_CLIENTES" value="` + dados[i].SEXO_CLIENTES + `">
                            <span class="focus-input100"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <div class="wrap-input100">
                            <input type="text" class="input100" placeholder="Nacionalidade" name="NACIONALIDADE_CLIENTES" name="EMAIL_CLIENTES" value="` + dados[i].NACIONALIDADE_CLIENTES + `">
                            <span class="focus-input100"></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <div class="wrap-input100">
                            <input type="text" class="input100" placeholder="Digite seu telefone" name="CELULAR_CLIENTES"  value="` + dados[i].CELULAR_CLIENTES + `">
                            <span class="focus-input100"></span>
                        </div>
                    </div>
                </div>
            </div>
                            <input type="hidden"  name="ID_CLIENTES" value="` + dados[i].ID_CLIENTES + `" />
                            <button class="btn btn-block btn-outline-primary btn-update"> <i class="mdi mdi-content-save"></i> Salvar </button>
                        </form>
                    `

                    $('.modal-body').append(cliente)
                }
                $('#modalClient').modal('show')
                $('body').append('<script src="administration/customers/controller/updateClientAdministration.js"></script>')
            }
        })
    })
})