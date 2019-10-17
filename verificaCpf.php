<?php


require( 'conectar.php' );

if ( isset( $_POST[ 'cpf' ] ) ) {
	if ( isset( $_POST[ 'cpfo' ] ) ) {
		$old = $_POST['cpfo'];
		$cpf = $_POST[ 'cpf' ];
		$sql = "SELECT cpf FROM pessoa WHERE cpf = '$cpf' and cpf != '$old' and inativo = '0'";
		echo $sql;
		$query = $conn->query( $sql );
		$num_rows = $query->num_rows;
		if ( $num_rows > 0 ) {

			echo "false";
		} else {
			echo "true";
		}
	} else {
		$cpf = $_POST[ 'cpf' ];
		$sql = "SELECT cpf FROM pessoa WHERE cpf = '$cpf' and inativo = '0'";
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