<?php
function mysqlConnect()
{
  $db_host = "sql209.infinityfree.com";
  $db_username = "if0_37061501";
  $db_password = "TJeJTVooAASb";
  $db_name = "if0_37061501_projeto_final";

  $options = [
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  ];

  try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_username, $db_password, $options);
    echo "Conexão bem-sucedida!";
    return $pdo;
  } catch (Exception $e) {
    echo 'Ocorreu uma falha na conexão com o MySQL: ' . $e->getMessage();
    exit();
  }
}