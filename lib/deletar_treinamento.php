<?php
include('../conectar.php');
$nome = $_GET['nome'];
$id = $_ENV['trei'];


$sql = "DELETE FROM contem WHERE NomeTreinamento = '$id'";
$sql2 = "UPDATE realiza SET Treinamento = 'Treinamento não cadastrado' WHERE Treinamento = '$id'";
$sql3 = "UPDATE treinamento SET inativo = '1' WHERE id = '$nome'";

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

if ( $conn->query( $sql3 ) === TRUE ) {
	session_start();
	if($_SESSION['tipoPessoa'] == '1'){
	header( 'location: ../admin/consulta_treinamento' );}
	else{
		header ('location: ../colab/consulta_treinamento');
	}
} else {
	echo "Error: " . $sql3 . "<br>" . $conn->error;
}
mysqli_close( $conn );


?>


<?php

?>