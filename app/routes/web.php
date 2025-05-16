<?php

use app\Library\rotas;

try {

    // Todos os middlewares tem que ser passados na pasta : enums->RotaMiddlewares.php

    $rotas = new Rotas();


    $rotas->group(['prefixo' => 'produto', 'controller' => 'Produto'], function () {
        $this->add('/listar', 'GET', 'ProdutoController:index');
        $this->add('/form_cadastrar', 'GET', 'ProdutoController:formCadastrar');
        $this->add('/cadastrar', 'POST', 'ProdutoController:cadastrarProduto');
        $this->add('/editar', 'POST', 'ProdutoController:editarProduto');
    });

    $rotas->group(['prefixo' => 'carrinho', 'controller' => 'Carrinho'], function () {
        $this->add('/adicionar', 'POST', 'CarrinhoController:adicionaNoCarrinho');
        $this->add('/atualizar', 'POST', 'CarrinhoController:atualizarQuantidade');
        $this->add('/remover', 'POST', 'CarrinhoController:removerProduto');
        $this->add('/visualizar', 'GET', 'CarrinhoController:verCarrinho');
        $this->add('/cep', 'POST', 'CarrinhoController:verificarCep');
    });


    $rotas->add('/', 'GET', 'HomeController:index');

    $rotas->init();
} catch (Exception $e) {
    var_dump($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine());
}
