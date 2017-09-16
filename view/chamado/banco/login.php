<?php
    require_once("banco-usuario.php");
    require_once("logica-usuario.php");

    $usuario = buscaUsuario($conexao, $_POST["login"], $_POST["senha"]);
    if($usuario == null){
        $_SESSION["danger"] = "Usuário ou senha incorreta!";
        header("location: ../index");
    }else{
        $_SESSION["success"] = "Usuário logado com sucesso!";
        logaUsuario($usuario["login"]);
        header("location: ../formulario-novo");
    }
    die();