<!-- Redirecionamento para página principal -->
<?php
    header("location: https://www.felipesales.com.br/view/curriculo/perfil");
    require_once("controller/curriculo/notificacao.php");
    $_SESSION["success"] = "Seja bem vindo!";
?>