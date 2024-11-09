<?php
require_once "../database/conexaoMysql.php";

function checkLogin($pdo, $email, $senha)
{
  try {
    $stmt = $pdo->prepare(<<<SQL
            SELECT Id, Nome, SenhaHash 
            FROM Anunciante
            WHERE Email = ?
            SQL
    );

    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
      return false;
    }

    if (password_verify($senha, $usuario['SenhaHash'])) {
      session_start();
      $_SESSION['userId'] = $usuario['Id'];
      $_SESSION['userName'] = $usuario['Nome'];
      $_SESSION['loggedIn'] = true;
      return true;
    }

    return false;
  } catch (Exception $e) {
    error_log('Erro no login: ' . $e->getMessage());
    return false;
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $pdo = mysqlConnect();
  $email = $_POST['email'] ?? '';
  $senha = $_POST['senha'] ?? '';

  if (checkLogin($pdo, $email, $senha)) {
    header('Location: ../pages/mainPage/mainPage_2_5.html');
    exit();
  } else {
    header('Location: ../pages/loginPage/index.html?error=1');
    exit();
  }
}