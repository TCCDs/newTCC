$(document).ready(function() {

    $('#CPF_CLIENTES').mask('999.999.999 - 99')
    $('#RG_CLIENTES').mask('99.999.999-9')
    $('#CELULAR_CLIENTES').mask('(99) 99999-9999')
    $('#DATA_NASCIMENTO_CLIENTES').mask('99/99/9999')

    $('#CEP_CLIENTES').cep();


})