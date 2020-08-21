<?php

session_start();
unset($_SESSION['ID_USUARIOS'], $_SESSION['LOGIN_USUARIOS']);

$_SESSION['msg'] = "Deslogado com sucesso";
header("Location: ../view/index.html");