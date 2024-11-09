<?php
require "Anunciante.php";
require "conexaoMysql.php";

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

    // case "excluirCliente":
    //     $idCliente = $_GET["idCliente"] ?? "";
    //     try {
    //         Cliente::Remove($pdo, $idCliente);
    //         header("location: clientes.html");
    //     } catch (Exception $e) {
    //         throw new Exception($e->getMessage());
    //     }
    //     break;

    // case "listarClientes":
    //     try {
    //         $arrayClientes = Cliente::GetFirst30($pdo);
    //         header('Content-Type: application/json; charset=utf-8');
    //         echo json_encode($arrayClientes);
    //     } catch (Exception $e) {
    //         throw new Exception($e->getMessage());
    //     }
    //     break;

    default:
        exit("Ação não disponível");
}