<?php
    session_start();

    if(!empty($_SESSION['ID_USUARIOS'])):
        //echo "<a href='sair.php'>Sair</a>";
    else:
        header("Location: ./index.html");	
    endif;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel de controle</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="components/libs/MaterialDesign/css/materialdesignicons.css">
    <link rel="stylesheet" href="components/libs/sweetalert2/dist/sweetalert2.css">
    <link rel="stylesheet" href="components/css/login.css">
    <link rel="stylesheet" href="components/css/menuslide.css">

</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <nav class="navbar navbar-dark bg-menu">
            <button class="navbar-toggler" id="show-sidebar" type="button">
                <span class="navbar-toggler-icon "></span>
            </button>
            <a class="navbar-brand md-block" href="#">
                <img src="img/caravelas.png" width="30" height="30" class="d-inline-block align-top img-user" alt="" loading="lazy">
            </a>
        </nav>
        <div class="hiden">
        <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="menu-superior">
                    <div class="sidebar-brand">
                        <div id="close-sidebar">
                            <i class="mdi mdi-close text-white"></i>
                        </div>
                    </div>

                    <div class="sidebar-header" id="sidebar-header">
                        <div class="col-12 col md-12 text-center">
                            <img class="img-fluid  avatar-menu" src="img/avatar.png" alt="">
                        </div>
                    </div>
             </div>
     

                <div class="sidebar-menu mt-2">
                    <ul>
                        <li class="lista">
                            <a class="btn  text-left home">Home</a>
                        </li>
                        <!-- <li class="lista">
                            <a class="btn produtos-adm text-left produtos-cliente">Produtos</a>
                        </li> -->
                        <li class="lista">
                            <a class="btn text-left comprarProduto-cliente">Comprar</a>
                        </li>
                        <!-- <li class="">
                            <a class="btn text-left payment">Pagamento</a>
                        </li> -->
                        <li class="lista text-danger">
                            <a class="btn fornecedor-adm text-left historico-cliente">Histórico</a>
                        </li>
                        <li class="lista">
                            <a class="btn historico-adm text-left credito-cliente">Crédito</a>
                        </li>
                        <!-- <li class="lista">
                            <a class="btn historico-adm text-left ctr-cliente">Perfil</a>
                        </li> -->

                        <li class="">
                            testes
                        </li>

                        <li class="lista">
                            <a class="btn historico-adm text-left leitorQrProdutos">ler qr</a>
                        </li>
                        <li class="lista">
                            <a class="btn historico-adm text-left testeLeitor">ver Produtos</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-footer logout">
                <a href="#">
                    <i class="mdi mdi-power"></i>
                </a>
            </div>
        </nav>
        </div>
       
        <div class="container">
            <div class="row text-center mt-4 saldo">
                <div class="col-6 col-md-6">
                    <small>Saldo</small>
                    <h4 class="saldo-cliente-principal"> </h4>
                </div>
                <div class="col-6 col-md-6 credito-cliente ">
                    <h4><i class="mdi mdi-square-inc-cash text-success "></i></h4>
                    <small>Adicionar</small>
                </div>
            </div>
            <div id="conteudo"></div>
            <div class="fixed-bottom">
                <div class="menu">
                    <div class="row text-center">
<<<<<<< HEAD
                        <div class="col-6 mt-3 border-right offer">
=======
                        <div class="col-6 mt-3 border-right">
                            <button class=" btn offer">
>>>>>>> 10ab2d3a3da0333d4a036cf67a70cfa5716ed349
                            <h1><i class="mdi mdi-check-decagram text-light"></i></h1>
                            <h5>Ofertas do dia</h5>
                        </div>
                        <div class="col-6 mt-3 ">
                            <button class=" btn comprarProduto-cliente">
                            <h1><i class="mdi mdi-cart-plus text-light "></i></h1>
                        <h5>Comprar</h5>
                        </button>
                        </div>
                    </div>
                    <div class="row text-center ">
                        <div class="col-6 mt-3 border-right receitas">
                            <h1><i class="mdi mdi-book-open text-light "></i></h1>
                            <h5>receitas</h5>
                        </div>
                        <div class="col-6 mt-3">
                            <h1><i class="mdi mdi-help text-light "></i></h1>
                            <h5>Ajuda</h5>
                        </div>
                    </div>
                </div>
                <div class=" row  menu-rodape text-center">
                    <div class="col-3 col-md-3">
                        <h4><i class="mdi mdi-hamburger text-light produtos-cliente"></i></h4>
                        <small class="text-light"> Produtos</small>
                    </div>
                    <div class="col-3 col-md-3 home">
                        <h4><i class="mdi mdi-home text-light "></i></h4>
                        <small class="text-light">Home</small>
                    </div>
                    <div class="col-3 col-md-3 credito-cliente">
                        <h4><i class="mdi mdi-cash text-light "></i></h4>
                        <small class="text-light">Adicionar</small>
                    </div>
                    <div class="col-3 col-md-3 ctr-cliente">
                        <h4><i class="mdi mdi-account text-light "></i></h4>
                        <small class="text-light">Perfil</small>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <script src="components/libs/sweetalert2/dist/sweetalert2.js"></script>
        <script src="controller/js/function-menu.js"></script>
        <script src="client/navUsers/controller/nav.js"></script>
        <script src="client/customers/controller/saldoClientePrincipal.js"></script>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</body>

</html>