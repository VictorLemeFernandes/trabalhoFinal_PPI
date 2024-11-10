<?php
require_once "../model/Anunciante.php";
require_once "../database/conexaoMysql.php";

$acao = $_GET['acao'];

$pdo = mysqlConnect();

switch ($acao) {

    case "cadastrarAnunciante":
        $nome = $_POST["nome"] ?? "";
        $cpf = $_POST["cpf"] ?? "";
        $email = $_POST["email"] ?? "";
        $senha = $_POST["senha"] ?? "";
        $telefone = $_POST["telefone"] ?? "";

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        try {
            Anunciante::Create($pdo, $nome, $cpf, $email, $senhaHash, $telefone);
            header("Location: ../pages/loginPage/index.html");
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        break;


    default:
        exit("Ação não disponível");
}