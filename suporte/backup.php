<?php
$filename='database_backup_'.date('G_a_m_d_y').'.sql';

$result=exec('mysqldump aviptest --password=avip#fit2019 --user=aviptest --single-transaction >/backups/'.$filename,$output);

?>