<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/chamado.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    // Obtem ID do feedback via GET
    $feedback_id         = $_GET["feedback"];
    $chamado_id          = $_GET["chamado"];
    $feedbacks_status_id = 2; // 2 = desativado (invisível), 1 = ativo
    
    $ver = visualizar_chamado($conexao, $chamado_id);

    // Insere os dados no banco
    if (chamado_deletar_feedback($conexao, $feedback_id, $feedbacks_status_id)) {
        $_SESSION["success"] = "Feedback deletado com sucesso";
        if ($usuarios_permissao_id <= 3 && $ver["chamados_usuario_id"] != $usuarios_id) {
            header("location: ../../views/analista/chamado-visualizar?chamado=$chamado_id");
        } 
        if ($usuarios_permissao_id == 4 && $ver["chamados_usuario_id"] != $usuarios_id) {
            header("location: ../../views/tecnico/chamado-visualizar?chamado=$chamado_id");
        }
        if ($ver["chamados_usuario_id"] == $usuarios_id) {
            header("location: ../../views/usuario/chamado-visualizar?chamado=$chamado_id");
        }
    } else {
        $_SESSION["danger"] = "Erro ao deletar feedback";
        if ($usuarios_permissao_id <= 3 && $chamados_usuario_id != $usuarios_id) {
            header("location: ../../views/analista/chamado-visualizar?chamado=$chamado_id");
        }
        if ($usuarios_permissao_id == 4 && $ver["chamados_usuario_id"] != $usuarios_id) {
            header("location: ../../views/tecnico/chamado-visualizar?chamado=$chamado_id");
        }
        if ($ver["chamados_usuario_id"] == $usuarios_id) {
            header("location: ../../views/usuario/chamado-visualizar?chamado=$chamado_id");
        }
    }
?>