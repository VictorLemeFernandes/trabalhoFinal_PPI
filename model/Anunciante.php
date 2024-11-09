<?php

class Anunciante
{
    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $senhaHash;
    private $telefone;

    public function __construct($id, $nome, $cpf, $email, $senhaHash, $telefone)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->senhaHash = $senhaHash;
        $this->telefone = $telefone;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenhaHash()
    {
        return $this->senhaHash;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    static function Create($pdo, $nome, $cpf, $email, $senhaHash, $telefone)
    {
        $stmt = $pdo->prepare(<<<SQL
        INSERT INTO Anunciante (nome, cpf, email, senhaHash, telefone)
        VALUES (?, ?, ?, ?, ?)
        SQL
        );
        $stmt->execute([$nome, $cpf, $email, $senhaHash, $telefone]);
        return $pdo->lastInsertId();
    }
}