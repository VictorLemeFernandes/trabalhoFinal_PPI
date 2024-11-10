<?php

require "../../database/conexaoMysql.php";
$pdo = mysqlConnect();
$idAnuncio = $_GET['id'];

$stmt = $pdo->query("
      DELETE FROM Anuncio
      WHERE id = {$idAnuncio}");
