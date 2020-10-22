<?php
require_once('..\..\vendor\autoload');
require_once('.\app\config/global');
require_once('.\app\functions\functions');

use app\core\Router;
(new Router());


/*
    # CONFIGURAR UTILIZAÇÃO DO HTTPS
    # RewriteEngine On
    # RewriteCond %{HTTP:X-Forwarded-Proto} !https
    # RewriteRule ^(.*)$ https://supermercadocaravelas.com.br/client/receitas/ [R,L]
*/