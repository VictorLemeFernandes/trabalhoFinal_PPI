<?php
require_once "../database/conexaoMysql.php";

$pdo = mysqlConnect();

try {
  $sql = "SELECT marca, modelo, ano, id FROM Anuncio";
  $stmt = $pdo->query($sql);
} catch (Exception $e) {
  exit('Falha ao buscar anúncios: ' . $e->getMessage());
}

$anuncios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<html>
<body>
    <table>
        <tr><th>Nome</th><th>Telefone</th></tr>
        <?php
            require "conexaoMysql.php";
            $pdo = mysqlConnect();
            $stmt = $pdo->query("SELECT nome, telefone FROM aluno");
            while ($row = $stmt->fetch()) {
                $nome = htmlspecialchars($row['nome']);
                $telefone = htmlspecialchars($row['telefone']);
                echo <<<HTML
                <tr>
                    <td>$nome</td>
                    <td>$telefone</td>
                </tr>
                HTML;
            }
        ?>
    </table>
</body>
</html>
