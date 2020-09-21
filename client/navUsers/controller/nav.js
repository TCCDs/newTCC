$(document).ready(function() {
    $('tbody').empty()

    var url = "client/navUsers/model/nav.php"

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
                                    <strong> ` + dados[i].NOME_CLIENTES + ` </strong>
                                </span>
                            </div>
                        </div>
                        <div class="row mt-3 text-white">
                            <div class="col-6 col-md-6">
                                <span class="user-role">Cliente</span>
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