<?php
session_start();
function usuarioLogado(){
    return isset($_SESSION["usuario_logado"]);
}

function verificaUsuario(){
    if(!usuarioLogado()){
        $_SESSION["warning"] = "Acesso negado, por favor faça o login!";
        header("Location: index");
        die();
    }
}

function usuarioLogin(){
    return $_SESSION["usuario_logado"];
}

function logaUsuario($login){
    $_SESSION["usuario_logado"] = $login;
}

function logout(){
    session_destroy();
    session_start();
}