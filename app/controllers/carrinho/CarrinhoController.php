<?php

namespace app\controllers\carrinho;

use app\library\View;

class CarrinhoController
{
    public function adicionaNoCarrinho()
    {

        // Valida e sanitiza dados do POST
        $produtoId = isset($_POST['produto_id']) ? (int) $_POST['produto_id'] : 0;
        $nome      = isset($_POST['nome']) ? trim($_POST['nome']) : '';
        $preco     = isset($_POST['preco']) ? (float) $_POST['preco'] : 0.0;
        $quant     = isset($_POST['quantidade']) ? (int) $_POST['quantidade'] : 1;

        if ($produtoId <= 0 || $quant <= 0 || $preco < 0 || empty($nome)) {
            die('Dados inválidos do produto');
        }

        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        if (isset($_SESSION['carrinho'][$produtoId])) {
            $_SESSION['carrinho'][$produtoId]['quantidade'] += $quant;
        } else {
            $_SESSION['carrinho'][$produtoId] = [
                'nome'       => $nome,
                'preco'      => $preco,
                'quantidade' => $quant
            ];
        }

        // Redireciona para a rota do carrinho
        header('Location: /carrinho/visualizar');
        exit;
    }

    public function verificarCep()
    {
        $cep = isset($_POST['cep']) ? preg_replace('/\D/', '', $_POST['cep']) : '';

        if (strlen($cep) !== 8) {
            $_SESSION['error'] = "CEP inválido";
            header('Location: /carrinho/visualizar');
            exit;
        }

        $url = "https://viacep.com.br/ws/{$cep}/json/";

        $response = file_get_contents($url);
        if ($response === false) {
            $_SESSION['error'] = "Erro ao consultar o CEP";
            header('Location: /carrinho/visualizar');
            exit;
        }

        $dados = json_decode($response, true);
        if (isset($dados['erro'])) {
            $_SESSION['error'] = "CEP não encontrado";
            header('Location: /carrinho/visualizar');
            exit;
        }

        // $_SESSION['endereco'] = $dados;

        $_SESSION['sucesso'] = "CEP não encontrado";
        header('Location: /carrinho/visualizar');
        exit;
    }


    public function verCarrinho()
    {
        $itens = $_SESSION['carrinho'] ?? [];
        $subtotal = $this->calcularTotal($itens);
        $frete = $this->calcularFrete($subtotal);
        $total = $subtotal + $frete;

        $view = new View();
        $view->renderizar('/carrinho/produtos', [
            'itens'    => $itens,
            'subtotal' => $subtotal,
            'frete'    => $frete,
            'total'    => $total
        ]);
    }

    public function atualizarQuantidade()
    {
        $produtoId = isset($_POST['produto_id']) ? (int) $_POST['produto_id'] : 0;
        $quantidade = isset($_POST['quantidade']) ? (int) $_POST['quantidade'] : 1;

        if ($produtoId <= 0 || $quantidade <= 0) {
            die('Dados inválidos para atualização');
        }

        if (isset($_SESSION['carrinho'][$produtoId])) {
            $_SESSION['carrinho'][$produtoId]['quantidade'] = $quantidade;
        }

        header('Location: /carrinho/visualizar');
        exit;
    }


    public function removerProduto()
    {
        $produtoId = isset($_POST['produto_id']) ? (int) $_POST['produto_id'] : 0;

        if ($produtoId <= 0) {
            die('Produto inválido para remoção');
        }

        if (isset($_SESSION['carrinho'][$produtoId])) {
            unset($_SESSION['carrinho'][$produtoId]);
        }

        header('Location: /carrinho/visualizar');
        exit;
    }


    private function calcularTotal(array $itens): float
    {
        $total = 0;
        foreach ($itens as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }
        return $total;
    }


    private function calcularFrete(float $subtotal): float
    {
        if ($subtotal >= 52.00 && $subtotal <= 166.59) {
            return 15.00;
        }
        if ($subtotal > 200.00) {
            return 0.00;
        }
        return 20.00;
    }
}
