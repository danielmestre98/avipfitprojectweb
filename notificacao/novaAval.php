<?php
mysqli_close( $conn );
include( '../conectar.php' );
$resulted = mysqli_query( $conn, "SELECT cidade, IdFilial, rua, numero, bairro, estado FROM filial WHERE IdFilial = '$filial'" );
if ( mysqli_num_rows( $resulted ) === 1 ) {
	
	$row = mysqli_fetch_assoc( $resulted );
	$cidade = $row['cidade'];
	$bairro = $row['bairro'];
	$estado = $row['estado'];
	$rua = $row['rua'];
	$numero = $row['numero'];
}
mysqli_close( $conn );
include( '../conectar.php' );
$resulted = mysqli_query( $conn, "SELECT nome, email FROM pessoa WHERE cpf = '$cpf'" );
if ( mysqli_num_rows( $resulted ) === 1 ) {
	
	$row = mysqli_fetch_assoc( $resulted );
	$nome = $row['nome'];
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
$mailer->Subject = 'Agendamento de avaliação física AVIPfit registrado com sucesso';
$mailer->Body = '<p>Prezado(a), '.$nome.'.</p><p>Seu agendamento de avaliação física para '.$diacomp.' às '.$hora.'h, na filial '.$rua.', '.$numero.', '.$bairro.', '.$cidade.', '.$estado.' foi registrado com sucesso!</p><p>Você receberá um e-mail de confirmação assim que seu agendamento for aprovado.</p><p>Esta mensagem é automática e este e-mail não é monitorado, portanto, não deve ser respondido.</p>';
if ( !$mailer->Send() ) {
	echo "Message was not sent";
	echo "Mailer Error: " . $mailer->ErrorInfo;
	exit;
}
?>