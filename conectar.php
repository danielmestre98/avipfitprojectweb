<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "academia";

$conn = new mysqli($host, $usuario, $senha, $bd);
if($conn->connect_errno)
	echo "Falha na conexão: (".$conn->connect_errno.")".$conn->connect_error;
?>