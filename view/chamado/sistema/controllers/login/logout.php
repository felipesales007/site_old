<?php
    // Realiza a desconexão do usuário com o sistema
    include_once("login-acesso.php");
    logout();
    $_SESSION["success"] = "Saída efetuada com sucesso";
    header("Location: ../../../index");
    die();
?>