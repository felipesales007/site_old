<!-- GERENCIAMENTO DA SESSÃO DO USUÁRIO -->
<?php
    session_start();

    /* RETORNA SE O USUÁRIO ESTÁ LOGADO */
    function usuarioLogado() {
        return isset($_SESSION["usuario_logado"]);
    }

    /* SE O USUÁRIO NÃO ESTIVER LOGADO MOSTRA UMA NOTIFICAÇÃO */
    function verificaUsuario() {
        if(!usuarioLogado()) {
            $_SESSION["warning"] = "Acesso negado, por favor faça o login!";
            header("Location: login.php");
            die();
        }
    }

    /* RETORNA O NOME DO USUÁRIO LOGADO */
    function usuarioLogin() {
        return $_SESSION["usuario_logado"];
    }

    /* SE O USUÁRIO EXISTE É AUTENTICADO PARA ACESSAR A TELA */
    function logaUsuario($login) {
        $_SESSION["usuario_logado"] = $login;
    }

    /* SE O USUÁRIO SAIR SESSÃO ENCERRADA */
    function logout() {
        session_destroy();
        session_start();
    }
?>