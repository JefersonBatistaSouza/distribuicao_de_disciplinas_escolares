<?php
require_once './src/SMTP.php';
require_once './src/PHPMailer.php';
require_once './src/Exception.php';
require_once './functions.php';
require_once '../connect/conexao.php';

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email = filter_input(0, 'email', FILTER_VALIDATE_EMAIL);
$typeAccess = filter_input(0, 'typeAccess',FILTER_DEFAULT);

$linkConnect = new Conexao();

$token = getToken($linkConnect,$typeAccess,$email);
$linkNewPassword = "<a href='https://acture.net.br/IFRO/new-password.php?token={$token}&email={$email}&typeAccess={$typeAccess}'>"
. "https://acture.net.br/IFRO/newPassword.php?token={$token}&email={$email}&typeAccess={$typeAccess}</a>";
try{
$mail = new PHPMailer(true);
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
sendEmail($mail,$email, $linkNewPassword);
} catch (Exception $ex){
    echo "<div class='col-12 alert alert-danger'> Falha ao Enviar Chave por Email {$mail->ErrorInfo}</div>";
}