<?php


require( 'conectar.php' );

if ( isset( $_POST[ 'cpf' ] ) ) {
	if ( isset( $_POST[ 'cpfo' ] ) ) {
		$old = $_POST['cpfo'];
		$cpf = $_POST[ 'cpf' ];
		$sql = "SELECT cpf FROM pessoa WHERE cpf = '$cpf' and cpf != '$old'";
		$query = $conn->query( $sql );
		$num_rows = $query->num_rows;
		if ( $num_rows > 0 ) {

			echo "false";
		} else {
			echo "true";
		}
	} else {
		$cpf = $_POST[ 'cpf' ];
		$sql = "SELECT cpf FROM pessoa WHERE cpf = '$cpf'";
		$query = $conn->query( $sql );
		$num_rows = $query->num_rows;
		if ( $num_rows > 0 ) {

			echo "false";
		} else {
			echo "true";
		}
	}
}
?>