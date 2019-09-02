<?php
// Conexão com o banco de dados
include( '../conectar.php' );
//Recupera os dados dos campos
$idd = $_GET[ 'nome' ];
$nome = $_POST[ 'nome' ];
$exercicios = array();



$sql3 = "DELETE FROM contem WHERE NomeTreinamento = '$idd'";
if ( $conn->query( $sql3 ) === TRUE ) {} else {
	echo "Error: " . $sql3 . "<br>" . $conn->error;
}
mysqli_close( $conn );
include( '../conectar.php' );

$sql = "UPDATE treinamento SET NomeTreinamento = '$nome' WHERE NomeTreinamento = '$idd'";

if ( $conn->query( $sql ) === TRUE ) {} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );
if ( !empty( $_POST[ 'exercicios' ] ) ) {
	foreach ( $_POST[ 'exercicios' ] as $values ) {
		$dois[] = "('$nome', '$values')";
	}
}

include( '../conectar.php' );

$sql5 = "UPDATE realiza SET Treinamento = '$nome' WHERE Treinamento = '$idd'";

if ( $conn->query( $sql5 ) === TRUE ) {} else {
	echo "Error: " . $sql5 . "<br>" . $conn->error;
}
mysqli_close( $conn );

include( '../conectar.php' );
$sql2 = "INSERT INTO contem (NomeTreinamento, exercicio) VALUES " . implode( ',', $dois );
if ( $conn->query( $sql2 ) === TRUE ) {} else {
	echo "Error: " . $sql2 . "<br>" . $conn->error;
}
mysqli_close( $conn );

include('../conectar.php');
$ip = $_SERVER[ 'REMOTE_ADDR' ];
date_default_timezone_set('America/Sao_Paulo');
$data = date( 'Y-m-d H:i:s' );
$sql = str_replace( "'", " ", $sql );
$sql2 = str_replace( "'", " ", $sql2 );
$sql3 = str_replace( "'", " ", $sql3 );
$sql5 = str_replace( "'", " ", $sql5 );

session_start();
$email = $_SESSION['email'];
$log = "INSERT INTO log (ip, data, tabela, usuario, codigo) VALUES ('$ip', '$data', 'treinamento, contem, realiza', '$email', '$sql $sql2 $sql3 $sql5')";
if ( $conn->query( $log ) === TRUE ) {
		header('location: ../admin/consulta_treinamento');
	
} else {
	echo "Error: " . $log . "<br>" . $conn->error;
}
mysqli_close( $conn );
//header( 'location: ../admin/novo_treinamento2?nome=' . $nome );






// Se houver mensagens de erro, exibe-as


?>