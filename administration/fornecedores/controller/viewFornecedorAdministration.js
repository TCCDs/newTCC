$(document).ready(function() {
    $('.btn-view-fornecedores').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal-footer').empty()

        var url = "administration/fornecedores/model/viewFornecedoresAdministration.php"

        function adicionaZero(numero) {
            if (numero <= 9)
                return "0" + numero;
            else
                return numero;
        }

        var dados = 'ID_FORNECEDORES='
        dados += $(this).attr('id')

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: dados,
            url: url,
            success: function(dados) {
                for (var i = 0; dados.length > i; i++) {
                    let dataAtual2 = new Date(dados[i].data);
                    let dataAtualFormatada2 = (adicionaZero(dataAtual2.getDate().toString()) + "/" + (adicionaZero(dataAtual2.getMonth() + 1).toString()) + "/" + dataAtual2.getFullYear());

                    let fornecedores = `
                        <p> Data de nascimento: ` + dados[i].dataAtualFormatada2 + ` </p>
                        <p> Celular: ` + dados[i].CELULAR_FORNECEDORES + ` </p>
                        <p> Nacionalidade: ` + dados[i].NACIONALIDADE_FORNECEDORES + ` </p>
                        <p> Sexo: ` + dados[i].SEXO_FORNECEDORES + ` </p>
                        <p> Cep: ` + dados[i].CEP_FORNECEDORES + ` </p>
                        <p> Estado: ` + dados[i].ESTADO_FORNECEDORES + ` </p>
                        <p> Endereco: ` + dados[i].ENDERECO_FORNECEDORES + ` </p>
                        <p> Número: ` + dados[i].NUMERO_FORNECEDORES + ` </p>
                        <p> Cidade: ` + dados[i].CIDADE_FORNECEDORES + ` </p>
                        <p> Bairro: ` + dados[i].BAIRRO_FORNECEDORES + ` </p>
                        <p> Complemento: ` + dados[i].COMPLEMENTO_FORNECEDORES + ` </p>
                    `

                    $('.modal-title').append(dados[i].NOME_FANTASIA_FORNECEDORES)
                    $('.modal-body').append(fornecedores)
                }
                $('#modalContato').modal('show')
            }
        })
    })
})