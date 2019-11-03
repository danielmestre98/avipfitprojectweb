<?php
// Conexão com o banco de dados
include( '../conectar.php' );
//Recupera os dados dos campos
session_start();
$cpf = $_POST['aluno'];
$protocolo = $_POST[ 'protocolo' ];
$massa = $_POST['massa'];
$estatura = $_POST['estatura'];
$cintura = $_POST['cintura'];
$quadril = $_POST['quadril'];
$subescapular = $_POST['subescapular'];
$triceps = $_POST['triceps'];
$biceps = $_POST['biceps'];
$axilarmed = $_POST['axilarmed'];
$peitoral = $_POST['peitoral'];
$suprailiaca = $_POST['suprailiaca'];
$abdominal = $_POST['abdominal'];
$torax = $_POST['torax'];
$antesq = $_POST['antesq'];
$antdir = $_POST['antdir'];
$perimetros = $_POST['abdominalper'];
$bracoreldir = $_POST['bracoreldir'];
$bracorelesq = $_POST['bracorelesq'];
$bracocondir = $_POST['bracocondir'];
$braconconesq = $_POST['bracoconesq'];
$coxaprox = $_POST['coxaprox'];
$coxamed = $_POST['coxamed'];
$panturrilha = $_POST['panturrilha'];
$gorduraideal = $_POST['gorideal'];
$meta = $_POST['meta'];

date_default_timezone_set('America/Sao_Paulo');
$data = date( 'Y-m-d' );


$sql = "INSERT INTO avalfisica (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, abdominalPer, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)
		VALUES ('$massa', '$estatura', '$subescapular', '$triceps', '$peitoral', '$axilarmed', '$suprailiaca', '$biceps', '$abdominal', '$coxaprox', '$coxamed', '$panturrilha', '$torax', '$cintura', '$quadril', '$perimetros', '$antdir', '$antesq', '$bracorelesq', '$bracoreldir', '$braconconesq', '$bracocondir', '$protocolo', '$data', '$cpf', '$gorduraideal', '$meta');";


if ( $conn->query( $sql ) === TRUE ) {} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );
include('../conectar.php');
$ip = $_SERVER[ 'REMOTE_ADDR' ];
$data = date( 'Y-m-d H:i:s' );
$sql = addslashes($sql);
session_start();
$email = $_SESSION['email'];
$log = "INSERT INTO log (ip, data, tabela, usuario, codigo) VALUES ('$ip', '$data', 'treinamento, contem', '$email', '$sql')";
if ( $conn->query( $log ) === TRUE ) {
		header('location: ../admin/aval_fisica');
	
} else {
	echo "Error: " . $log . "<br>" . $conn->error;
}
mysqli_close( $conn );







// Se houver mensagens de erro, exibe-as


?>