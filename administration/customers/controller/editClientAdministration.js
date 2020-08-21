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

                            <div class="form-group">
                                <label>Nome do Cliente</label>
                                <input class="form-control" type="text" name="NOME_CLIENTES" value="` + dados[i].NOME_CLIENTES + `">
                            </div>

                            <div class="form-group">
                                <label>rg</label>
                                <input class="form-control" type="text" name="RG_CLIENTES" value="` + dados[i].RG_CLIENTES + `">
                            </div>

                            <div class="form-group row">
                                <div class="col-4">
                                    <label>cpf</label>
                                    <input class="form-control" type="text" name="CPF_CLIENTES" value="` + dados[i].CPF_CLIENTES + `">
                                </div>
                                <div class="col-4">
                                    <label>Celular do Cliente</label>
                                    <input class="form-control" type="text" name="CELULAR_CLIENTES" value="` + dados[i].CELULAR_CLIENTES + `">
                                </div>
                                <div class="col-4">
                                    <label>cidade do Cliente</label>
                                    <input class="form-control" type="text" name="CIDADE_CLIENTES" value="` + dados[i].CIDADE_CLIENTES + `">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-4">
                                    <label>DATA_NASCIMENTO</label>
                                    <input class="form-control" type="text" name="DATA_NASCIMENTO_CLIENTES" value="` + dados[i].DATA_NASCIMENTO_CLIENTES + `">
                                </div>
                                <div class="col-4">
                                    <label>SEXO</label>
                                    <input class="form-control" type="text" name="SEXO_CLIENTES" value="` + dados[i].SEXO_CLIENTES + `">
                                </div>
                                <div class="col-4">
                                    <label>E-Mail</label>
                                    <input class="form-control" type="text" name="EMAIL_CLIENTES" value="` + dados[i].EMAIL_CLIENTES + `">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-4">
                                    <label>CEP</label>
                                    <input class="form-control" type="text" name="CEP_CLIENTES" value="` + dados[i].CEP_CLIENTES + `">
                                </div>
                                <div class="col-4">
                                    <label>ESTADOS</label>
                                    <input class="form-control" type="text" name="ESTADO_CLIENTES" value="` + dados[i].ESTADO_CLIENTES + `">
                                </div>
                                <div class="col-4">
                                    <label>BAIRRO</label>
                                    <input class="form-control" type="text" name="BAIRRO_CLIENTES" value="` + dados[i].BAIRRO_CLIENTES + `">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>ENDERECO</label>
                                <input class="form-control" type="text" name="ENDERECO_CLIENTES" value="` + dados[i].ENDERECO_CLIENTES + `">
                            </div>

                            <div class="form-group">
                                <label>COMPLEMENTO</label>
                                <input class="form-control" type="text" name="COMPLEMENTO_CLIENTES" value="` + dados[i].COMPLEMENTO_CLIENTES + `">
                            </div>

                            <div class="form-group">
                                <label>NACIONALIDADE</label>
                                <input class="form-control" type="text" name="NACIONALIDADE_CLIENTES" value="` + dados[i].NACIONALIDADE_CLIENTES + `">
                            </div>

                            <button class="btn btn-outline-warning btn-update"> <i class="mdi mdi-content-save"></i> Salvar </button>
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