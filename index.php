<!-- Redirecionamento para página principal -->
<?php
    header("location: view/curriculo/perfil.php");
    require_once("controller/curriculo/notificacao.php");
    $_SESSION["success"] = "Seja bem vindo!";
?>