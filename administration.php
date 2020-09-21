<?php
/* session_start();

    if(!empty($_SESSION['ID_USUARIOS'])):
        //echo "<a href='sair.php'>Sair</a>";
    else:
        header("Location: ./index.html");	
    endif;  */
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
            <nav id="sidebar" class="sidebar-wrapper">
                <div class="sidebar-content">
                    <div class="sidebar-brand">
                        <a href="#">Painel do cliente</a>
                        <div id="close-sidebar">
                            <i class="mdi mdi-close"></i>
                        </div>
                    </div>

                    <div class="sidebar-header" id="sidebar-header">
                        <div class="user-pic">
                            <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
                        </div>
                        <div class="user-info">
                            <span class="user-name">Nome
                            <strong>User</strong>
                        </span>
                            <span class="user-role">Administrator</span>
                            <span class="user-status">
                            <i class="mdi mdi-circle"></i>
                            <span>Online</span>
                            </span>
                        </div>
                    </div>
                    <div class="sidebar-menu">
                        <ul>
                            <li class="">
                                <a class="btn  text-left home">Home</a>
                            </li>
                            <li class="">
                                <a class=" btn produtos-adm text-left">Produtos</a>
                            </li>
                            <li class="">
                                <a class="btn ctr-adm text-left">Clientes</a>
                            </li>
                            <li class="">
                                <a class="btn fornecedor-adm text-left">Fornecedores</a>
                            </li>
                            <li class="">
                                <a class="btn marca-adm text-left">Marcas</a>
                            </li>
                            <li class="">
                                <a class="btn historico-adm text-left">Histórico</a>
                            </li>
                            <li class="">
                                <a class="btn formUser-administration text-left">Cadastro User</a>
                            </li>
                            <li class="">
                                <a class="btn formUser-administration text-left">Administradores</a>
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

            <!-- sidebar-wrapper  -->
            <div id="conteudo" class="container mt-4 text-center">
                <div class="row">
                    <div class="col-12 div col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Clientes</h5>
                                <hr>
                                <small class="totalClientes">605</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 div col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Fornecedores</h5>
                                <hr>
                                <small class="totalFornecedores">45</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 div col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Vendas</h5>
                                <hr>
                                <small class="totalVendas">26</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 div col-md-4 menuNav">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Produtos</h5>
                                <hr>
                                <small class="totalProdutos">605</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 div col-md-4 menuNav">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Marca</h5>
                                <hr>
                                <small class="totalMarca">605</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 div col-md-4 menuNav">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Última Venda</h5>
                                <hr>
                                <small class="ultimaVendas">26/08/2020 15:05:15</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3 text-center">
                    <div class="col-12 col-md-4">
                        <h5>Lucro Semanal</h5>
                        <img class="img-fluid" src="img/graficos.png" alt="">
                        <hr>
                        <small class="text-right">42%</small>
                    </div>

                    <div class="col-12 col-md-4">
                        <h5>Lucro Mensal</h5>
                        <img class="img-fluid" src="img/graficos.png" alt="">
                        <hr>
                        <small class="text-right">42%</small>
                    </div>

                    <div class="col-12 col-md-4">
                        <h5>Lucro Anual</h5>
                        <img class="img-fluid" src="img/graficos.png" alt="">
                        <hr>
                        <small class="text-right">42%</small>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 col-md-6">
                        <h4>Fornecedores Cadastrados</h4>
                        <table class="table">
                            <thead>
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

                    <div class="col-12 col-md-6">
                        <h4>Clientes Cadastrados</h4>
                        <table class="table">
                            <thead>
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
                <!-- <div class="conteudo">
                <div class="row border-bottom">
                    <div class="col-12">
                        <h3 class="text-dark">Painel do Administrador</h3>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6 col-md-4 mt-2">
                        <button class="btn btn-dark btn-block text-center produtos-adm">
                            <h1> <i class="mdi mdi-hamburger"> </i> </h1>
                            <p>Produtos</p>
                        </button>
                    </div>

                    <div class="col-6 col-md-4 mt-2">
                        <button class="btn btn-dark btn-block text-center ctr-adm">
                            <h1> <i class="mdi mdi-account"> </i> </h1>
                            <p>Clientes</p>
                        </button>
                    </div>

                    <div class="col-6 col-md-4 mt-2">
                        <button class="btn btn-dark btn-block text-center historico-adm">
                            <h1> <i class="mdi mdi-file-document-box-outline"> </i> </h1>
                            <p>Histórico</p>
                        </button>
                    </div>

                    <div class="col-6 col-md-4 mt-2">
                        <button class="btn btn-dark btn-block text-center marca-adm">
                            <h1> <i class="mdi mdi-file-document-box-outline"> </i> </h1>
                            <p>Marca</p>
                        </button>
                    </div>

                    <div class="col-6 col-md-4 mt-2">
                        <button class="btn btn-dark btn-block text-center fornecedores-adm">
                            <h1> <i class="mdi mdi-file-document-box-outline"> </i> </h1>
                            <p>Fornecedores</p>
                        </button>
                    </div>

                    <div class="col-6 col-md-4 mt-2">
                        <button class="btn btn-dark btn-block text-center formProviders-administration">
                            <h1> <i class="mdi mdi-car-estate"> </i> </h1>
                            <p>Formulario Fornecedor</p>
                        </button>
                    </div>

                    <div class="col-6 col-md-4 mt-2">
                        <button class="btn btn-dark btn-block text-center formClient-administration">
                            <h1> <i class="mdi mdi-file-document-box-outline"> </i> </h1>
                            <p>Formulario Clientes</p>
                        </button>
                    </div>

                    <div class="col-6 col-md-4 mt-2">
                        <button class="btn btn-dark btn-block text-center formProducts-administration">
                            <h1> <i class="mdi mdi-car-estate"> </i> </h1>
                            <p>Formulario Produtos</p>
                        </button>
                    </div>

                    <div class="col-6 col-md-4 mt-2">
                        <button class="btn btn-dark btn-block text-center formBrands-administration">
                            <h1> <i class="mdi mdi-briefcase-edit-outline"> </i> </h1>
                            <p>Formulario Marca</p>
                        </button>
                    </div>

                    <div class="col-6 col-md-4 mt-2">
                        <button class="btn btn-dark btn-block text-center formUser-administration">
                            <h1> <i class="mdi mdi-briefcase-edit-outline"> </i> </h1>
                            <p>Formulario Usuarios</p>
                        </button>
                    </div>

                    <div class="col-6 col-md-4 mt-2">
                        <button class="btn btn-dark btn-block text-center verificarCompra-adm">
                            <h1> <i class="mdi mdi-briefcase-edit-outline"> </i> </h1>
                            <p>Verificar Compra</p>
                        </button>
                    </div>
                </div>
            </div> -->
            </div>



            <script src="components/js/jquery-3.4.1.min.js"></script>
            <script src="components/js/bootstrap.js"></script>
            <script src="components/js/bootstrap.min.js"></script>
            <script src="components/libs/jQuery-Mask-Plugin-master/jquery-mask/dist/jquery.mask.js"></script>
            <script src="components/libs/jQuery-cep-Plugin/jquery.cep.min.js"></script>
            <script src="components/libs/sweetalert2/dist/sweetalert2.js"></script>
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
    </body>

    </html>