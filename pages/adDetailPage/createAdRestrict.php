<?php

session_start();
    if(!isset($_SESSION['loggedIn'])){
    header('Location: ../pages/loginPage/index.html');
    exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/styles/adRestrict_2_6.css">
</head>

<body>
    <header>
        <img src="/assets/logo/webcar_branco.png" alt="Logo branca" width="60" height="60">
    </header>

    <main>
        <div class="formsContainer">
            <form action="createAdRestrict.php" method="post" enctype="multipart/form-data">
                <div>
                    <label for="marca">Marca: </label>
                    <input type="text" name="marca" id="marca" required>
                </div>
                <div>
                    <label for="modelo">Modelo: </label>
                    <input type="text" name="modelo" id="modelo" required>
                </div>
                <div>
                    <label for="anoFabricacao">Ano de fabricação: </label>
                    <input type="number" name="anoFabricacao" id="anoFabricacao" required>
                </div>
                <div>
                    <label for="cor">Cor: </label>
                    <input type="text" name="cor" id="cor" required>
                </div>
                <div>
                    <label for="quilometragem">Quilometragem: </label>
                    <input type="number" name="quilometragem" id="quilometragem" required>
                </div>
                <div>
                    <label for="descricao">Descrição: </label>
                    <input type="text" name="descricao" id="descricao" required>
                </div>
                <div>
                    <label for="estado">Estado: </label>
                    <select name="estado" id="estado" required>
                        <option value="">Selecione</option>
                        <option value="SP">SP</option>
                        <option value="MG">MG</option>
                        <option value="RJ">RJ</option>
                        <option value="RS">RS</option>
                    </select>
                </div>
                <div>
                    <label for="cidade">Cidade: </label>
                    <input type="text" name="cidade" id="cidade" required>
                </div>
                <div>
                    <label for="fotos">Anexe ao menos 3 fotos: </label>
                    <input type="file" name="fotos" id="fotos" required accept=".png, .jpg, .jpeg" multiple>
                </div>
            </form>
            <button>Cadastrar</button>
        </div>
    </main>

    <footer>
        <h3>Desenvolvido por Pâmela, Pedro e Victor</h3>
    </footer>
</body>

</html>