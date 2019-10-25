<?php
include('../conectar.php');
$cpf = $_GET['cpf'];
mysqli_query( $conn,"UPDATE pessoa SET inativo = 1, email = '' WHERE cpf = '$cpf'");
mysqli_close($conn);
include('../conectar.php');
$resulted = mysqli_query($conn, "SELECT MAX(id) AS id FROM relatorio WHERE cpf='$cpf'");
$row = mysqli_fetch_assoc( $resulted );
$id = $row['id'];
mysqli_close($conn);
include('../conectar.php');
$hoje = date("Y-m-d");

mysqli_query( $conn,"UPDATE relatorio SET datafim = '$hoje' WHERE id = '$id'");
mysqli_close($conn);

session_start();
	if($_SESSION['tipoPessoa'] == '1'){
	header( 'location: ../admin/consulta_aluno' );}
	else{
		header ('location: ../colab/consulta_aluno');
	}
?>
