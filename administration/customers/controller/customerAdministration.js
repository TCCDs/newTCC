$(document).ready(function() {
    $('.customers').empty()

    var url = "administration/customers/model/customerAdministration.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let cliente = `
                <div class="row ml-2">
                    <div class="mt-3 mr-2 col-12 col-md-2">
                        <div class="card" style="width: 20em;  height: 45rem;">
                            <div class="card-body">
                                    <h5 class="card-title text-dark">` + dados[i].NOME_CLIENTES + `</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Nome do cliente<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].NOME_CLIENTES + `</div></div></li>
                                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>CPF do cliente<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].CPF_CLIENTES + `</div></div></li>
                                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Data de nascimento<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].DATA_NASCIMENTO_CLIENTES + `</div></div></li>
                                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Celular<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].CELULAR_CLIENTES + `</div></div></li>
                                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span>Email do cliente<span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].EMAIL_CLIENTES + `</div></div></li>
                                        <li class="list-group-item"><button id="` + dados[i].ID_CLIENTES + `" class="btn  btn-block btn--primary btn-sm btn-view-clientes"> <i class="mdi mdi-eye mdi-18px "></i> </button>
                                        </li>
                                        <li class="list-group-item"> <button id="` + dados[i].ID_CLIENTES + `" class="btn btn-block btn-warning btn-sm btn-edit-clientes"> <i class="mdi mdi-pencil mdi-18px"></i> </button>
                                        </li>
                                        <li class="list-group-item"> <button id="` + dados[i].ID_CLIENTES + `" class="btn btn-block btn-danger btn-sm btn-delete"> <i class="mdi mdi-delete mdi-18px"></i> </button>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
                `
                $('.customers').append(cliente)
            }
            $('body').append('<script src="administration/customers/controller/viewClientAdministration.js"></script>')
            $('body').append('<script src="administration/customers/controller/editClientAdministration.js"></script>')
            $('body').append('<script src="administration/customers/controller/deleteClientAdministration.js"></script>')
            $('body').append('<script>$(".clientes-add").click(function(){ $("#conteudo").load("administration/form/formClientes/view/formClient.html")})</script>')

        }
    })
})