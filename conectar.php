<?php
$host = "aviptest.mysql.dbaas.com.br";
$usuario = "aviptest";
$senha = "avip#fit2019";
$bd = "aviptest";

$conn = new mysqli($host, $usuario, $senha, $bd);
if($conn->connect_errno)
	echo "Falha na conexão: (".$conn->connect_errno.")".$conn->connect_error;
?>