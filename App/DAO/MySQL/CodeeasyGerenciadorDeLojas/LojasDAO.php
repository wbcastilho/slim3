<?php

namespace App\DAO\MySQL\CodeeasyGerenciadorDeLojas;

use App\Models\MySQL\CodeeasyGerenciadorDeLojas\LojaModel;

class LojasDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();        
    }

    public function getAllLojas() : array
    {
        $lojas = $this->pdo
            ->query('SELECT
                id,
                nome,
                telefone,
                endereco
                FROM lojas;')
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $lojas;
    }

    public function insertLoja(LojaModel $loja) : void
    {
        $statement = $this->pdo
            ->prepare('INSERT INTO lojas VALUES(
                null,
                :nome,
                :telefone,
                :endereco
            );');

        $statement->execute([
            'nome' => $loja->getNome(),
            'telefone' => $loja->getTelefone(),
            'endereco' => $loja->getEndereco()
        ]);
    }

    public function deleteLoja(int $id): void
    {
        $statement = $this->pdo
            ->prepare('DELETE FROM lojas WHERE id = :id');

        $statement->execute([
            'id' => $id
        ]);
    }
}