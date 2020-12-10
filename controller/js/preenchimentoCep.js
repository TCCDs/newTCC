$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#ENDERECO_CLIENTES").val("");
        $("#BAIRRO_CLIENTES").val("");
        $("#CIDADE_CLIENTES").val("");
        $("#ESTADO_CLIENTES").val("");
    }
    
    //Quando o campo cep perde o foco.
    $("#CEP_CLIENTES").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#ENDERECO_CLIENTES").val("...");
                $("#BAIRRO_CLIENTES").val("...");
                $("#CIDADE_CLIENTES").val("...");
                $("#ESTADO_CLIENTES").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#ENDERECO_CLIENTES").val(dados.logradouro);
                        $("#BAIRRO_CLIENTES").val(dados.bairro);
                        $("#CIDADE_CLIENTES").val(dados.localidade);
                        $("#ESTADO_CLIENTES").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});