<?php

namespace App\Models\MySQL\CodeeasyGerenciadorDeLojas;

final class LojaModel
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var satring
     */
    private $nome;

    /**
     * @var string
     */
    private $telefone;
    
    /**
     * @var string
     */
    private $endereco;

    /**
     * @return int 
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): LojaModel
    {
        $this->nome = $nome;
        return $this;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): LojaModel
    {
        $this->telefone = $telefone;
        return $this;
    }

    public function getEndereco(): string
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco): LojaModel
    {
        $this->endereco = $endereco;
        return $this;
    }
}