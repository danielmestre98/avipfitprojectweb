<?php

require( '../conectar.php' );
$nome = $_POST[ 'nome' ];
$id = $_POST['id'];
$data = $_POST[ 'data' ];
$hora = $_POST[ 'hora' ];
$status = $_POST['aprovacao'];
$canc = addslashes($_POST['cancelamento']);
$filial = $_POST['filial'];
$email = $_POST['email'];
$evento = $_POST['evento'];
$data = explode( "-", $data );

list( $ano, $mes, $dia ) = $data;
$diacomp = "$dia/$mes/$ano";
echo $evento;
$sql = "UPDATE agendamento SET status = '$status', descricaoCancelamento = '$canc' WHERE id = '$id'";

if ($evento == 'exp'){
	
if ( $conn->query( $sql ) === TRUE ) {
	session_start();
	if($status == 'Aprovado'){
		include('../notificacao/aprovExp.php');
	}else{
		if($status == 'Cancelado'){
			include('../notificacao/cancExp.php');
		}
	}
	if($_SESSION['tipoPessoa'] == '1'){
	header( 'location: ../admin/agendamentos' );}
	else{
		header ('location: ../colab/agendamentos');
	}
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );
}else{
	if ( $conn->query( $sql ) === TRUE ) {
	session_start();
	if($status == 'Aprovado'){
		include('../notificacao/aprovAval.php');
	}else{
		if($status == 'Cancelado'){
			include('../notificacao/cancAval.php');
		}
	}
	if($_SESSION['tipoPessoa'] == '1'){
	header( 'location: ../admin/agendamentos' );}
	else{
		header ('location: ../colab/agendamentos');
	}
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );
}
?>