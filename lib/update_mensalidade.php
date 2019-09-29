<?php

require( '../conectar.php' );
$cpf = $_POST['cpf'];
$nome = $_POST[ 'nome' ];
$status = $_POST[ 'status' ];
$comp = $_POST[ 'competencia' ];
$novacomp = explode("/", $comp);
list ($mes, $ano) = $novacomp;
$mes = $mes + 1;
$sql2 = 'nada';

if ($mes > 12){
	$mes = $mes - 12;
	$ano = $ano + 1;
}
$mes = str_pad($mes , 2 , '0' , STR_PAD_LEFT);
$novacomp = $mes.'/'.$ano;

	$sql3 = "SELECT * FROM pessoa WHERE cpf = '$cpf' AND inativo = '0'";
	$query = $conn->query($sql3);
	$num_rows = $query->num_rows;
	if( $num_rows > 0 ){
		$sql2 = "INSERT INTO pagamentos VALUES ('$cpf', 'Pendente', '$novacomp')";
		include('../conectar.php');
		if ( $conn->query( $sql2 ) === TRUE ) {
		} else {
			echo "Error: " . $sql2 . "<br>" . $conn->error;
		}
		mysqli_close( $conn );
	}


$sql = "UPDATE pagamentos SET status = '$status' WHERE cpf = '$cpf' AND competencia = '$comp'";


include('../conectar.php');
if ( $conn->query( $sql ) === TRUE ) {
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );


date_default_timezone_set('America/Sao_Paulo');
session_start();
$email2 = $_SESSION[ 'email' ];
$ip = $_SERVER[ 'REMOTE_ADDR' ];
$data = date( 'Y-m-d H:i:s' );

$sql = addslashes($sql);
$sql2 = addslashes($sql2);
$log = "INSERT INTO log (ip, data, tabela, usuario, codigo) VALUES ('$ip', '$data', 'pagamentos', '$email2', '$sql $sql2')";

include('../conectar.php');
if ( $conn->query( $log ) === TRUE ) {
	session_start();
	if($_SESSION['tipoPessoa'] == '1'){
	header( 'location: ../admin/mensalidades' );}
	else{
		header ('location: ../colab/mensalidades');
	}
} else {
	echo "Error: " . $log . "<br>" . $conn->error;
}
mysqli_close( $conn );

?>