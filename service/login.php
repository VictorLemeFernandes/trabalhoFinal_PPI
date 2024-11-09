<?php
require_once "../database/conexaoMysql.php";

class LoginResult
{
  public $success;
  public $newLocation;

  function __construct($success, $newLocation)
  {
    $this->success = $success;
    $this->newLocation = $newLocation;
  }
}
function checkUserCredentials($pdo, $email, $senha)
{
  $sql = <<<SQL
  SELECT SenhaHash
  FROM Anunciante
  WHERE Email = ?
  SQL;

  try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $senhaHash = $stmt->fetchColumn();

    if (!$senhaHash)
      return false; // a consulta não retornou nenhum resultado (email não encontrado)

    if (!password_verify($senha, $senhaHash))
      return false; // email e/ou senha incorreta
    return true;
  } catch (Exception $e) {
    exit('Falha inesperada: ' . $e->getMessage());
  }
}

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$pdo = mysqlConnect();
if (checkUserCredentials($pdo, $email, $senha)) {
  // Define o parâmetro 'httponly' para o cookie de sessão, para que o cookie
  // possa ser acessado apenas pelo navegador nas requisições http (e não por código JavaScript).
  // Aumenta a segurança evitando que o cookie de sessão seja roubado por eventual
  // código JavaScript proveniente de ataq. X S S.
  $cookieParams = session_get_cookie_params();
  $cookieParams['httponly'] = true;
  session_set_cookie_params($cookieParams);

  session_start();
  $_SESSION['loggedIn'] = true;
  $_SESSION['user'] = $email;

  // Resgata o ID do anunciante do banco de dados
  $stmt = $pdo->prepare("SELECT id FROM Anunciante WHERE email = ?");
  $stmt->execute([$email]);
  $anunciante = $stmt->fetch();
  $_SESSION['user_id'] = $anunciante['id'];

  $response = new LoginResult(true, '/../pages/mainPage/mainPage_2_5.html');
} else
  $response = new LoginResult(false, '');

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);