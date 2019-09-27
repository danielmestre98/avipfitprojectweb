<?php

require( '../conectar.php' );
$id = $_GET['id'];
$nome = $_POST[ 'nomeExerciciou' ];
$descricao = $_POST[ 'descricao' ];
$url = $_POST[ 'url' ];



$sql = "UPDATE exercicio SET nomeExercicio = '$nome', descricao = '$descricao', url = '$url' WHERE id = '$id'";


if ( $conn->query( $sql ) === TRUE ) {
	session_start();
	if($_SESSION['tipoPessoa'] == '1'){
	header( 'location: ../admin/consulta_exercicio' );}
	else{
		header ('location: ../colab/consulta_exercicio');
	}
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );


?>