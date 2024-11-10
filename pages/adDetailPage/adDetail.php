<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exibição Detalhada</title>
  <link rel="stylesheet" href="/styles/adDetail.css">
</head>

<body>
  <header class="header">
    <a href="/pages/adlisting/adlisting.php" id="voltar"><img src="/assets/icons/voltar.png" alt="Voltar"></a>
    <img src="/assets/webcar branco.png" alt="Logo">
  </header>
  <div class="container">
    <h1>Detalhes do Veículo</h1>
    <?php
    require "../../database/conexaoMysql.php";
    $pdo = mysqlConnect();
    $idAnuncio = $_GET['id'];

    $stmt = $pdo->query("
    SELECT marca, modelo, ano, valor, cor, quilometragem, descricao, estado, cidade, id
    FROM Anuncio 
    WHERE id = {$idAnuncio}");

    while ($row = $stmt->fetch()) {
      $marca = htmlspecialchars($row['marca']);
      $modelo = htmlspecialchars($row['modelo']);
      $ano = htmlspecialchars($row['ano']);
      $valor = htmlspecialchars($row['valor']);
      $cor = htmlspecialchars($row['cor']);
      $quilometragem = htmlspecialchars($row['quilometragem']);
      $descricao = htmlspecialchars($row['descricao']);
      $estado = htmlspecialchars($row['estado']);
      $cidade = htmlspecialchars($row['cidade']);
      $id = htmlspecialchars($row['id']);
      $stmt2 = $pdo->query("
      SELECT NomeArqFoto
      FROM Foto
      WHERE idAnuncio = {$row['id']}");
      $imagem = htmlspecialchars($stmt2->fetch()['NomeArqFoto']);
      echo <<<HTML
          <div class="anuncio">
            <div class="imagens">
            <img src="../../fotos/$imagem" alt="Foto do Veículo">
            </div>
            <div class="detalhes">
              <ul>
                <li><strong>Marca:</strong> $marca</li>
                <li><strong>Modelo:</strong> $modelo</li>
                <li><strong>Ano de Fabricação:</strong> $ano</li>
                <li><strong>Valor:</strong> R$$valor</li>
                <li><strong>Cor:</strong> $cor</li>
                <li><strong>Quilometragem:</strong> $quilometragem km</li>
                <li><strong>Descrição:</strong> $descricao</li>
                <li><strong>Estado:</strong> $estado</li>
                <li><strong>Cidade:</strong> $cidade</li>
              </ul>
            </div>
          </div>
          HTML;
    }
    ?>
  </div>
  <script src="scripts.js"></script>
</body>

</html>