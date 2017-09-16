<?php
session_start();
$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

require_once("PHPMailerAutoload.php");

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = ' smtp.live.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "chamadoonline@hotmail.com";
$mail->Password = "Contatochamado";

$mail->setFrom("chamadoonline@hotmail.com", "Contato");
$mail->addAddress("felipesales007@hotmail.com");
$mail->Subject = "Contato Chamado Online";
$mail->msgHTML("<html>De: {$nome}<br/>Email: {$email}<br/><br/>Mensagem: {$mensagem}</html>");
$mail->AltBody = "De: {$nome}\nEmail: {$email}\n\nMensagem: {$mensagem}";

if($mail->send()) {
    $_SESSION["success"] = "Mensagem enviada com sucesso!";
    header("Location: ../formulario-novo");
}else{
    $_SESSION["danger"] = "Erro ao enviar mensagem!" . $mail->ErroInfo;
    header("Location: ../contato");
}
die();