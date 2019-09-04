<?php
$host = "localhost";
$usuario = "id10764884_academia";
$senha = "avip123";
$bd = "id10764884_academia";

$conn = new mysqli($host, $usuario, $senha, $bd);
if($conn->connect_errno)
	echo "Falha na conexão: (".$conn->connect_errno.")".$conn->connect_error;
?>