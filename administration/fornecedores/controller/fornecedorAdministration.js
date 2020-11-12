$(document).ready(function() {
    $('.fornecedores').empty()

    var url = "administration/fornecedores/model/fornecedorAdministration.php"

    function adicionaZero(numero) {
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
                let fornecedor = `
                <div class="row ml-2">
                    <div class="mt-3 mr-2 col-12 col-md-2">
                        <div class="card" style="width: 20em;  height: 32rem;">
                            <div class="card-body">
                                    <h5 class="card-title text-dark">` + dados[i].NOME_FANTASIA_FORNECEDORES + `</h5>
                                    <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span><strong>Razão social</strong><span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].RAZAO_SOCIAL_FORNECEDORES + `</div></div></li>
                                    <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span><strong>CNPJ</strong><span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].CNPJ_FORNECEDORES + `</div></div></li>
                                    <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span><strong>Email</strong><span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].EMAIL_FORNECEDORES + `</div></div></li>
                                        <li class="list-group-item"><button id="` + dados[i].ID_FORNECEDORES + `" class="btn  btn-block btn-primary btn-sm btn-view-fornecedores"> <i class="mdi mdi-eye mdi-18px "></i> </button>
                                        </li>
                                        <li class="list-group-item"> <button id="` + dados[i].ID_FORNECEDORES + `" class="btn btn-block btn-warning btn-sm btn-edit-fornecedores"> <i class="mdi mdi-pencil mdi-18px"></i> </button>
                                        </li>
                                        <li class="list-group-item"> <button id="` + dados[i].ID_FORNECEDORES + `" class="btn btn-block btn-danger btn-sm btn-delete"> <i class="mdi mdi-delete mdi-18px"></i> </button>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
                `
                $('.fornecedores').append(fornecedor)
            }
            $('body').append('<script src="administration/fornecedores/controller/viewFornecedorAdministration.js"></script>')
            $('body').append('<script src="administration/fornecedores/controller/editFornecedorAdministration.js"></script>')
            $('body').append('<script src="administration/fornecedores/controller/deleteFornecedorAdministration.js"></script>')
            $('body').append('<script>$(".fornecedor-add").click(function(){ $("#conteudo").load("administration/form/formFornecedores/view/formProviders.html")})</script>')

        }
    })
})