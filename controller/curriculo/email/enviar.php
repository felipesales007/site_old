<?php
    session_start();
    $nome = $_POST["mensagem_nome"];
    $email = $_POST["mensagem_email"];
    $mensagem = $_POST["mensagem_mensagem"];

    require_once("PHPMailerAutoload.php");

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.live.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "1felipesales007online@hotmail.com";
    $mail->Password = "perfilonline1";

    $mail->setFrom("1felipesales007online@hotmail.com", "Contato");
    $mail->addAddress("1felipesales007@hotmail.com");
    $mail->Subject = "Contato Perfil Online";
    $mail->msgHTML("<html>De: {$nome}<br/>Email: {$email}<br/><br/>Mensagem: {$mensagem}</html>");
    $mail->AltBody = "De: {$nome}\nEmail: {$email}\n\nMensagem: {$mensagem}";

    if($mail->send()) {
        $_SESSION["success"] = "Mensagem enviada com sucesso!";
        header("Location: ../../../view/curriculo/perfil");
    }else{
        $_SESSION["danger"] = "Erro ao enviar mensagem!" . $mail->ErroInfo;
        header("Location: ../../../view/curriculo/perfil");
    }
    die();
?>