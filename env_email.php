<?php

include( 'conectar.php' );



$email = $_POST[ 'email' ];
$resulted = mysqli_query( $conn, "SELECT * FROM token WHERE email = '$email'") or die(mysqli_error($conn));
mysqli_close( $conn );
if ( mysqli_num_rows( $resulted ) == 1 ) {

	$row = mysqli_fetch_assoc( $resulted );
	$data = $row[ 'datahora' ];
	$token = $row[ 'token' ];
	$email = $row[ 'email' ];
} else {
	include('conectar.php');
	$token = bin2hex( random_bytes( 25 ) );
	date_default_timezone_set( 'America/Sao_Paulo' );
	$data = date( 'Y-m-d H:i:s' );
	$data = date( "Y-m-d H:i:s", strtotime( "+2 Hour", strtotime( $data ) ) );
	$sql = "INSERT INTO token (token, email, datahora) VALUES ('$token', '$email', '$data')";
	if ( $conn->query( $sql ) === TRUE ) {

	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	mysqli_close( $conn );
}



header( 'Content-Type: text/html; charset=UTF-8' );
require_once( 'phpmailer/class.phpmailer.php' );
include( 'phpmailer/class.smtp.php' );
$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->SMTPDebug = 1;
$mailer->IsHTML( true );
$mailer->Port = 587; //Indica a porta de conexão 
$mailer->Host = 'email-ssl.com.br'; //Endereço do Host do SMTP 
$mailer->SMTPAuth = true; //define se haverá ou não autenticação 
$mailer->CharSet = 'UTF-8';
$mailer->Username = 'no-reply@avipfit.com'; //Login de autenticação do SMTP
$mailer->Password = 'Noreply@123'; //Senha de autenticação do SMTP
$mailer->FromName = 'AVIPfit - No reply'; //Nome que será exibido
$mailer->From = 'no-reply@avipfit.com'; //Obrigatório ser a mesma caixa postal configurada no remetente do SMTP
$mailer->AddAddress( $email, $email );
//Destinatários
$mailer->Subject = 'Recuperação de senha AVIPfit';
$mailer->Body = '<p>Este é um email gerado automáticamente.</p><p>Você solicitou uma recuperação de senha no sistema da AVIPfit clique no link abaixo para ser direcionado para a página de criação da nova senha:</p><p><a href = "http://avipfittest.provisorio.ws/nova_senha?email=' . $email . '&token=' . $token . '">Clique aqui</a></p>';
if ( !$mailer->Send() ) {
	echo "Message was not sent";
	echo "Mailer Error: " . $mailer->ErrorInfo;
	exit;
}
header("Location: login?mail=yes");
?>