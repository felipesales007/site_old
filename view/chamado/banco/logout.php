<?php 
    require_once("logica-usuario.php");
    logout();
    $_SESSION["success"] = "Saída efetuada com sucesso!";
    header("Location: ../index");
    die();