<?php

function validaFoto($arquivoImagem)
{
  if (!is_uploaded_file($arquivoImagem))
    throw new InvalidArgumentException("Falha ao carregar o arquivo de imagem");

  list($width, $height, $type) = getimagesize($arquivoImagem);
  if (empty($width) || empty($height))
    throw new InvalidArgumentException("O arquivo informado não corresponde a uma imagem válida");

  $imageType = image_type_to_mime_type($type);
  if ($imageType != "image/jpeg" && $imageType != "image/png")
    throw new InvalidArgumentException("A foto deve estar no formato JPEG ou PNG");

  if (filesize($arquivoImagem) > 5 * 1024 * 1024)
    throw new InvalidArgumentException("A foto não deve ultrapassar 5MB");

  return $imageType;
}


$arquivoImagemTemp = $_FILES["arquivo"]["tmp_name"] ?? "";

try {
  $tipoArquivoImagem = validaFoto($arquivoImagemTemp);
} catch (Exception $e) {
  exit("A operação não pode ser realizada: " . $e->getMessage());
}

// dados para compor o nome final do arquivo
$pasta = "fotos";
$dataHora = date('Ymd_His', time());
$microtime = microtime(true);
$extensao = substr($tipoArquivoImagem, 6);
$destinoArquivo = "$pasta/{$dataHora}-{$microtime}.{$extensao}";


if (move_uploaded_file($arquivoImagemTemp, $destinoArquivo))
  echo "Imagem carregada com sucesso. Verifique a pasta fotos.";
