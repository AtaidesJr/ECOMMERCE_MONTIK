<?php

namespace app\database\models;

use app\database\Conexao;
use PDO;

class VariacaoModel
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }


    public function criar($produto_id, $nome, $preco)
    {

        $pdo = $this->conexao->conectar();

        $query = 'INSERT INTO variacoes (produto_id, nome, preco) VALUES (:produto_id, :nome, :preco)';
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':produto_id', $produto_id);
        $stmt->bindValue(':nome',       $nome);
        $stmt->bindValue(':preco',      $preco);

        return $stmt->execute();
    }
}
