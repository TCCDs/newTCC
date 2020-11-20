$(document).ready(function() {
    $('.btn-receitaEditar').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal-footer').empty()
        $('.modal-title').append('Edição de registro cadastrado')

        var url = "client/receitasMVC/receita/model/receitaView.php"
        var dados = 'id='
        dados += $(this).attr('id')

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: dados,
            url: url,
            success: function(dados) {
                for (var i = 0; dados.length > i; i++) {
                    let receitas = `
                    <form class="mt-3" id="edit-adm">
                    <input type="hidden"  name="id" value="` + dados[i].id + `" />
                    <div class="row">
                    <div class="col-12 col md-12">
                        <div class=" form-group form">
                            <input type="text" name="NOME_ADMINISTRADOR" id="NOME_ADMINISTRADOR" aria-autocomplete="off" value="` + dados[i].NOME_ADMINISTRADOR + `">
                            <label for="NOME_ADMINISTRADOR" class="label-input">
                                <span class="content-input">Nome</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class=" form-group form">
                            <input type="text" name="RG_ADMINISTRADOR" id="RG_ADMINISTRADOR" aria-autocomplete="off" value="` + dados[i].RG_ADMINISTRADOR + `">
                            <label for="RG_ADMINISTRADOR" class="label-input">
                                <span class="content-input">RG</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class=" form-group form">
                            <input type="text" name="CPF_ADMINISTRADOR" id="CPF_ADMINISTRADOR" aria-autocomplete="off" value="` + dados[i].CPF_ADMINISTRADOR + `">
                            <label for="CPF_ADMINISTRADOR" class="label-input">
                                <span class="content-input">CPF</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class=" form-group form">
                            <input type="text" name="SEXO_ADMINISTRADOR" id="SEXO_ADMINISTRADOR" aria-autocomplete="off" value="` + dados[i].SEXO_ADMINISTRADOR + `">
                            <label for="SEXO_ADMINISTRADOR" class="label-input">
                                <span class="content-input">Gêreno</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class=" form-group form">
                            <input type="text" name="DATA_NASCIMENTO_ADMINISTRADOR" id="DATA_NASCIMENTO_ADMINISTRADOR" aria-autocomplete="off" value="` + dados[i].DATA_NASCIMENTO_ADMINISTRADOR + `">
                            <label for="DATA_NASCIMENTO_ADMINISTRADOR" class="label-input">
                                <span class="content-input">Data nascimento</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class=" form-group form">
                            <input type="text" name="CELULAR_ADMINISTRADOR" id="CELULAR_ADMINISTRADOR" aria-autocomplete="off" value="` + dados[i].CELULAR_ADMINISTRADOR + `">
                            <label for="CELULAR_ADMINISTRADOR" class="label-input">
                                <span class="content-input">Celular</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class=" form-group form">
                            <input type="text" name="EMAIL_ADMINISTRADOR" id="EMAIL_ADMINISTRADOR" aria-autocomplete="off" value="` + dados[i].EMAIL_ADMINISTRADOR + `">
                            <label for="EMAIL_ADMINISTRADOR" class="label-input">
                                <span class="content-input">Email</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                <div class="col-12 col-md-6">
                    <div class=" form-group form">
                        <input type="text" name="CEP_ADMINISTRADOR" id="CEP_ADMINISTRADOR" aria-autocomplete="off" value="` + dados[i].CEP_ADMINISTRADOR + `">
                        <label for="CEP_ADMINISTRADOR" class="label-input">
                            <span class="content-input">CEP</span>
                        </label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class=" form-group form">
                        <input type="text" name="ESTADO_ADMINISTRADOR" id="ESTADO_ADMINISTRADOR" aria-autocomplete="off" value="` + dados[i].ESTADO_ADMINISTRADOR + `">
                        <label for="ESTADO_ADMINISTRADOR" class="label-input">
                            <span class="content-input">Estado</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class=" form-group form">
                        <input type="text" name="CIDADE_ADMINISTRADOR" id="CIDADE_ADMINISTRADOR" aria-autocomplete="off" value="` + dados[i].CIDADE_ADMINISTRADOR + `">
                        <label for="CIDADE_ADMINISTRADOR" class="label-input">
                            <span class="content-input">Cidade</span>
                        </label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class=" form-group form">
                        <input type="text" name="ENDERECO_ADMINISTRADOR" id="ENDERECO_ADMINISTRADOR" aria-autocomplete="off" value="` + dados[i].ENDERECO_ADMINISTRADOR + `">
                        <label for="ENDERECO_ADMINISTRADOR" class="label-input">
                            <span class="content-input">Endereço</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class=" form-group form">
                        <input type="text" name="BAIRRO_ADMINISTRADOR" id="BAIRRO_ADMINISTRADOR" aria-autocomplete="off" value="` + dados[i].BAIRRO_ADMINISTRADOR + `">
                        <label for="BAIRRO_ADMINISTRADOR" class="label-input">
                            <span class="content-input">Bairro</span>
                        </label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class=" form-group form">
                        <input type="text" name="NACIONALIDADE_ADMINISTRADOR" id="NACIONALIDADE_ADMINISTRADOR" aria-autocomplete="off" value="` + dados[i].NACIONALIDADE_ADMINISTRADOR + `">
                        <label for="NACIONALIDADE_ADMINISTRADOR" class="label-input">
                            <span class="content-input">Nacionalidade</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-12 col-md-12">
                <div class=" form-group form">
                    <input type="text" name="COMPLEMENTO_ADMINISTRADOR" id="COMPLEMENTO_ADMINISTRADOR" aria-autocomplete="off" value="` + dados[i].COMPLEMENTO_ADMINISTRADOR + `">
                    <label for="COMPLEMENTO_ADMINISTRADOR" class="label-input">
                        <span class="content-input">Complemento</span>
                    </label>
                </div>
            </div>
        </div>

                            <button class="btn btn-info btn-block btn-update"> Salvar </button>
                        </form>
                    `

                    $('.modal-body').append(receitas)
                }
                $('#modalReceita').modal('show')
                $('body').append('<script src="administration/adm/controller/updateAdmAdministration.js"></script>')
            }
        })
    })
})


