<?php

namespace app\controllers;

use app\database\models\ProdutoModel;
use app\Library\View;

class HomeController
{
    public function index()
    {

        $produtoModel  = new ProdutoModel();

        $produtos = $produtoModel->listarTodos();

        $viewInstance = new View();
        $viewInstance->renderizar('home', ['produtos' => $produtos]);
    }
}
