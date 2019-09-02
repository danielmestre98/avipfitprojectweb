<?php

require( '../conectar.php' );
$id= $_POST['id'];
$evento = $_POST[ 'evento' ];
$hora = $_POST['hora'];
$dia = $_POST['dia'];



$sql = "UPDATE agenda SET evento = '$evento', horario = '$hora', dia = '$dia' WHERE id = '$id'";


if ( $conn->query( $sql ) === TRUE ) {
	header( 'location: ../admin/ag_eventos.php' );
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );


?>