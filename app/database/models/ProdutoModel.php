<?php

namespace app\database\models;

use app\database\Conexao;
use PDO;

class ProdutoModel
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }


    public function listarTodos()
    {
        $pdo = $this->conexao->conectar();

        $query = "SELECT
                    produtos.id,
                    produtos.nome,
                    produtos.preco,
                    estoques.quantidade
                FROM 
	                produtos INNER JOIN estoques ON produtos.id = estoques.produto_id;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criar($nome, $preco)
    {

        $pdo = $this->conexao->conectar();

        $query = 'INSERT INTO produtos (nome, preco,created_at) VALUES (:nome, :preco, NOW())';
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':nome',  $nome);
        $stmt->bindValue(':preco', $preco);
        $stmt->execute();

        return $pdo->lastInsertId();
    }


    public function editar($id, $nome, $preco)
    {
        $pdo = $this->conexao->conectar();

        $query = 'UPDATE produtos SET nome = :nome, preco = :preco, updated_at = NOW() WHERE id = :id';
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':id',    $id, PDO::PARAM_INT);
        $stmt->bindValue(':nome',  $nome);
        $stmt->bindValue(':preco', $preco);

        return $stmt->execute();
    }

    // public function update($id, $nome, $ramal)
    // {
    //     $pdo = $this->conexao->conectar();

    //     $query = 'UPDATE contatos SET nome=:nome, ramal=:ramal WHERE id=:id';
    //     $stmt = $pdo->prepare($query);
    //     $stmt->bindValue(':nome', $nome);
    //     $stmt->bindValue(':ramal', $ramal);
    //     $stmt->bindValue(':id', $id);

    //     return $stmt->execute();
    // }

    // public function delete($id)
    // {
    //     $pdo = $this->conexao->conectar();

    //     $query = 'DELETE FROM usuarios WHERE id=:id';
    //     $stmt = $pdo->prepare($query);
    //     $stmt->bindValue(':id', $id);

    //     return $stmt->execute();
    // }
}
