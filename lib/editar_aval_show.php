<?php 

require( '../conectar.php' );
$id = $_GET['id'];


$resulted = mysqli_query( $conn, "SELECT * FROM avalfisica a INNER JOIN pessoa p ON (p.cpf = a.cpf) WHERE '$id' = id" ) or die(mysqli_error($conn));
if ( mysqli_num_rows( $resulted ) === 1 ) {
	
	$row = mysqli_fetch_assoc( $resulted );
	


		switch ($row['protocolo']){
		case 1:
			$protocolo = "Pollock 7 dobras";
		break;
		case 2:
			$protocolo = "Pollock 3 dobras";
		break;
		case 3:
			$protocolo = "Petroski 4 dobras";
		break;
		case 4:
			$protocolo = "Circ weltman (obesos)";
		break;
		case 5:
			$protocolo = "Durnin & Womersley 17 a 29 anos";
		break;
		case 6:
			$protocolo = "Durnin & Womersley 20 a 29 anos";
		break;
		case 7:
			$protocolo = "Durnin & Womersley 30 a 39 anos";
		break;
		case 8:
			$protocolo = "Durnin & Womersley 40 a 49 anos";
		break;
		case 9:
			$protocolo = "Durnin & Womersley 50 a 72 anos";
		break;
		case 10:
			$protocolo = "Durnin & Womersley 17 a 72 anos";
		break;
			
	}

	
}
?>