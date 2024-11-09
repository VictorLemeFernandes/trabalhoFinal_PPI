<?php
session_start();
require_once "../model/Anuncio.php";
require_once "../database/conexaoMysql.php";

$acao = $_GET['acao'];

$pdo = mysqlConnect();

switch ($acao) {

    case "cadastrarAnuncio":
        $marca = $_POST["marca"] ?? "";
        $modelo = $_POST["modelo"] ?? "";
        $ano = $_POST["ano"] ?? "";
        $cor = $_POST["cor"] ?? "";
        $quilometragem = $_POST["quilometragem"] ?? "";
        $descricao = $_POST["descricao"] ?? "";
        $valor = $_POST["valor"] ?? "";
        $estado = $_POST["estado"] ?? "";
        $cidade = $_POST["cidade"] ?? "";
        $idanunciante = $_SESSION['user_id'] ?? null;


        try {
            Anuncio::Create($pdo, $marca, $modelo, $ano, $cor, $quilometragem, $descricao, $valor, $estado, $cidade, $idanunciante);
            header("Location: ../pages/adlisting/adlisting.html");
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        break;

    default:
        exit("Ação não disponível");
}