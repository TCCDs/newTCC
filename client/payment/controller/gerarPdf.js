function funcao_pdf() {
    var pegar_dados = document.getElementById('dadosCupom').innerHTML;
    var janela = window.open('','','width=800, height=600');
    janela.document.write('<html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><title>Cupom Fiscal</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"><link rel="stylesheet" href="components/libs/MaterialDesign/css/materialdesignicons.css"><link rel="stylesheet" href="components/libs/sweetalert2/dist/sweetalert2.css"><link rel="stylesheet" href="components/css/login.css"><link rel="stylesheet" href="components/css/menuslide.css"></head>');
    janela.document.write('<body>');
    janela.document.write(pegar_dados);
    janela.document.write('</body></html>');
    janela.document.close();
    janela.print();
}