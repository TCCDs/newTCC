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
        <link rel="stylesheet" href="components/css/bootstrap.min.css">
        <link rel="stylesheet" href="components/css/bootstrap.css">
        <link rel="stylesheet" href="components/libs/MaterialDesign/css/materialdesignicons.css">
        <link rel="stylesheet" href="components/libs/sweetalert2/dist/sweetalert2.css">
        <link rel="stylesheet" href="components/css/adm.css">
        <link rel="stylesheet" href="components/css/menuslide.css">
        <link rel="stylesheet" href="components/css/graficos.css">
        <link rel="icon" href="img/caravelas.png" type="image/icon type">


    </head>

    <body>
        <div class="page-wrapper chiller-theme toggled">
            <div class="page-wrapper chiller-theme toggled">
        <nav class="navbar navbar-dark bg-menu-adm">
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
                            <img class="img-fluid  avatar-menu" src="img/avatar.png" alt="Avatar">
                        </div>
                    </div>
            </div>
            
                <div class="sidebar-menu mt-2">
                    <ul>
                            <li class="lista">
                                <a class="btn  text-left home">Home</a>
                            </li>
                            <li class="lista">
                                <a class=" btn produtos-adm text-left">Produtos</a>
                            </li>
                            <li class="lista">
                                <a class="btn ctr-adm text-left">Clientes</a>
                            </li>
                            <li class="lista">
                                <a class="btn fornecedor-adm text-left">Fornecedores</a>
                            </li>
                            <li class="lista">
                                <a class="btn marca-adm text-left">Marcas</a>
                            </li>
                            <li class="lista">
                                <a class="btn historico-adm text-left">Histórico</a>
                            </li>
                            <li class="lista">
                                <a class="btn formUser-administration text-left">Cadastro User</a>
                            </li>
                            <li class="lista">
                                <a class="btn formUser-administration text-left">Administradores</a>
                            </li>
                            
                            <li class="lista">
                                <a class="btn verificarCompra-adm text-left">Verificar Compra </a>
                            </li>

                            <li class="lista">
                                <a class="btn text-left receitas">receitas </a>
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


            <!-- sidebar-wrapper  -->
            <div id="conteudo" class="container mt-4 text-center">
                <div class="row">
                    <div class="col-6 div col-md-4 mt-2">
                        <div class="card dados3 ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6  d-none d-sm-block">
                                    <h1 class="display-4 icone bg-secondary text-light"><i class="mdi mdi-account"></i></h1>
                                    </div>
                                    <div class="col-12 col-md-6">
                                    <h4 class="totalClientes">605</h4>
                                <hr>
                                <h6 class="card-title">Clientes</h6>
                                    </div>
                                </div>
       
                            </div>
                        </div>
                    </div>
                    <div class="col-6 div col-md-4 mt-2">
                        <div class="card dados3 ">
                            <div class="card-body">
                            <div class="row">
                                    <div class="col-12 col-md-6  d-none d-sm-block">
                                    <h1 class="display-4 icone bg-primary text-light"><i class="mdi mdi-truck"></i></h1>
                                    </div>
                                    <div class="col-12 col-md-6">
                                    <h4 class="totalFornecedores">45</h4>
                                <hr>
                                <h6 class="card-title">Fornecedores</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 div col-md-4 mt-2">
                        <div class="card dados3">
                            <div class="card-body">
                            <div class="row align-items-center">
                                    <div class="col-12 col-md-6  d-none d-sm-block">
                                    <h1 class="display-4 icone  bg-success text-light"><i class="mdi mdi-cash"></i></h1>
                                    </div>
                                    <div class="col-12 col-md-6 ">
                                    <h4 class="totalVendas">26</h4>
                                <hr>
                                <h6 class="card-title">Vendas</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-6 div col-md-4 mt-2 menuNav">
                        <div class="card dados3">
                            <div class="card-body">
                                <div class="row align-items-center ">
                                    <div class="col-12 col-md-6 d-none d-sm-block">
                                        <h1 class="display-4 icone bg-danger text-light"><i class="mdi mdi-hamburger"></i></h1>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <h5 class="totalProdutos">605</h5>
                                        <hr>
                                        <h6 class="card-title">Produtos</h6>
                                    </div>
                                </div>          
                            </div>
                        </div>
                    </div>

                    <div class="col-6 div col-md-4 mt-2 menuNav">
                        <div class="card dados3">
                            <div class="card-body">
                                <div class="row align-items-center" >
                                    <div class="col-12 col-md-6 d-none d-sm-block  ">
                                        <h1 class="display-4 icone bg-warning text-light"><i class="mdi mdi-tag-heart "></i></h1>
                                    </div>
                                    <div class="col-12 col-md-6">
                                    <h5 class="totalMarca">605</h5>
                                    <hr>
                                    <h6 class="card-title">Marcas</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 div col-md-4 mt-2 menuNav ">
                        <div class="card dados3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6 d-none d-sm-block ">
                                    <h1 class="display-4 icone bg-info text-light"><i class="mdi mdi-clock"></i></h1>
                                    </div>
                                    <div class="col-12 col-md-6">
                                    <h5 class="ultimaVendas">26/08/2020 15:05:15</h5>
                                <hr>
                                <h6 class="card-title">Última Venda</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 text-center grafico2">
                        <div class="col-12 col-md-12 text-left text-white">
                            <h4>Contabilidade</h4>
                            <hr class="bg-white-50">
                        </div>
                        <div class="col-12 col-md-4 mt-2 ">
                                    <div class="graficos" id="chart-container">
                                    <canvas id="graphCanvasVendas"></canvas>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mt-2 ">
                                    <div class="graficos" id="chart-container">
                                    <canvas id="graphCanvasMoedas"></canvas>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 mt-2">
                                    <div  class="graficos"id="chart-container">
                                    <canvas id="graphCanvasLucro"></canvas>
                                </div>
                            </div>
                </div>

                <div class="container">
                <div class="row mt-4 dados5">
                    <div class="col-12 col-md-6">
                        <div class="col-12-col-md-6">
                        <h4 class="text-left text-white">Fornecedores Cadastrados</h4>
                        <hr>
                        </div>
                        <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead class="thead">
                                    <tr>
                                        <th scope="col">Nome </th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Celular</th>
                                    </tr>
                                </thead>
                                <tbody class="listaFornecedoresRapido">
                                    <tr>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <h4 class="text-left text-white">Clientes Cadastrados</h4>
                        <hr>
                        <div class="table-responsive">
                        <table class="table table-borderless">
                        <thead class="thead">
                                <tr>
                                    <th scope="col">Nome </th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Celular</th>
                                </tr>
                            </thead>
                            <tbody class="listaClientesRapido">
                                <tr>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>

    </div>
    </div>

            </div>



            <script src="components/js/jquery-3.4.1.min.js"></script>
            <script src="components/js/bootstrap.js"></script>
            <script src="components/js/bootstrap.min.js"></script>
            <script src="components/libs/jQuery-Mask-Plugin-master/jquery-mask/dist/jquery.mask.js"></script>
            <script src="components/libs/jQuery-cep-Plugin/jquery.cep.min.js"></script>
            <script src="components/libs/sweetalert2/dist/sweetalert2.js"></script>
            <script src="components/js/Chart.min.js"></script>

            <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
            <script src="controller/js/function-menu-adm.js"></script>

            <script src="administration/dadosPanelAdministration/controller/totalClientes.js"></script>
            <script src="administration/dadosPanelAdministration/controller/totalFornecedores.js"></script>
            <script src="administration/dadosPanelAdministration/controller/totalMarca.js"></script>
            <script src="administration/dadosPanelAdministration/controller/totalVendas.js"></script>
            <script src="administration/dadosPanelAdministration/controller/totalProdutos.js"></script>
            <script src="administration/dadosPanelAdministration/controller/ultimaVenda.js"></script>
            <script src="administration/dadosPanelAdministration/controller/listaClienteRapido.js"></script>
            <script src="administration/dadosPanelAdministration/controller/listaFornecedoresRapido.js"></script>
            <script src="administration/graficos/controller/graficoVenda.js"></script>
            <script src="administration/graficos/controller/graficoMoedas.js"></script>
            <script src="administration/graficos/controller/graficoLucro.js"></script>
            <script src="administration/navAdmin/controller/nav.js"></script>
    </body>

    </html>