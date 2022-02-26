<?php
date_default_timezone_set('America/Sao_Paulo');
 
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if((isset($_POST['email']) && !empty(trim($_POST['email']))) && (isset($_POST['mensagem']) && !empty(trim($_POST['mensagem'])))) {
 
	$nome = !empty($_POST['nome']) ? $_POST['nome'] : 'Não informado';
	$email = $_POST['email'];
	// $assunto = !empty($_POST['assunto']) ? utf8_decode($_POST['assunto']) : 'Não informado';
	$mensagem = $_POST['mensagem'];
	$data = date('d/m/Y H:i:s');
 
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = 'smtp.weblink.com.br';
	$mail->SMTPAuth = true;
	$mail->Username = 'contato@almirandradepersonal.com.br';
	$mail->Password = 'Pp@8905';
	$mail->Port = 587;
 
	$mail->setFrom('contato@almirandradepersonal.com.br');
	$mail->addAddress('contato@almirandradepersonal.com.br');
 
	$mail->isHTML(true);
	$mail->Subject = "Contato";
	$mail->Body = "Nome: {$nome}<br>
				   Email: {$email}<br>
				   Mensagem: {$mensagem}<br>
                   Data/hora: {$data}";
    $mail->SMTPDebug = 2;
 
	if($mail->send()) {
		echo 'Email enviado com sucesso.';
	} else {
		echo 'Email não enviado.';
	}
} else {
	echo 'Não enviado: informar o email e a mensagem.';
}