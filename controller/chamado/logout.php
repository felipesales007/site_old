<!-- CÓDIGO RESPONSÁVEL POR FAZER A DESCONEXÃO DO USUÁRIO -->
<?php 
    require_once("logica_usuario");
    logout();
    $_SESSION["success"] = "Saída efetuada com sucesso!";
    header("Location: ../index");
    die();
?>