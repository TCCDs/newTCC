$(document).ready(function() {
    $('.marca').empty()

    var url = "administration/form/formProdutos/model/FormProductsMarca.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                formProductsMarca = `
                    <option value=" ` + dados[i].ID_MARCA + `"> ` + dados[i].NOME_MARCA + `</option>
                `
                $('.marca').append(formProductsMarca)
            }
        } 
    })
})