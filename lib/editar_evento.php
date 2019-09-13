<?php

require( '../conectar.php' );
$id= $_POST['id'];
$evento = $_POST[ 'evento' ];
$hora = $_POST['hora'];
$dia = $_POST['dia'];



$sql = "UPDATE agenda SET evento = '$evento', horario = '$hora', dia = '$dia' WHERE id = '$id'";


if ( $conn->query( $sql ) === TRUE ) {
	session_start();
	if($_SESSION['tipoPessoa'] == '1'){
	header( 'location: ../admin/ag_eventos' );}
	else{
		header ('location: ../colab/ag_eventos');
	}
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );


?>