<?php

namespace apps\site\controller;
use apps\core\Controller;

class SobreController extends Controller
{
    public function index(){
        $this->load('sobre/main');
    }
}
