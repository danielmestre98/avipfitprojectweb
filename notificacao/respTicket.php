<?php
mysqli_close( $conn );
include( '../conectar.php' );
$resulted = mysqli_query( $conn, "SELECT nome, titulo, email FROM ticket t INNER JOIN pessoa p ON (p.cpf = t.usuario) WHERE id = '$id'" );
if ( mysqli_num_rows( $resulted ) === 1 ) {
	
	$row = mysqli_fetch_assoc( $resulted );
	$nome = $row['nome'];
	$titulo = $row['titulo'];
	$email = $row['email'];
}
mysqli_close( $conn );

header( 'Content-Type: text/html; charset=UTF-8' );
require_once( '../phpmailer/class.phpmailer.php' );
include( '../phpmailer/class.smtp.php' );
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
$mailer->FromName = 'AVIPfit'; //Nome que será exibido
$mailer->From = 'no-reply@avipfit.com'; //Obrigatório ser a mesma caixa postal configurada no remetente do SMTP
$mailer->AddAddress( $email, $email );
//Destinatários
$mailer->Subject = 'Suporte AVIPfit';
$mailer->Body = '<p>Prezado(a), '.$nome.'.</p><p>Um comentário foi incluído pela equipe de analistas no ticket  '.$titulo.' de número de identificação (ID) '.$id.'</p><p>Por gentileza, acesse o menu suporte e aprovisione sua revisão.</p><p>Esta mensagem é automática e este e-mail não é monitorado, portanto, não deve ser respondido.</p>';
if ( !$mailer->Send() ) {
	echo "Message was not sent";
	echo "Mailer Error: " . $mailer->ErrorInfo;
	exit;
}
?>