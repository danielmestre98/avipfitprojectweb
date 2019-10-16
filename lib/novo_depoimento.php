<?php
// Conexão com o banco de dados
include( '../conectar.php' );
//Recupera os dados dos campos
session_start();
$cpf = $_SESSION['cpf'];
$descr = $_POST[ 'descr' ];





$sql = "INSERT INTO depoimentos (cpf, descricao, status)
		VALUES ('$cpf', '$descr', 'Pendente');";


if ( $conn->query( $sql ) === TRUE ) {} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );
include('../conectar.php');
$ip = $_SERVER[ 'REMOTE_ADDR' ];
date_default_timezone_set('America/Sao_Paulo');
$data = date( 'Y-m-d H:i:s' );
$sql = addslashes($sql);
session_start();
$email = $_SESSION['email'];
$log = "INSERT INTO log (ip, data, tabela, usuario, codigo) VALUES ('$ip', '$data', 'treinamento, contem', '$email', '$sql')";
if ( $conn->query( $log ) === TRUE ) {
		header('location: ../aluno/depoimentos?suc=1');
	
} else {
	echo "Error: " . $log . "<br>" . $conn->error;
}
mysqli_close( $conn );
//header( 'location: ../admin/novo_treinamento2?nome=' . $nome );






// Se houver mensagens de erro, exibe-as


?>