<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\model\ReceitaModel;

class HomeController extends Controller
{
    public function index()
    {
        $receitaModel = new ReceitaModel();

        $receitas = [
            $receitaModel->lerPorCategoriaLimit(1, 10),
            $receitaModel->lerPorCategoriaLimit(2, 10),
            $receitaModel->lerPorCategoriaLimit(3, 10)
        ];
        $this->load('home/main', ['listaReceitas' => $receitas]);
    }
}
