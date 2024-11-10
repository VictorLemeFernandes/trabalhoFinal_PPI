<?php
session_start();
require_once "../model/Anuncio.php";
require_once "../database/conexaoMysql.php";
require_once "../model/Foto.php";

$acao = $_GET['acao'];

$pdo = mysqlConnect();

switch ($acao) {

    case "cadastrarAnuncio":
        $marca = $_POST["marca"] ?? "";
        $modelo = $_POST["modelo"] ?? "";
        $ano = $_POST["ano"] ?? "";
        $cor = $_POST["cor"] ?? "";
        $quilometragem = $_POST["quilometragem"] ?? "";
        $descricao = $_POST["descricao"] ?? "";
        $valor = $_POST["valor"] ?? "";
        $estado = $_POST["estado"] ?? "";
        $cidade = $_POST["cidade"] ?? "";
        $idanunciante = $_SESSION['user_id'] ?? null;
        $arquivoImagemTemp = $_FILES["fotos"]["tmp_name"] ?? "";


        try {
            Anuncio::Create($pdo, $marca, $modelo, $ano, $cor, $quilometragem, $descricao, $valor, $estado, $cidade, $idanunciante);

            $idAnuncio = $pdo->lastInsertId();

            try {
                $tipoArquivoImagem = validaFoto($arquivoImagemTemp);
            } catch (Exception $e) {
                exit("A operação não pode ser realizada: " . $e->getMessage());
            }

            // dados para compor o nome final do arquivo
            $pasta = "../fotos";
            $dataHora = date('Ymd_His', time());
            $microtime = microtime(true);
            $extensao = substr($tipoArquivoImagem, 6);
            $destinoArquivo = "$pasta/{$dataHora}-{$microtime}.{$extensao}";
            $nomeArqFoto = "{$dataHora}-{$microtime}.{$extensao}";
            Foto::Create($pdo, $idAnuncio, $nomeArqFoto);


            if (move_uploaded_file($arquivoImagemTemp, $destinoArquivo))
                echo "Imagem carregada com sucesso. Verifique a pasta fotos.";


            header("Location: ../pages/mainPage/mainPage_2_5.html");
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        break;

    default:
        exit("Ação não disponível");
}

function validaFoto($arquivoImagem)
{
    if (!is_uploaded_file($arquivoImagem))
        throw new InvalidArgumentException("Falha ao carregar o arquivo de imagem");

    list($width, $height, $type) = getimagesize($arquivoImagem);
    echo "width: $width, height: $height, type: $type";
    if (empty($width) || empty($height))
        throw new InvalidArgumentException("O arquivo informado não corresponde a uma imagem válida");

    $imageType = image_type_to_mime_type($type);
    echo "imageType: $imageType";
    if ($imageType != "image/jpeg" && $imageType != "image/png")
        throw new InvalidArgumentException("A foto deve estar no formato JPEG ou PNG");

    if (filesize($arquivoImagem) > 5 * 1024 * 1024)
        throw new InvalidArgumentException("A foto não deve ultrapassar 5MB");

    return $imageType;
}