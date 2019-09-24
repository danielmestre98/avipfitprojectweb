<?php
$host = "localhost";
$usuario = "id5677461_academia";
$senha = "avip123";
$bd = "id5677461_academia";

$conn = new mysqli($host, $usuario, $senha, $bd);
if($conn->connect_errno)
	echo "Falha na conexão: (".$conn->connect_errno.")".$conn->connect_error;
?>