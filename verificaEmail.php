<?php


require( 'conectar.php' );
session_start();
$cpf = $_POST['cpf'];

if ( isset( $_POST[ 'email' ] )) {
	$email = $_POST[ 'email' ];

	$sql = "SELECT email FROM pessoa WHERE email = '$email' and cpf != '$cpf'";
	$query = $conn->query( $sql );
	$num_rows = $query->num_rows;


	if ( $num_rows > 0 ) {

		echo "false";
	} else {
		echo "true";
	}

}
?>