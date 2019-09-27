<?php


require( 'conectar.php' );

if ( isset( $_POST[ 'url' ] )) {
	$url = $_POST[ 'url' ];
	$urlOld = $_POST['linkOld'];

	$sql = "SELECT url FROM exercicio WHERE url = '$url' and url != '$urlOld'";
	$query = $conn->query( $sql );
	$num_rows = $query->num_rows;


	if ( $num_rows > 0 ) {

		echo "false";
	} else {
		echo "true";
	}

}
?>