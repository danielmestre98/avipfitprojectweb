<?php

require( '../conectar.php' );
$senha = md5($_POST['senha']);
$email = $_POST[ 'email' ];


$sql = "UPDATE pessoa SET senha = '$senha' WHERE email = '$email'";
$sql2 = "DELETE FROM token WHERE email = '$email'";

if ( $conn->query( $sql ) === TRUE ) {
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );
include('../conectar.php');
if ( $conn->query( $sql2 ) === TRUE ) {

} else {
	echo "Error: " . $sql2 . "<br>" . $conn->error;
}
mysqli_close( $conn );
include('../conectar.php');
date_default_timezone_set('America/Sao_Paulo');
session_start();
$ip = $_SERVER[ 'REMOTE_ADDR' ];
$data = date( 'Y-m-d H:i:s' );

$sql = addslashes($sql);
$log = "INSERT INTO log (ip, data, tabela, usuario, codigo) VALUES ('$ip', '$data', 'pessoa, token', 'Esqueci minha senha', '$sql')";

if ( $conn->query( $log ) === TRUE ) {
		header( 'location: ../login?suc=true' );
} else {
	echo "Error: " . $log . "<br>" . $conn->error;
}
mysqli_close( $conn );




?>