<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Principal Externa</title>
  <link rel="stylesheet" href="/styles/mainPage_2_1.css">
  <link rel="stylesheet" href="/styles/cards.css">
</head>

<!-- TÓPICO 2.1 -> PÁGINA PRINCIPAL EXTERNA -->

<body>
  <header>
    <img src="/assets/logo/webcar_branco.png" alt="Logo colorida" width="60" height="60">

    <a href="/pages/loginPage/index.html">Entre/Cadastre-se</a>

    <nav>
      <p>
        <label for="marcaVeiculo">Marca:
          <select name="marca" id="marcaVeiculo">
            <option value="">Selecione</option>
            <option value="chevrolet">Chevrolet</option>
            <option value="volks">Volkswagen</option>
            <option value="ford">Ford</option>
            <option value="honda">Honda</option>
            <option value="toyota">Toyota</option>
          </select>
        </label>
      </p>
      <p>
        <label for="modeloVeiculo">Modelo:
          <select name="modelo" id="modeloVeiculo">
            <option value="">Selecione</option>
            <option value="s10">S10</option>
            <option value="gol">Gol</option>
            <option value="mustang">Mustang</option>
            <option value="civic">Civic</option>
            <option value="corolla">Corolla</option>
          </select>
        </label>
      </p>
      <p>
        <label for="cidade">Localização:
          <select name="cidade" id="cidade">
            <option value="">Selecione</option>
            <option value="uberlandia">Uberlândia</option>
            <option value="uberaba">Uberaba</option>
            <option value="araguari">Araguari</option>
            <option value="igarapava">Igarapava</option>
          </select>
        </label>
      </p>
    </nav>
  </header>

  <main>
    <section class="cards">
      <?php
      require "../../database/conexaoMysql.php";
      $pdo = mysqlConnect();

      $stmt = $pdo->query("
                SELECT marca, modelo, ano, cidade, valor, id
                FROM Anuncio 
                LIMIT 20");

      while ($row = $stmt->fetch()) {
        $marca = htmlspecialchars($row['marca']);
        $modelo = htmlspecialchars($row['modelo']);
        $ano = htmlspecialchars($row['ano']);
        $cidade = htmlspecialchars($row['cidade']);
        $valor = htmlspecialchars($row['valor']);
        $stmt2 = $pdo->query("
            SELECT NomeArqFoto
            FROM Foto
            WHERE idAnuncio = {$row['id']}");
        $imagem = htmlspecialchars($stmt2->fetch()['NomeArqFoto']);
        echo <<<HTML
                  <div class="card">
                      <img src="../../fotos/$imagem" alt="Foto do Veículo">
                      <h3>Marca: $marca</h3>
                      <p>Modelo: $modelo</p>
                      <p>Ano: $ano</p>
                      <p>Cidade: $cidade</p>
                      <p class="card_price">Preço: R$$valor</p>
                  </div>
                HTML;
      }
      ?>
    </section>
  </main>

  <footer>
    <h3>Desenvolvido por Pâmela, Pedro e Victor</h3>
  </footer>
</body>

</html>