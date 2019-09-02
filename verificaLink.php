<?php


require( 'conectar.php' );

if ( isset( $_POST[ 'url' ] )) {
	$url = $_POST[ 'url' ];

	$sql = "SELECT url FROM exercicio WHERE url = '$url'";
	$query = $conn->query( $sql );
	$num_rows = $query->num_rows;


	if ( $num_rows > 0 ) {

		echo "false";
	} else {
		echo "true";
	}

}
?>