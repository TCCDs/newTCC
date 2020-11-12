$(document).ready(function() {
    $('.fornecedores').empty()

    var url = "administration/form/formProdutos/model/FormProductsFornecedores.php"

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        success: function(dados) {
            for (var i = 0; i < dados.length; i++) {
                formProductsFornecedores = `
                    <option value=" ` + dados[i].ID_FORNECEDORES + `"> ` + dados[i].NOME_FANTASIA_FORNECEDORES + `</option>
                `
                $('.fornecedores').append(formProductsFornecedores)
            }
        } 
    })
})