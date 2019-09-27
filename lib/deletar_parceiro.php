<?php
include('../conectar.php');
$cnpj = $_GET['cnpj'];
$sql = "DELETE FROM parceiro WHERE cnpj = '$cnpj'";
mysqli_query ($conn, $sql);
mysqli_close($conn);

include('../conectar.php');
$ip = $_SERVER[ 'REMOTE_ADDR' ];
date_default_timezone_set('America/Sao_Paulo');
$data = date( 'Y-m-d H:i:s' );
session_start();
$email = $_SESSION['email'];

$log = "INSERT INTO log (ip, data, tabela, usuario, codigo) VALUES ('$ip', '$data', 'treinamento, contem', '$email', 'DELETE FROM parceiros WHERE cnpj = $cnpj')";
if ( $conn->query( $log ) === TRUE ) {
		header('location: ../admin/parceiros');
	
} else {
	echo "Error: " . $log . "<br>" . $conn->error;
}

mysqli_close($conn);

//header('location: ../admin/consulta_exercicio');
?>

