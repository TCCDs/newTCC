<?php
    session_start();

    if(!empty($_SESSION['ID_USUARIOS'])):
        //echo "<a href='sair.php'>Sair</a>";
    else:
        header("Location: ./index.php");	
    endif;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel de controle</title>

    <link rel="stylesheet" href="components/css/bootstrap.min.css">
    <link rel="stylesheet" href="components/libs/MaterialDesign/css/materialdesignicons.css">
    <link rel="stylesheet" href="components/libs/sweetalert2/dist/sweetalert2.css">
    <link rel="stylesheet" href="components/css/login.css">
    <link rel="stylesheet" href="components/css/menuslide.css">
    <link rel="icon" href="img/caravelas.png" type="image/icon type">


   <link rel="stylesheet" href="public/vendor/summernote/summernote-bs4.min.css">

</head>

<body>
<nav class="navbar navbar-expand-lg nav-receita " id="nav-receita">
<img src="public/img/logo.png" alt="My Receitas" width="30" height="30" />
    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="mdi mdi-menu text-light"></span>
    </button>
    <div id="my-nav" class="collapse navbar-collapse">
    <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link home">Voltar às compras</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link categoria">Categorias</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link receita">Receitas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link sobre">Sobre</a>
                </li>

            </ul>
            <div class="row">
                    <form class="form-inline my-2 my-lg-0" action="" method="POST">
                        <div class="col-12">
                            <input class="form-pesquisa mr-2" type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar" minlength="2" required>
                            <button class="btn btn-pesquisar my-2 my-sm-0" type="button">Pesquisar</button>
                        </div>
                    </form>
            </div>
        
    </div>
</nav>
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
                    <div class="col-12 col-md-12 text-center">
                        <img class="img-fluid  avatar-menu" src="img/avatar.png" alt="">
                    </div>
                </div>
            </div>
            
                <div class="sidebar-menu mt-2">
                    <ul>
                        <li class="lista">
                            <a class="btn text-left home">Home</a>
                        </li>

                        <li class="lista">
                            <a class="btn text-left comprarProduto-cliente">Comprar</a>
                        </li>
            
                        <li class="lista">
                            <a class="btn fornecedor-adm text-left historico-cliente">Histórico</a>
                        </li>
                        <li class="lista">
                            <a class="btn historico-adm text-left credito-cliente">Crédito</a>
                        </li>

                        <li class="lista">
                            <a class="btn historico-adm text-left tax">Cupom</a>
                        </li>

                        <li class="lista">
                            <a class="btn historico-adm text-left leitorQrProdutos">ler qr</a>
                        </li>
                        
                        <li class="lista">
                            <a class="btn historico-adm text-left testeLeitor">Ver Produtos</a>
                        </li>

                        <li class="lista">
                            <a class="btn historico-adm text-left receitasMVC">Receitas</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-footer logout">
                <a href="login/model/sair.php">
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
            <div id="conteudo mb-5">

            </div>
        
            <div class="fixed-bottom">
                <div class="menu">
                    <div class="row text-center">
                        <div class="col-6 mt-3 border-right offer">
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
                <div class=" row  menu-rodape text-center" id="menu-rodape">
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

        
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
   

        <script src="components/js/jquery-3.4.1.min.js"></script>
        <script src="components/js/bootstrap.js"></script>
        <script src="components/js/bootstrap.min.js"></script>
        <script src="components/js/Chart.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="public/vendor/summernote/summernote-bs4.min.js"></script>

        <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <script src="components/libs/sweetalert2/dist/sweetalert2.js"></script>

        <script src="controller/js/function-menu.js"></script>
        <script src="client/navUsers/controller/nav.js"></script>
        <script src="client/dadosPainelPrincipal/controller/saldoCliente.js"></script>

</body>

</html>