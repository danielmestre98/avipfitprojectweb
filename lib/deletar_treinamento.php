<?php
include('../conectar.php');
$nome = $_GET['nome'];


$sql = "DELETE FROM contem WHERE NomeTreinamento = '$nome'";
$sql2 = "UPDATE realiza SET Treinamento = 'Treinamento não cadastrado' WHERE Treinamento = '$nome'";
$sql3 = "DELETE FROM treinamento WHERE NomeTreinamento = '$nome'";

if ( $conn->query( $sql ) === TRUE ) {
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );
include('../conectar.php');
if ( $conn->query( $sql2 ) === TRUE ) {
} else {
	echo "Error: " . $sql2 . "<br>" . $conn->error;
}
mysqli_close( $conn );
include('../conectar.php');

if ( $conn->query( $sql3 ) === TRUE ) {
	header('location: ../admin/consulta_treinamento');
} else {
	echo "Error: " . $sql3 . "<br>" . $conn->error;
}
mysqli_close( $conn );


?>


<?php

?>