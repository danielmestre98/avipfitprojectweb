<?php
// Conexão com o banco de dados
include( '../conectar.php' );
//Recupera os dados dos campos

$nome = $_POST[ 'nome' ];
$exercicios = array();

foreach ($_POST['exercicios'] as $values) {
	$dois[] = "('$nome', '$values')";
}


$sql = "INSERT INTO treinamento (NomeTreinamento)
		VALUES ('$nome');";


if ( $conn->query( $sql ) === TRUE ) {} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
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
session_start();
$email = $_SESSION['email'];
$log = "INSERT INTO log (ip, data, tabela, usuario, codigo) VALUES ('$ip', '$data', 'treinamento, contem', '$email', '$sql $sql2')";
if ( $conn->query( $log ) === TRUE ) {
		session_start();
	if($_SESSION['tipoPessoa'] == '1'){
	header( 'location: ../admin/consulta_treinamento' );}
	else{
		header ('location: ../colab/consulta_treinamento');
	}
	
} else {
	echo "Error: " . $log . "<br>" . $conn->error;
}
mysqli_close( $conn );
//header( 'location: ../admin/novo_treinamento2?nome=' . $nome );






// Se houver mensagens de erro, exibe-as


?>