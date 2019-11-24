<?php

$arquivoLocal = $_GET['local'];
$aquivoNome = $_GET['nome'];

if (!file_exists($arquivoLocal)) {
    echo "Erro ao processar comando.";
    exit;
 }

// Configuramos os headers que serão enviados para o browser
    header('Content-Disposition: attachment; filename="'.$novoNome.'"');
    header('Content-Type: text/plain');
    header('Content-Length: ' . filesize($aquivoNome));
    // Envia o arquivo para o cliente
    readfile($aquivoNome);

?>