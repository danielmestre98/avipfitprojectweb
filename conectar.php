<?php
$host = "avipfit.mysql.dbaas.com.br";
$usuario = "avipfit";
$senha = "Avip#fit2019";
$bd = "avipfit";

$conn = new mysqli($host, $usuario, $senha, $bd);
if($conn->connect_errno)
	echo "Falha na conexão: (".$conn->connect_errno.")".$conn->connect_error;
?>