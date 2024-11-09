<?php

class Anuncio
{
    private $id;
    private $marca;
    private $modelo;
    private $ano;
    private $cor;
    private $quilometragem;
    private $descricao;
    private $valor;
    private $dataHora;
    private $estado;
    private $cidade;
    private $idAnunciante;

    public function __construct($id, $marca, $modelo, $ano, $cor, $quilometragem, $descricao, $valor, $dataHora, $estado, $cidade, $idAnunciante)
    {
        $this->id = $id;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->cor = $cor;
        $this->quilometragem = $quilometragem;
        $this->descricao = $descricao;
        $this->valor = $valor;
        $this->dataHora = $dataHora;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->idAnunciante = $idAnunciante;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function getCor()
    {
        return $this->cor;
    }

    public function getQuilometragem()
    {
        return $this->quilometragem;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function getDataHora()
    {
        return $this->dataHora;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getIdAnunciante()
    {
        return $this->idAnunciante;
    }
}