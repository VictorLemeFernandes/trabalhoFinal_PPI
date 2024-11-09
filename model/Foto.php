<?php

class Foto
{
    private $id;
    private $idAnuncio;
    private $nomeArqFoto;

    public function __construct($id, $idAnuncio, $nomeArqFoto)
    {
        $this->id = $id;
        $this->idAnuncio = $idAnuncio;
        $this->nomeArqFoto = $nomeArqFoto;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdAnuncio()
    {
        return $this->idAnuncio;
    }

    public function getNomeArqFoto()
    {
        return $this->nomeArqFoto;
    }

    static function Create($pdo, $idAnuncio, $NomeArqFoto)
    {
        $stmt = $pdo->prepare(<<<SQL
            INSERT INTO Foto (IdAnuncio, NomeArqFoto)
            VALUES (?, ?)
        SQL);
        $stmt->execute([$idAnuncio, $NomeArqFoto]);
        return $pdo->lastInsertId();
    }
}