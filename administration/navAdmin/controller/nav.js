$(document).ready(function() {
    $('#sidebar-header').empty()

    var url = "administration/navAdmin/model/nav.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                let nav = `
                        <div class="row mt-3 text-white">
                            <div class="col-12 col-md-12">
                                <span class="user-name">
                                    <strong> ` + dados[i].NOME_ADMINISTRADOR + ` </strong>
                                </span>
                            </div>
                        </div>
                        <div class="row mt-3 text-white">
                            <div class="col-6 col-md-6">
                                <span class="user-role">Administrador</span>
                            </div>
                        
                            <div class="col-6 col-md-6">
                                <span class="user-status">
                                    <i class="mdi mdi-circle text-success"></i>
                                <span>Online</span>
                            </div>
                        </div>
                        `
                $('#sidebar-header').append(nav)
            }
        }
    })
})