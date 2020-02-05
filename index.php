<!-- Redirecionamento para página principal -->
<?php
    header("location: http://www.felipesales.com.br/site_old/view/curriculo/perfil");
    require_once("controller/curriculo/notificacao.php");
    $_SESSION["success"] = "Seja bem vindo!";
?>