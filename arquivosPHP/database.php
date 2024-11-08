<?php
  function mysqlConnect()
  {
    // Mudar essas variáveis quando colocar no infinityfree
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "root";
    $db_name = "trabalho_ppi";

    $options = [
      PDO::ATTR_EMULATE_PREPARES => false, // Desativa a execução emulada de prepared statements
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
      $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_username, $db_password, $options);
      return $pdo;
    } 
    catch (Exception $e) {
      exit('Ocorreu uma falha na conexão com o MySQL: ' . $e->getMessage());
    }
  }
?>
