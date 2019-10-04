<?php
header('Content-Type: text/html; charset=UTF-8');
require_once('phpmailer/class.phpmailer.php');
 include('phpmailer/class.smtp.php'); 
$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->SMTPDebug = 1;
$mailer->IsHTML(true);
$mailer->Port = 587; //Indica a porta de conexão 
$mailer->Host = 'email-ssl.com.br';//Endereço do Host do SMTP 
$mailer->SMTPAuth = true; //define se haverá ou não autenticação 
$mailer->CharSet = 'UTF-8';
$mailer->Username = 'no-reply@avipfit.com'; //Login de autenticação do SMTP
$mailer->Password = 'Noreply@123'; //Senha de autenticação do SMTP
$mailer->FromName = 'AVIPfit - No reply'; //Nome que será exibido
$mailer->From = 'no-reply@avipfit.com'; //Obrigatório ser a mesma caixa postal configurada no remetente do SMTP
$mailer->AddAddress('daniel.mloure@live.com','Daniel');
//Destinatários
$mailer->Subject = 'Teste enviado através do PHP Mailer 
SMTPLW';
$mailer->Body = 'Este é um teste realizado com o PHP Mailer 
SMTPLW';
if(!$mailer->Send())
{
echo "Message was not sent";
echo "Mailer Error: " . $mailer->ErrorInfo; exit; 
}
print "E-mail enviado!"
?>