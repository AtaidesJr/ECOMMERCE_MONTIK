<?php

namespace app\database\models;

use app\database\Conexao;
use PDO;

class EstoqueModel
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }


    public function adicionar($produto_id, $variacao_id = null, $quantidade)
    {

        $pdo = $this->conexao->conectar();

        $query = 'INSERT INTO estoques (produto_id, variacao_id, quantidade) VALUES (:produto_id, :variacao_id, :quantidade)';
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':produto_id',  $produto_id);
        $stmt->bindValue(':variacao_id', $variacao_id);
        $stmt->bindValue(':quantidade',  $quantidade);

        return $stmt->execute();
    }

    public function atualizarEstoque($produto_id, $quantidade)
    {

        $pdo = $this->conexao->conectar();

        $query = "UPDATE estoques SET quantidade = :quantidade WHERE produto_id = :produto_id AND variacao_id IS NULL";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':produto_id',  $produto_id);
        $stmt->bindValue(':quantidade',  $quantidade);

        return $stmt->execute();
    }

    public function reduzir($produto_id, $quantidade)
    {
        $pdo = $this->conexao->conectar();

        $sql = 'UPDATE estoques SET quantidade = quantidade - :quantidade WHERE produto_id = :produto_id AND variacao_id IS NULL';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':quantidade', $quantidade);
        $stmt->bindValue(':produto_id', $produto_id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
