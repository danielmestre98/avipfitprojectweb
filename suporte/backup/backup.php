<?php
date_default_timezone_set( 'America/Sao_Paulo' );
$date = date('d-m-Y-H.i.s', time());
$exec = "mysqldump --user=aviptest --password=avip#fit2019 --host=aviptest.mysql.dbaas.com.br aviptest > ../backup/backup-$date.sql";
echo $exec;
exec($exec);
$aquivoNome = 'backup-'.$date.'.sql'; 
$arquivoLocal = '../backup/'.$aquivoNome; 
// Configuramos os headers que serão enviados para o browser

if (!file_exists($arquivoLocal)) {
    echo "Erro ao processar comando.";
    exit;
 }

// Configuramos os headers que serão enviados para o browser
    header('Content-Disposition: attachment; filename="'.$aquivoNome.'"');
    header('Content-Type: text/plain');
    header('Content-Length: ' . filesize($aquivoNome));
    // Envia o arquivo para o cliente
    readfile($aquivoNome);
	header('location: ../criarbackup.php');
?>