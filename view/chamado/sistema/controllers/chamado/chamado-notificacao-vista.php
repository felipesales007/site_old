<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/chamado.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    // Obtem ID do feedback via GET
    $chamados_id                     = $_POST['chamados_id'];
    $chamados_usuario_id             = $_POST['chamados_usuario_id'];
    $feedbacks_notificacao_status_id = 2; // 2 = visto (sem notificação), 1 = não visto (mostra notificação)
    $feedbacks_status_id             = 1; // 1 = ativo, 2 = desativado

    // Atualiza a visualização de notificação no banco de dados
    feedback_notificacao_vista($conexao, $chamados_id, $chamados_usuario_id, 
        $feedbacks_notificacao_status_id, $feedbacks_status_id);
?>