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


    $stmt = $pdo->query("
    SELECT marca, modelo, ano, id 
    FROM Anuncio 
    WHERE idAnunciante = {$_SESSION['user_id']}");


    while ($row = $stmt->fetch()) {
      $marca = htmlspecialchars($row['marca']);
      $modelo = htmlspecialchars($row['modelo']);
      $ano = htmlspecialchars($row['ano']);
      $id = htmlspecialchars($row['id']);
      $stmt2 = $pdo->query("
      SELECT NomeArqFoto
      FROM Foto
      WHERE idAnuncio = {$row['id']}");
      $imagem = htmlspecialchars($stmt2->fetch()['NomeArqFoto']);

      echo <<<HTML
                <div class="anuncio">
                    <img src="../../fotos/$imagem" alt="Foto do Veículo">
                    <div class="anuncio-info">
                        <h2>Marca: $marca</h2>
                        <p>Modelo: $modelo</p>
                        <p>Ano de Fabricação: $ano</p>
                    </div>
                    <div class="anuncio-acoes">
                        <a href="/pages/adDetailPage/adDetail.php?id=$id">Ver Detalhes</a>
                        <a href="/pages/listofinterests/listofinterests.html">Ver Interesses</a>
                        <button onclick="excluirAnuncio($id)">Excluir</button>

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

<script>
  function excluirAnuncio(id) {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `../../pages/adDetailPage/excluirAnuncio.php?id=${id}`, true);

    xhr.onload = function () {
      if (xhr.status === 200) {
        alert("Anúncio excluído com sucesso!");
        location.reload();
      } else {
        alert("Erro ao excluir o anúncio.");
      }
    };

    xhr.send();
  }
</script>


</html>