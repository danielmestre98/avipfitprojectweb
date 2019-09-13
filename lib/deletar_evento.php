<?php
include('../conectar.php');
$id = $_GET['dia'];
mysqli_query ($conn, "DELETE FROM agenda WHERE id = '$id'");
mysqli_close($conn);


include('../conectar.php');
$ip = $_SERVER[ 'REMOTE_ADDR' ];
date_default_timezone_set('America/Sao_Paulo');
$data = date( 'Y-m-d H:i:s' );
session_start();
$email = $_SESSION['email'];

$log = "INSERT INTO log (ip, data, tabela, usuario, codigo) VALUES ('$ip', '$data', 'treinamento, contem', '$email', 'DELETE FROM agenda WHERE id = $id')";
if ( $conn->query( $log ) === TRUE ) {
		session_start();
	if($_SESSION['tipoPessoa'] == '1'){
	header( 'location: ../admin/ag_eventos' );}
	else{
		header ('location: ../colab/ag_eventos');
	}
	
} else {
	echo "Error: " . $log . "<br>" . $conn->error;
}

mysqli_close($conn);

//header('location: ../admin/consulta_exercicio');
?>

