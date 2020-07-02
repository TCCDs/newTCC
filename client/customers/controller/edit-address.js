$(document).ready(function() {
    $('.enderecos').click(function(e) {
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
                    let cliente = `
                        <form class="mt-3" id="edit-cliente">
                            <input type="hidden"  name="ID_CLIENTES" value="` + dados[i].ID_CLIENTES + `" />

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="wrap-input100">
                                            <input type="text" class="input100" placeholder="Digite seu CEP" name="CEP_CLIENTES" value="` + dados[i].CEP_CLIENTES + `">
                                            <span class="focus-input100"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="wrap-input100">
                                            <input type="text" class="input100" placeholder="Digite seu estado" name="ESTADO_CLIENTES" value="` + dados[i].ESTADO_CLIENTES + `">
                                            <span class="focus-input100"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="wrap-input100">
                                            <input type="text" class="input100" placeholder="Digite sua cidade" name="CIDADE_CLIENTES" value="` + dados[i].CIDADE_CLIENTES + `">
                                            <span class="focus-input100"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="wrap-input100">
                                            <input type="text" class="input100" placeholder="Digite seu endereço" name="ENDERECO_CLIENTES" value="` + dados[i].ENDERECO_CLIENTES + `">
                                            <span class="focus-input100"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="wrap-input100">
                                            <input type="text" class="input100" placeholder="Digite o número" name="NUMERO_CLIENTES" value="` + dados[i].NUMERO_CLIENTES + `">
                                            <span class="focus-input100"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <div class="wrap-input100">
                                        <input type="text" class="input100" placeholder="Digite seu bairro" name="BAIRRO_CLIENTES" value="` + dados[i].BAIRRO_CLIENTES + `">
                                        <span class="focus-input100"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <div class="wrap-input100">
                                        <input type="text" class="input100" placeholder="Digite o complemento" name="COMPLEMENTO_CLIENTES" value="` + dados[i].COMPLEMENTO_CLIENTES + `">
                                        <span class="focus-input100"></span>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-block btn-outline-primary btn-update"> <i class="mdi mdi-content-save"></i> Salvar </button>
                        </form>
                    `

                    $('.modal-body').append(cliente)
                }
                $('#modalClient').modal('show')
                $('body').append('<script src="client/customers/controller/updateCustomersAddress.js"></script>')
            }
        })
    })
})