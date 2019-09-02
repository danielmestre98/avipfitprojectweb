<?php


require( 'conectar.php' );
session_start();


if ( isset( $_POST[ 'email' ] ) ) {
	$email = $_POST[ 'email' ];
	$sql = "SELECT email FROM pessoa WHERE email = '$email'";
	$query = $conn->query( $sql );
	$num_rows = $query->num_rows;


	if ( $num_rows > 0 ) {

		echo "false";
	} else {
		echo "true";
	}

}
?>