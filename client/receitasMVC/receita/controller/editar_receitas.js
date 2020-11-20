$(document).ready(function() {
    $('.btn-receitaEditar').click(function(e) {
        e.preventDefault()
        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal-footer').empty()
        $('.modal-title').append('Edição de registro cadastrado')

        //     var url = "client/receitasMVC/receita/model/receitaView.php"
        //     var dados = 'id='
        //     dados += $(this).attr('id')

        //     $.ajax({
        //         type: 'POST',
        //         dataType: 'json',
        //         data: dados,
        //         url: url,
        //         success: function(dados) {
        //             for (var i = 0; dados.length > i; i++) {
        //                 let receita = `
        //                 <form class="mt-3" id="edit-receita">
        //                 <div id="formCad">
        //                         <div class="row">
        //                         <input type="hidden" id="txtId" value="` + dados[i].id + `" />
        //                             <div class="col-md-5 mt-3">
        //                                 <div class=" form-group form">
        //                                     <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" aria-autocomplete="off" value=" ` + dados[i].titulo + `" /> required>
        //                                     <label for="txtTitulo" class="label-input">
        //                                         <span class="content-input">Título</span>
        //                                     </label>
        //                                 </div>
        //                             </div>

        //                             <div class="col-md-4 mt-3">
        //                                 <label for="txtSlug">Slug</label>
        //                                 <input type="text" id="txtSlug" name="txtSlug" class="form-control" placeholder="titulo-aqui" value=" ` + dados[i].slug + `" />
        //                             </div>

        //                             <div class="col-md-3 mt-3">
        //                                 <label for="slCategoria">Categoria</label>
        //                                 <select name="slCategoria" id="slCategoria" class="form-control receitaCate">
        //                                     <option value=" ` + dados[i].id + `"> ` + dados[i].titulo + `</option>
        //                                 </select>
        //                             </div>
        //                         </div>

        //                         <div class="row">
        //                             <div class="col-md-12 mt-3">
        //                                 <label for="txtLinhaFina">Linha fina</label>
        //                                 <input type="text" id="txtLinhaFina" name="txtLinhaFina" class="form-control" placeholder="Descreva a receita" minlength="10" maxlength="250" value=" ` + dados[i].linha_fina + ` />
        //                             </div>
        //                         </div>

        //                         <div class="row">
        //                             <div class="col-md-12 mt-3">
        //                                 <label for="txtThumb">Thumbnail</label>
        //                                 <input type="text" id="txtThumb" name="txtThumb" class="form-control" placeholder="https://mysite.com/img/img.jpg" minlength="1" maxlength="100" value=" ` + dados[i].thumb + `" />
        //                             </div>
        //                         </div>

        //                         <div class="row">
        //                             <div class="col-md-12 mt-3">
        //                                 <label for="txtDescricao">Conteúdo</label>
        //                                 <textarea id="txtDescricao" name="txtDescricao"> ` + dados[i].descricao + `</textarea>
        //                             </div>
        //                         </div>

        //                         <div class="row mt-3">
        //                             <div class="col-12 col-md-12 text-right">
        //                                 <input type="submit" name="editar" value="Alterar" class="editar btn btn-success w-100">
        //                             </div>
        //                         </div>
        //                     </div>

        //                         <button class="btn btn-info btn-block btn-update"> Salvar </button>
        //                     </form>
        //                 `

        //                 $('.modal-body').append(receita)
        //             }
        //             $('#modalReceita').modal('show')
        //             $('body').append('<script src="client/receitasMVC/receita/controller/updateReceita.js"></script>')
        //         }
        //     })
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