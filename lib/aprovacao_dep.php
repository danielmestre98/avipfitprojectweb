<?php

require( '../conectar.php' );
$cpf = $_POST[ 'cpf' ];
$status = $_POST['aprovacao'];


if ($status == 'Aprovado'){

$sql = "UPDATE depoimentos SET status = '$status' WHERE cpf = '$cpf'";

}
else {
	if ($status == 'Cancelado'){
		$sql = "DELETE FROM depoimentos WHERE cpf = '$cpf'";
	}
}
if ( $conn->query( $sql ) === TRUE ) {
	header( 'location: ../admin/novos_dep' );
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close( $conn );


?>