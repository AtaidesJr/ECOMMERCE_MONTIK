<?php

namespace app\controllers\produto;

use app\database\models\ProdutoModel;
use app\database\models\VariacaoModel;
use app\database\models\EstoqueModel;
use app\Library\View;

class ProdutoController
{

    public function index()
    {
        $produtoModel  = new ProdutoModel();

        $produtos = $produtoModel->listarTodos();

        $viewInstance = new View();
        $viewInstance->renderizar('/produto/listar', ['produtos' => $produtos]);
    }

    public function formCadastrar()
    {

        $viewInstance = new View();
        $viewInstance->renderizar('/produto/form_cadastrar');
    }


    public function cadastrarProduto()
    {

        $nome         = $_POST['nome'] ?? '';
        $preco        = $_POST['preco'] ?? 0;
        $estoqueBase  = $_POST['estoque_base'] ?? 0;

        $produtoModel  = new ProdutoModel();
        $estoqueModel  = new EstoqueModel();

        // Cria o produto
        $produtoId = $produtoModel->criar($nome, $preco);

        // Adiciona estoque base
        $estoqueModel->adicionar($produtoId, null, $estoqueBase);

        $_SESSION['sucesso'] = "Dados cadastrados com sucesso!";
        header('location:/');
        exit;
    }

    public function editarProduto()
    {

        $produtoId    = $_POST['produto_id'] ?? null;
        $nome         = $_POST['nome'] ?? '';
        $preco        = $_POST['preco'] ?? 0;
        $estoqueBase  = $_POST['estoque_base'] ?? 0;

        // Atualiza produto
        $produtoModel = new ProdutoModel();
        $produtoModel->editar($produtoId, $nome, $preco);

        // Atualiza estoque base 
        $estoqueModel = new EstoqueModel();
        $estoqueModel->atualizarEstoque($produtoId, $estoqueBase);

        $_SESSION['sucesso'] = "Dados atualizado com sucesso!";
        header('location:/');
        exit;
    }
}
