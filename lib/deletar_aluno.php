<?php
include('../conectar.php');
$cpf = $_GET['cpf'];
mysqli_query( $conn,"UPDATE pessoa SET inativo = 1, email = '' WHERE cpf = '$cpf'");

session_start();
	if($_SESSION['tipoPessoa'] == '1'){
	header( 'location: ../admin/consulta_aluno' );}
	else{
		header ('location: ../colab/consulta_aluno');
	}
?>
