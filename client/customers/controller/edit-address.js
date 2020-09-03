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
                                    <div class=" form-group form">
                                        <input type="text" name="CEP_CLIENTES" id="CEP_CLIENTES" aria-autocomplete="off" required value="` + dados[i].CEP_CLIENTES + `">
                                        <label for="CEP_CLIENTES" class="label-input">
                                            <span class="content-input">CEP</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class=" form-group form">
                                        <input type="text" name="ESTADO_CLIENTES" id="ESTADO_CLIENTES" class="form-control" data-cep="uf" value="` + dados[i].ESTADO_CLIENTES + `" required>
                                        <label for="ESTADO_CLIENTES" class="label-input">
                                            <span class="content-input">Estado</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class=" form-group form">
                                        <input type="text" name="CIDADE_CLIENTES" id="CIDADE_CLIENTES" aria-autocomplete="off" required  value="` + dados[i].CIDADE_CLIENTES + `">
                                        <label for="CIDADE_CLIENTES" class="label-input">
                                            <span class="content-input">Cidade</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class=" form-group form">
                                        <input type="text" name="ENDERECO_CLIENTES" id="ENDERECO_CLIENTES" aria-autocomplete="off" required  value="` + dados[i].ENDERECO_CLIENTES + `">
                                        <label for="ENDERECO_CLIENTES" class="label-input">
                                            <span class="content-input">Endereço</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class=" form-group form">
                                            <input type="text" name="NUMERO_CLIENTES" id="NUMERO_CLIENTES" aria-autocomplete="off" value="` + dados[i].NUMERO_CLIENTES + `" required>
                                            <label for="NUMERO_CLIENTES" class="label-input">
                                            <span class="content-input">Digite o número</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class=" form-group form">
                                            <input type="text" name="BAIRRO_CLIENTES" id="BAIRRO_CLIENTES" aria-autocomplete="off" value="` + dados[i].BAIRRO_CLIENTES + `" required>
                                            <label for="BAIRRO_CLIENTES" class="label-input">
                                            <span class="content-input">Digite seu bairro</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <div class=" form-group form">
                                            <input type="text" name="COMPLEMENTO_CLIENTES" id="COMPLEMENTO_CLIENTES" aria-autocomplete="off" value="` + dados[i].COMPLEMENTO_CLIENTES + `" required>
                                            <label for="COMPLEMENTO_CLIENTES" class="label-input">
                                            <span class="content-input">Digite o complemento</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                <button class="btn btn-block btn-primary btn-update"> Salvar </button>
                                </div>
                            </div>
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