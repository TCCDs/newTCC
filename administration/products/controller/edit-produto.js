$(document).ready(function() {
    $('.btn-edit-produtos').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal-footer').empty()
        $('.modal-title').append('Edição de registro cadastrado')

        var url = "administration/products/model/viewProductsAdministration.php"
        var dados = 'ID_PRODUTOS='
        dados += $(this).attr('id')

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: dados,
            url: url,
            success: function(dados) {
                for (var i = 0; dados.length > i; i++) {
                    let produto = `
                    <form class="mt-3" id="edit-produtos">
                    <input type="hidden"  name="ID_PRODUTOS" value="` + dados[i].ID_PRODUTOS + `" />
                    <div class="row">
                    <div class="col-12 col md-12">
                        <div class=" form-group form">
                            <input type="text" name="NOME_PRODUTOS" id="NOME_PRODUTOS" aria-autocomplete="off" value="` + dados[i].NOME_PRODUTOS + `">
                            <label for="NOME_PRODUTOS" class="label-input">
                                <span class="content-input">Nome</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class=" form-group form">
                            <input type="text" name="PRECO_CUSTO_PRODUTOS" id="PRECO_CUSTO_PRODUTOS" aria-autocomplete="off" value="` + dados[i].PRECO_CUSTO_PRODUTOS + `">
                            <label for="PRECO_CUSTO_PRODUTOS" class="label-input">
                                <span class="content-input">Preço de custo</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class=" form-group form">
                            <input type="text" name="PRECO_VENDA_PRODUTOS" id="PRECO_VENDA_PRODUTOS" aria-autocomplete="off" value="` + dados[i].PRECO_VENDA_PRODUTOS + `">
                            <label for="PRECO_VENDA_PRODUTOS" class="label-input">
                                <span class="content-input">Preço de venda</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class=" form-group form">
                            <input type="text" name="VALIDADE_PRODUTOS" id="VALIDADE_PRODUTOS" aria-autocomplete="off" value="` + dados[i].VALIDADE_PRODUTOS + `">
                            <label for="VALIDADE_PRODUTOS" class="label-input">
                                <span class="content-input">Validade</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class=" form-group form">
                            <input type="text" name="PESO_PRODUTOS" id="PESO_PRODUTOS" aria-autocomplete="off" value="` + dados[i].PESO_PRODUTOS + `">
                            <label for="PESO_PRODUTOS" class="label-input">
                                <span class="content-input">Peso</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class=" form-group form">
                            <input type="text" name="LOTE_PRODUTOS" id="LOTE_PRODUTOS" aria-autocomplete="off" value="` + dados[i].LOTE_PRODUTOS + `">
                            <label for="LOTE_PRODUTOS" class="label-input">
                                <span class="content-input">Lote</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class=" form-group form">
                            <input type="text" name="QR_CODE_PRODUTOS" id="QR_CODE_PRODUTOS" aria-autocomplete="off" value="` + dados[i].QR_CODE_PRODUTOS + `">
                            <label for="QR_CODE_PRODUTOS" class="label-input">
                                <span class="content-input">Qr-code</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                <div class="col-12 col-md-6">
                    <div class=" form-group form">
                        <input type="text" name="ESTOQUE_PRODUTOS" id="ESTOQUE_PRODUTOS" aria-autocomplete="off" value="` + dados[i].ESTOQUE_PRODUTOS + `">
                        <label for="ESTOQUE_PRODUTOS" class="label-input">
                            <span class="content-input">Estoque</span>
                        </label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class=" form-group form">
                        <input type="text" name="CATEGORIAS_PRODUTOS" id="CATEGORIAS_PRODUTOS" aria-autocomplete="off" value="` + dados[i].CATEGORIAS_PRODUTOS + `">
                        <label for="CATEGORIAS_PRODUTOS" class="label-input">
                            <span class="content-input">Categorias</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class=" form-group form">
                        <input type="text" name="CORREDOR_PRODUTOS" id="CORREDOR_PRODUTOS" aria-autocomplete="off" value="` + dados[i].CORREDOR_PRODUTOS + `">
                        <label for="CORREDOR_PRODUTOS" class="label-input">
                            <span class="content-input">Corredor</span>
                        </label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class=" form-group form">
                        <input type="text" name="PRATILEIRA_PRODUTOS" id="PRATILEIRA_PRODUTOS" aria-autocomplete="off" value="` + dados[i].PRATILEIRA_PRODUTOS + `">
                        <label for="PRATILEIRA_PRODUTOS" class="label-input">
                            <span class="content-input">Pratileira</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class=" form-group form">
                        <input type="text" name="DESCRICAO_PRODUTOS" id="DESCRICAO_PRODUTOS" aria-autocomplete="off" value="` + dados[i].DESCRICAO_PRODUTOS + `">
                        <label for="DESCRICAO_PRODUTOS" class="label-input">
                            <span class="content-input">Descrição</span>
                        </label>
                    </div>
                </div>
            </div>

                            <button class="btn btn-info btn-block btn-update"> Salvar </button>
                        </form>
                    `

                    $('.modal-body').append(produto)
                }
                $('#modalContato').modal('show')
                $('body').append('<script src="administration/products/controller/updateProdutosAdministration.js"></script>')
            }
        })
    })
})