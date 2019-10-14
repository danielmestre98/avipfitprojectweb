<?php
include( '../conectar.php' );
$sql = "SELECT datahora, email FROM token";

$result = mysqli_query( $conn, $sql )or die( mysqli_error( $conn ) );
mysqli_close( $conn );
$data2 = new DateTime();
while ( $row = mysqli_fetch_array( $result ) ) {
	$data1 = $row['datahora'];
	$email = $row['email'];
	if ($data1 < $data2){
		
		$cpf = $row['cpf'];
		$comp = $row['competencia'];
		$sql2 = "DELETE FROM token WHERE email = '$email'";
		
		include('../conectar.php');
		if ( $conn->query( $sql2 ) === TRUE ) {
		} else {
			echo "Error: " . $sql2 . "<br>" . $conn->error;
		}
		mysqli_close( $conn );
		$data3 = date( 'Y-m-d H:i:s' );
		$sql2 = addslashes($sql2);
		$log = "INSERT INTO log (ip, data, tabela, usuario, codigo) VALUES ('Automático', '$data3', 'token', 'Automático', '$sql2')";
		include('../conectar.php');
		if ( $conn->query( $log ) === TRUE ) {
		} else {
			echo "Error: " . $log . "<br>" . $conn->error;
		}
		mysqli_close( $conn );
		
		
	}
}

?>