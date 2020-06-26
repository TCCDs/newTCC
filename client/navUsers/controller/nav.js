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
                        <div class="user-info">
                            <span class="user-name">
                                <strong> ` + dados[i].NOME_CLIENTES + ` </strong>
                            </span>

                            <span class="user-role">CLiente</span>

                            <span class="user-status">
                                <i class="mdi mdi-circle"></i>
                                <span>Online</span>
                            </span>
                        </div>
                    `
                $('#sidebar-header').append(nav)
            }
        }
    })
})