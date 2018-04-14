<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/supervisor.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    // Obtem dados do chamado
    $usuario_id        = $_POST["usuario_id"];
    $usuario_setor     = $_POST["usuario_setor"];
    $usuario_permissao = $_POST["usuario_permissao"];
    $usuario_status    = $_POST["usuario_status"];
    
    // Insere os dados no banco
    if (supervisor_atualizar_usuario($conexao, $usuario_id, $usuario_setor, $usuario_permissao, $usuario_status)) {
        $_SESSION["success"] = "Alteração de usuário realizada com sucesso";
        header("location: ../../views/supervisor/usuario-visualizar?usuario=$usuario_id");
    } else {
        $_SESSION["danger"] = "Erro ao alterar o usuário";
        header("location: ../../views/supervisor/usuario-visualizar?usuario=$usuario_id");
    }	
?>