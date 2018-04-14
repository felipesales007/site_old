<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/chamado.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    if ($_POST != null) {
        $feedbacks_chamado_id            = $_POST['chamados_id'];
        $feedbacks_usuario_id            = $usuarios_id;
        $feedbacks_feedback              = $_POST['feedbacks_feedback'];
        $feedbacks_status_id             = 1; // 1 = ativo, 2 = desativado (invisível)
        $feedbacks_notificacao_status_id = 1; // 1 = não visto, 2 = visto (sem notificação)

        $ver = visualizar_chamado($conexao, $feedbacks_chamado_id);

        // Insere os dados no banco
        if (chamado_postar_feedback($conexao, $feedbacks_chamado_id, $feedbacks_usuario_id,
            $feedbacks_feedback, $feedbacks_status_id, $feedbacks_notificacao_status_id)) {

            $_SESSION["success"] = "Feedback postado com sucesso";
            if ($usuarios_permissao_id <= 3 && $ver["chamados_usuario_id"] != $usuarios_id) {
                header("location: ../../views/analista/chamado-visualizar?chamado=$feedbacks_chamado_id");
            }
            if ($usuarios_permissao_id == 4 && $ver["chamados_usuario_id"] != $usuarios_id) {
                header("location: ../../views/tecnico/chamado-visualizar?chamado=$feedbacks_chamado_id");
            }
            if ($ver["chamados_usuario_id"] == $usuarios_id) {
                header("location: ../../views/usuario/chamado-visualizar?chamado=$feedbacks_chamado_id");
            }
        } else {
            $_SESSION["danger"] = "Erro ao postar feedback";
            if ($usuarios_permissao_id <= 3 && $chamados_usuario_id != $usuarios_id) {
                header("location: ../../views/analista/chamado-visualizar?chamado=$feedbacks_chamado_id");
            }
            if ($usuarios_permissao_id == 4 && $ver["chamados_usuario_id"] != $usuarios_id) {
                header("location: ../../views/tecnico/chamado-visualizar?chamado=$feedbacks_chamado_id");
            }
            if ($ver["chamados_usuario_id"] == $usuarios_id) {
                header("location: ../../views/usuario/chamado-visualizar?chamado=$feedbacks_chamado_id");
            }
        }
    }
?>