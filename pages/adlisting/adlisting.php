<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles/listagemdeanuncios.css">
  <title>Listagem de Anúncios</title>
</head>
<header>
  <img src="/assets/logo/webcar_branco.png" id="logo" alt="Logo colorida" width="60" height="60">
  <a href="/pages/mainPage/mainPage_2_5.html">Voltar</a>

</header>

<body>

  <div class="container">
    <h1>Meus Anúncios</h1>
    <?php
    require "../../database/conexaoMysql.php";
    $pdo = mysqlConnect();
    session_start();
    $stmt = $pdo->query("SELECT marca, modelo, ano FROM Anuncio WHERE idAnunciante = {$_SESSION['user_id']}");
    while ($row = $stmt->fetch()) {
      $marca = htmlspecialchars($row['marca']);
      $modelo = htmlspecialchars($row['modelo']);
      $ano = htmlspecialchars($row['ano']);
      echo <<<HTML
                <div class="anuncio">
                    <img src="/assets/cards/corolla.jpg" alt="Foto do Veículo">
                    <div class="anuncio-info">
                        <h2>Marca: $marca</h2>
                        <p>Modelo: $modelo</p>
                        <p>Ano de Fabricação: $ano</p>
                    </div>
                    <div class="anuncio-acoes">
                        <a href="/pages/adDetailPage/index.html">Ver Detalhes</a>
                        <a href="/pages/listofinterests/listofinterests.html">Ver Interesses</a>
                        <button onclick="excluirAnuncio(this)">Excluir</button>
                    </div>
                    </div>
                HTML;
    }
    ?>
  </div>
</body>

<footer>
  <h3>Desenvolvido por Pâmela, Pedro e Victor</h3>
</footer>

<script src="/js/javascript.js"></script>

</html>