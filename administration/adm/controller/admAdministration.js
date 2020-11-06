$(document).ready(function() {
    $('.adm').empty()

    var url = "administration/adm/model/admAdministration.php"

    function adicionaZero(numero){
        if (numero <= 9) 
            return "0" + numero;
        else
            return numero; 
    }


    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let dataAtual2 = new Date(dados[i].data);
                let dataAtualFormatada2 = (adicionaZero(dataAtual2.getDate().toString()) + "/" + (adicionaZero(dataAtual2.getMonth()+1).toString()) + "/" + dataAtual2.getFullYear());

                let administration = `
                <div class="row ml-2">
                    <div class="mt-3 mr-2 col-12 col-md-2">
                        <div class="card" style="width: 20em;  height: 47rem;">
                            <div class="card-body">
                                    <h5 class="card-title text-dark">` + dados[i].NOME_ADMINISTRADOR + `</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span><strong>Nome do Admistrador</strong><span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].NOME_ADMINISTRADOR + `</div></div></li>
                                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span><strong>CPF do Admistrador</strong><span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].CPF_ADMINISTRADOR + `</div></div></li>
                                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span><strong>Data de nascimento</strong><span/></div><div class="col-12 col-md-12 mt-2">` + dataAtualFormatada2 + `</div></div></li>
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
                $('.adm').append(administration)
            }
            $('body').append('<script src="administration/adm/controller/viewAdmAdministration.js"></script>')
            $('body').append('<script src="administration/adm/controller/editAdmAdministration.js"></script>')
            $('body').append('<script src="administration/adm/controller/deleteAdmAdministration.js"></script>')
            $('body').append('<script>$(".adm-add").click(function(){ $("#conteudo").load("administration/form/formAdm/view/formAdm.html")})</script>')

        }
    })
})