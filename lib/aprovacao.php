<?php

require( '../conectar.php' );
$nome = $_POST[ 'nome' ];
$data = $_POST[ 'data' ];
$hora = $_POST[ 'hora' ];
$status = $_POST['aprovacao'];
$canc = $_POST['cancelamento'];
$filial = $_POST['filial'];



$sql = "UPDATE agendamento SET status = '$status', descricaoCancelamento = '$canc' WHERE data = '$data' AND horario = '$hora' AND IdFilial = '$filial'";


if ( $conn->query( $sql ) === TRUE ) {
	header( 'location: ../admin/agendamentos' );
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );


?>