<?php
    require_once 'arquivosPHP\database.php';
    require_once 'arquivosPHP\Classes.php';

    // Exemplo de dados do anunciante
    $dadosAnunciante = [
        'nome' => 'Pamela',
        'cpf' => '11111111111',
        'email' => 'pamela@email.com',
        'senhaHash' => password_hash('senha123', PASSWORD_BCRYPT),
        'telefone' => '35999999999'
    ];

    // Aqui é feita a conexão do banco de dados
    $database = new Database();
    $db = $database->getConnection();

    try {
        // Iniciar transação
        $db->beginTransaction();

        // Inserir Anunciante
        $stmt = $db->prepare("INSERT INTO Anunciante (Nome, CPF, Email, SenhaHash, Telefone) VALUES (:nome, :cpf, :email, :senhaHash, :telefone)");
        $stmt->execute([
            ':nome' => $dadosAnunciante['nome'], // No lugar de $dadosAnunciante['nome'] deve colocar o input do html
            ':cpf' => $dadosAnunciante['cpf'],
            ':email' => $dadosAnunciante['email'],
            ':senhaHash' => $dadosAnunciante['senhaHash'],
            ':telefone' => $dadosAnunciante['telefone']
        ]);
        $anuncianteId = $db->lastInsertId();

        // Confirmar transação
        $db->commit();
        echo "Anúncio cadastrado com sucesso!";
    } catch (Exception $e) {
        $db->rollBack();
        echo "Erro ao cadastrar o anúncio: " . $e->getMessage();
    }
?>