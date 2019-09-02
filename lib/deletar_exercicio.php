<?php
include('../conectar.php');
$nome = $_GET['nomeExercicio'];
mysqli_query ($conn, "DELETE FROM contem WHERE Exercicio = '$nome'");
mysqli_close($conn);
include('../conectar.php');
mysqli_query( $conn,"DELETE from exercicio WHERE NomeExercicio = '$nome'");
mysqli_close($conn);

include('../conectar.php');
$ip = $_SERVER[ 'REMOTE_ADDR' ];
date_default_timezone_set('America/Sao_Paulo');
$data = date( 'Y-m-d H:i:s' );
session_start();
$email = $_SESSION['email'];

$log = "INSERT INTO log (ip, data, tabela, usuario, codigo) VALUES ('$ip', '$data', 'treinamento, contem', '$email', 'DELETE from exercicio WHERE NomeExercicio = $nome; DELETE FROM contem WHERE Exercicio = $nome;')";
if ( $conn->query( $log ) === TRUE ) {
		header('location: ../admin/consulta_exercicio');
	
} else {
	echo "Error: " . $log . "<br>" . $conn->error;
}

mysqli_close($conn);

//header('location: ../admin/consulta_exercicio');
?>

