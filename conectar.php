<?php
$host = "localhost";
<<<<<<< HEAD
$usuario = "id5677461_academia";
$senha = "tcc987455";
$bd = "id5677461_academia";
=======
$usuario = "id10764884_academia";
$senha = "avip123";
$bd = "id10764884_academia";
>>>>>>> origin/Test

$conn = new mysqli($host, $usuario, $senha, $bd);
if($conn->connect_errno)
	echo "Falha na conexão: (".$conn->connect_errno.")".$conn->connect_error;
?>