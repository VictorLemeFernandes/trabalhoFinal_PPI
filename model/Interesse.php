<?php
class Interesse
{
    private $id;
    private $nome;
    private $telefone;
    private $mensagem;
    private $dataHora;
    private $idAnuncio;

    public function __construct($id, $nome, $telefone, $mensagem, $dataHora, $idAnuncio)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->mensagem = $mensagem;
        $this->dataHora = $dataHora;
        $this->idAnuncio = $idAnuncio;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getMensagem()
    {
        return $this->mensagem;
    }

    public function getDataHora()
    {
        return $this->dataHora;
    }

    public function getIdAnuncio()
    {
        return $this->idAnuncio;
    }
}