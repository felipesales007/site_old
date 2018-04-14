<?php
    include_once("../../models/conexao/banco-conexao.php");
    include_once("../../models/login.php");
    include_once("login-acesso.php");

    if ($_POST != null) {
        $usuario = $_POST["usuarios_usuario"];
        $senha   = base64_encode($_POST["usuarios_senha"]);

        // Recebe os dados do usuário e verifica o usuário e senha para acesso ao sistema
        $acesso_usuario = autenticar_login($conexao, $usuario, $senha);

        // Pega os dados do usuário 
        login_id($acesso_usuario["usuarios_id"]);
        login_usuario($acesso_usuario["usuarios_usuario"]);            
        $sexo      = $acesso_usuario["usuarios_sexo"];
        $permissao = $acesso_usuario["usuarios_permissao_id"];
        $status    = $acesso_usuario["usuarios_status_id"];
        
        if ($acesso_usuario == null) {
            $_SESSION["danger"] = "Usuário ou senha incorreta";
            header("location: ../../views/public/login");
            die();
        }
        if ($status == 2) {
            if ($sexo == "Feminino") {
                $_SESSION["danger"] = "Usuária desativada";
            } else {
                $_SESSION["danger"] = "Usuário desativado";
            }
            header("location: ../../views/public/login");
            die();
        } else {
            if ($permissao == 5) {
                if ($sexo == "Feminino") {
                    $_SESSION["success"] = "Usuária logada com sucesso";
                } else {
                    $_SESSION["success"] = "Usuário logado com sucesso";
                }
                header("location: ../../views/usuario/chamado-novo");
                die();
            }
            if ($permissao == 4) {
                if ($sexo == "Feminino") {
                    $_SESSION["success"] = "Técnica logada com sucesso";
                } else {
                    $_SESSION["success"] = "Técnico logado com sucesso";
                }
                header("location: ../../views/tecnico/servicos");
                die();
            }
            if ($permissao == 3) {
                if ($sexo == "Feminino") {
                    $_SESSION["success"] = "Analista logada com sucesso";
                } else {
                    $_SESSION["success"] = "Analista logado com sucesso";
                }
                header("location: ../../views/analista/chamado-global");
                die();
            }
            if ($permissao == 2) {
                if ($sexo == "Feminino") {
                    $_SESSION["success"] = "Supervisora logada com sucesso";
                } else {
                    $_SESSION["success"] = "Supervisor logado com sucesso";
                }
                header("location: ../../views/supervisor/dashboard");
                die();
            }
            if ($permissao == 1) {
                if ($sexo == "Feminino") {
                    $_SESSION["success"] = "Administradora logada com sucesso";
                } else {
                    $_SESSION["success"] = "Administrador logado com sucesso";
                }
                header("location: ../../views/administrador/administrador");
                die();
            }
        }
        die();
    }
?>