// $(document).ready(function() {
//     $('.editar').click(function(e) {
//         e.preventDefault()

//         var url = "client/receitasMVC/receita/model/editar.php"
//         var dados = 'id='
//         dados += $(this).attr('id')

//         $.ajax({
//             type: 'POST',
//             dataType: 'json',
//             data: dados,
//             url: url,
//             success: function(dados) {
//                 for (var i = 0; dados.length > i; i++) {
//                     let produtos = `
//                     <form  id="register_form" method="post">
//                         <div id="formCad">
//                             <div class="row">
//                             <input type="hidden" id="txtId" value="` + dados[i].id + `" />
//                                 <div class="col-md-5 mt-3">
//                                     <div class=" form-group form">
//                                         <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" aria-autocomplete="off" value=" ` + dados[i].titulo + `" /> required>
//                                         <label for="txtTitulo" class="label-input">
//                                             <span class="content-input">Título</span>
//                                         </label>
//                                     </div>
//                                 </div>

//                                 <div class="col-md-4 mt-3">
//                                     <label for="txtSlug">Slug</label>
//                                     <input type="text" id="txtSlug" name="txtSlug" class="form-control" placeholder="titulo-aqui" value=" ` + dados[i].slug + `" />
//                                 </div>

//                                 <div class="col-md-3 mt-3">
//                                     <label for="slCategoria">Categoria</label>
//                                     <select name="slCategoria" id="slCategoria" class="form-control receitaCate">
//                                         <option value=" ` + dados[i].id + `"> ` + dados[i].titulo + `</option>
//                                     </select>
//                                 </div>
//                             </div>

//                             <div class="row">
//                                 <div class="col-md-12 mt-3">
//                                     <label for="txtLinhaFina">Linha fina</label>
//                                     <input type="text" id="txtLinhaFina" name="txtLinhaFina" class="form-control" placeholder="Descreva a receita" minlength="10" maxlength="250" value=" ` + dados[i].linha_fina + ` />
//                                 </div>
//                             </div>

//                             <div class="row">
//                                 <div class="col-md-12 mt-3">
//                                     <label for="txtThumb">Thumbnail</label>
//                                     <input type="text" id="txtThumb" name="txtThumb" class="form-control" placeholder="https://mysite.com/img/img.jpg" minlength="1" maxlength="100" value=" ` + dados[i].thumb + `" />
//                                 </div>
//                             </div>

//                             <div class="row">
//                                 <div class="col-md-12 mt-3">
//                                     <label for="txtDescricao">Conteúdo</label>
//                                     <textarea id="txtDescricao" name="txtDescricao"> ` + dados[i].descricao + `</textarea>
//                                 </div>
//                             </div>

//                             <div class="row mt-3">
//                                 <div class="col-12 col-md-12 text-right">
//                                     <input type="submit" name="editar" value="Alterar" class="editar btn btn-success w-100">
//                                 </div>
//                             </div>
//                         </div>
//                 </form>
//                     `

//                     $('#formEditar').append(receitas)
//                 }
//                 $('body').append('<script src="client/receitasMVC/receita/controller/updateReceita.js"></script>')
//             }
//         })
//     })
// })