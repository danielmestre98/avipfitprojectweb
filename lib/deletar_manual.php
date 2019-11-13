<?php
include('../conectar.php');
$id = $_GET['id'];

$resulted = mysqli_query ($conn, "SELECT caminho FROM manual WHERE id = '$id'");
if ( mysqli_num_rows( $resulted ) === 1 ) {
	$row = mysqli_fetch_assoc( $resulted );
	$caminho = $row['caminho'];
}
mysqli_close($conn);

include('../conectar.php');
mysqli_query( $conn,"DELETE from manual WHERE id = '$id'");
mysqli_close($conn);
unlink("../manual/$caminho");
include('../conectar.php');
$ip = $_SERVER[ 'REMOTE_ADDR' ];
date_default_timezone_set('America/Sao_Paulo');
$data = date( 'Y-m-d H:i:s' );
session_start();
$email = $_SESSION['email'];

$log = "INSERT INTO log (ip, data, tabela, usuario, codigo) VALUES ('$ip', '$data', 'manual', '$email', 'DELETE from manual WHERE id = $id')";
if ( $conn->query( $log ) === TRUE ) {
	header( 'location: ../suporte/manuais' );

	
} else {
	echo "Error: " . $log . "<br>" . $conn->error;
}

mysqli_close($conn);

//header('location: ../admin/consulta_exercicio');
?>

