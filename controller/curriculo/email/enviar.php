<?php
    session_start();
    $nome = $_POST["mensagem_nome"];
    $email = $_POST["mensagem_email"];
    $mensagem = $_POST["mensagem_mensagem"];

    require_once("PHPMailerAutoload.php");

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.googlemail.com';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Username = "felipesales.info@gmail.com";
    $mail->Password = "langames";

    $mail->setFrom("felipesales.info@gmail.com", "Contato");
    $mail->addAddress("felipesales007@hotmail.com");
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