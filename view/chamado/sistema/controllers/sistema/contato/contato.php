<?php
    session_start();

    $nome     = $_POST["email_nome"];
    $setor    = $_POST["email_setor"];
    $email    = $_POST["email_email"];
    $telefone = $_POST["email_contato"];
    $motivo   = $_POST["email_motivo"];
    $mensagem = $_POST["email_mensagem"];

    require_once("PHPMailerAutoload.php");

    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->Host = 'smtp.live.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "chamadoonline@hotmail.com";
    $mail->Password = "Contatochamado";

    $mail->setFrom("chamadoonline@hotmail.com", "Contato");
    $mail->addAddress("felipesales007@hotmail.com");
    $mail->Subject = "Contato - Sistema de Chamados";
    $mail->msgHTML("<html>
                    <b>Nome:</b> {$nome}<br/>
                    <b>Setor:</b> {$setor}<br/>
                    <b>E-mail:</b> {$email}<br/>
                    <b>Telefone:</b> {$telefone}<br/><br/>

                    <b>Motivo:</b> {$motivo}<br/> 
                    <b>Mensagem:</b> {$mensagem}
                    </html>");
    $mail->AltBody = "
                    Nome: {$nome}\n
                    Setor: {$setor}\n
                    E-mail: {$email}\n
                    Telefone: {$telefone}\n\n

                    Motivo: {$motivo}\n
                    Mensagem: {$mensagem}";

    if($mail->send()) {
        $_SESSION["success"] = "Mensagem enviada com sucesso";
        header("Location: ../../../views/usuario/contato");
    }else{
        $_SESSION["danger"] = "Erro ao enviar mensagem";
        header("Location: ../../../views/usuario/contato");
    }
    die();
?>