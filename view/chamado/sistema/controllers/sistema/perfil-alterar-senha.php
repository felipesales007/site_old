<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/perfil.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    // Obtem os dados de senhas
    $usuarios_senha_atual   = $_POST["usuarios_senha_atual"];
    $usuarios_senha_nova   = base64_encode($_POST["usuarios_senha_criar"]);

    // Verifica a senha
    if ($usuarios_senha_atual == $usuarios_senha) {
        // Altera os dados no banco
        if (usuario_alterar_senha($conexao, $usuarios_id, $usuarios_senha_nova)) {
            $_SESSION["success"] = "Senha alterada com sucesso";
            header("location: ../../views/usuario/perfil#alterar-senha");
        } else {
            $_SESSION["danger"] = "Erro ao alterar a senha";
            header("location: ../../views/usuario/perfil#alterar-senha");
        }	
    } else {
        $_SESSION["danger"] = "Senha atual incorreta";
        header("location: ../../views/usuario/perfil#alterar-senha");
    }	
?>