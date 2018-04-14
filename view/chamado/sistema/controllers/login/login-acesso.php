<?php
    session_start();
    include_once("../../models/conexao/banco-conexao.php");
    include_once("../../models/login.php");
    include_once("../../models/chamado.php");
    include_once("../../models/analista.php"); 
    include_once("../../models/supervisor.php"); 

    // Pega o id do usuário logado
    function login_id($id) {
        $_SESSION["id"] = $id;
    }

    // Armazena o id do usuário logado
    function usuario_id() {
        return $_SESSION["id"];
    }

    // Pega o usuário logado
    function login_usuario($usuario) {
        $_SESSION["usuario"] = $usuario;
    }

    // Retorna se o usuário está logado no sistema
    function usuario_logado() {
        return isset($_SESSION["usuario"]);
    }
    
    // Verifica se o usuário está logado no sistema para utilizar a tela
    function verificar_acesso() {
        if(!usuario_logado()) {
            $_SESSION["warning"] = "Acesso negado, por favor faça o login";
            header("Location: ../public/login");
            die();
        }
    }

    // Deslogando do sistema
    function logout() {
        session_destroy();
        session_start();
    }

    ######################################
    # Dados do usuário logado no sistema #
    ######################################

    $usuario = usuario($conexao);

    $usuarios_id              = $usuario['usuarios_id'];
    $usuarios_usuario         = $usuario['usuarios_usuario'];
    $usuarios_senha           = base64_decode($usuario['usuarios_senha']);
    $usuarios_nome            = $usuario['usuarios_nome'];
    $usuarios_sobrenome       = $usuario['usuarios_sobrenome'];
    $usuarios_matricula       = $usuario['usuarios_matricula'];
    $usuarios_setor_id        = $usuario['usuarios_setor_id'];
    $usuarios_setor           = $usuario['usuarios_setor'];
    $usuarios_email           = $usuario['usuarios_email'];
    $usuarios_cpf             = base64_decode($usuario['usuarios_cpf']);
    $usuarios_telefone        = $usuario['usuarios_telefone'];
    $usuarios_celular         = $usuario['usuarios_celular'];
    $usuarios_data_nascimento = $usuario['usuarios_data_nascimento'];
    $usuarios_data_cadastro   = $usuario['usuarios_data_cadastro'];
    $usuarios_hora_cadastro   = $usuario['usuarios_hora_cadastro'];
    $usuarios_sexo            = $usuario['usuarios_sexo'];
    $usuarios_imagem          = $usuario['usuarios_imagem'];
    $usuarios_permissao_id    = $usuario['usuarios_permissao_id'];
    $usuarios_permissao       = $usuario['usuarios_permissao'];
    $usuarios_status_id       = $usuario['usuarios_status_id'];
    $usuarios_status          = $usuario['usuarios_status']; 
?>