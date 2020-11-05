$(document).ready(function() {
    $('.administration').empty()

    var url = "administration/adm/model/admAdministration.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let administration = `
                <div class="row ml-2">
                    <div class="mt-3 mr-2 col-12 col-md-2">
                        <div class="card" style="width: 20em;  height: 47rem;">
                            <div class="card-body">
                                    <h5 class="card-title text-dark">` + dados[i].NOME_ADMINISTRADOR + `</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span><strong>Nome do Admistrador</strong><span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].NOME_ADMINISTRADOR + `</div></div></li>
                                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span><strong>CPF do Admistrador</strong><span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].CPF_ADMINISTRADOR + `</div></div></li>
                                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span><strong>Data de nascimento</strong><span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].DATA_NASCIMENTO_ADMINISTRADOR + `</div></div></li>
                                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span><strong>Celular</strong><span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].CELULAR_ADMINISTRADOR + `</div></div></li>
                                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span><strong>Email do Admistrador</strong><span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].EMAIL_ADMINISTRADOR + `</div></div></li>
                                        <li class="list-group-item"><button id="` + dados[i].ID_ADMINISTRADOR + `" class="btn  btn-block btn-primary btn-sm btn-view-adm"> <i class="mdi mdi-eye mdi-18px "></i> </button>
                                        </li>
                                        <li class="list-group-item"> <button id="` + dados[i].ID_ADMINISTRADOR + `" class="btn btn-block btn-warning btn-sm btn-edit-adm"> <i class="mdi mdi-pencil mdi-18px"></i> </button>
                                        </li>
                                        <li class="list-group-item"> <button id="` + dados[i].ID_ADMINISTRADOR + `" class="btn btn-block btn-danger btn-sm btn-delete"> <i class="mdi mdi-delete mdi-18px"></i> </button>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
                `
                $('.administration').append(administration)
            }
            $('body').append('<script src="administration/adm/controller/viewClientAdministration.js"></script>')
            $('body').append('<script src="administration/adm/controller/editClientAdministration.js"></script>')
            $('body').append('<script src="administration/adm/controller/deleteClientAdministration.js"></script>')
            $('body').append('<script>$(".clientes-add").click(function(){ $("#conteudo").load("administration/form/formClientes/view/formClient.html")})</script>')

        }
    })
})