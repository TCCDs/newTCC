$(document).ready(function() {
    $('.marcas').empty()

    var url = "administration/marca/model/marcaAdministration.php"

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
                let marca = `
                <div class="row ml-2">
                    <div class="mt-3 mr-2 col-12 col-md-2">
                        <div class="card" style="width: 20em;  height: 25rem;">
                            <div class="card-body">
                                    <h5 class="card-title text-dark">` + dados[i].NOME_MARCA + `</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><div class="row mt-2"><div class="col-12 col-md-12"><span><strong>Código da marca</strong><span/></div><div class="col-12 col-md-12 mt-2">` + dados[i].CODIGO_MARCA + `</div></div></li>
                                        <li class="list-group-item"><button id="` + dados[i].ID_MARCA + `" class="btn  btn-block btn-primary btn-sm btn-view-marcas"> <i class="mdi mdi-eye mdi-18px "></i> </button>
                                        </li>
                                        <li class="list-group-item"> <button id="` + dados[i].ID_MARCA + `" class="btn btn-block btn-warning btn-sm btn-edit-marcas"> <i class="mdi mdi-pencil mdi-18px"></i> </button>
                                        </li>
                                        <li class="list-group-item"> <button id="` + dados[i].ID_MARCA + `" class="btn btn-block btn-danger btn-sm btn-delete"> <i class="mdi mdi-delete mdi-18px"></i> </button>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
                `
                $('.marcas').append(marca)
            }
            $('body').append('<script src="administration/marca/controller/viewmarcaAdministration.js"></script>')
            $('body').append('<script src="administration/marca/controller/editmarcaAdministration.js"></script>')
            $('body').append('<script src="administration/marca/controller/deletemarcaAdministration.js"></script>')
            $('body').append('<script>$(".marca-add").click(function(){ $("#conteudo").load("administration/form/formMarca/view/formBrands.html")})</script>')

        }
    })
})