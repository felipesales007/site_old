<!-- CÓDIGO RESPONSÁVEL POR FAZER A CONEXÃO DO USUÁRIO -->
<?php
    require_once("../model/usuario.php");
    require_once("logica_usuario.php");

    $usuario = buscaUsuario($conexao, $_POST["login"], $_POST["senha"]);
    if($usuario == null) {
        $_SESSION["danger"] = "Usuário ou senha incorreta!";
        header("location: ../index.php");
    } else {
        $_SESSION["success"] = "Usuário logado com sucesso!";
        logaUsuario($usuario["login"]);
        header("location: ../view/chamado_novo.php");
    }
    die();
?>