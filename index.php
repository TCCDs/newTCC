<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login do Usuário</title>
    <link rel="stylesheet" href="components/css/bootstrap.css">
    <link rel="stylesheet" href="components/libs/MaterialDesign/css/materialdesignicons.css">
    <link rel="stylesheet" href="components/libs/sweetalert2/dist/sweetalert2.css">
    <link rel="stylesheet" href="components/css/login.css">
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 ladoA d-none d-md-block">
                <div class=" text-center">
                    <img src="img/carrinho.png" class="img-carrinho " alt="Login" srcset="">
                </div>
                <h1 class="login-text text-center mt-3">Login</h1>
                <h4 class="mt-3 text-center text-white mt-3">Sistema de Auto pagamento para estabelecimentos.</h4>
                <h5 class="mt-3 text-center text-white">Agilize suas compras e ganhe tempo, evitando filas em caixas e facite seu pagamento.</h5>
                <h6 class="supermer mt-4 text-center">Equipe Supermercado Caravelas!</h6>
            </div>
            <div class="col-12 ladoC d-sm-none d-block">
                <div class=" text-center mt-4">
                    <img src="img/carrinho.png" class="img-carrinho " alt="Login" srcset="">
                </div>
            </div>
            <div class="col-12 col-md-8 ladoB">
                <div class="tudo">
                    <h3 class="text-center ">Login</h3>
                    <hr>
                    <div class="mt-2 text-center">
                        <h2 class="login"> Login </h2>
                        <h2 class="inscreva">Inscreva-se</h2>
                        <!-- <a href="recuperar/index.php">Recuperar Senha</a> -->
                        <h2 class="recuperar">Recuperar Senha</h2>
                    </div>
                    <div id="conteudo">
                        <form action="" id="form-login">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class=" form-group form">
                                        <input type="text" name="LOGIN_USUARIOS" id="LOGIN_USUARIOS" aria-autocomplete="off" required>
                                        <label for="LOGIN_USUARIOS" class="label-input">
                                                <span class="content-input">Login do Usuário</span>
                                            </label>
                                    </div>
                                    <div class=" form-group form">
                                        <input type="password" name="SENHA_USUARIOS" id="SENHA_USUARIOS" aria-autocomplete="off" required>
                                        <label for="SENHA_USUARIOS" class="label-input">
                                                <span class="content-input">Digite sua senha</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row text-right">
                                <div class="col-12 col-md-12">
                                    <small><i id="show_password" name="show_password" class="show mdi mdi-eye ml-2"> Mostrar senha</i>
                                    </small>
                                </div>
                            </div>
                            <button class="btn btn-block btn-login mt-2">Verificar</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="components/js/jquery-3.4.1.min.js"></script>
    <script src="components/js/bootstrap.js"></script>
    <script src="components/libs/sweetalert2/dist/sweetalert2.js"></script>
    <script src="login/controller/validacao.js"></script>
    <script src="controller/js/function-menu.js"></script>
</body>
</html>