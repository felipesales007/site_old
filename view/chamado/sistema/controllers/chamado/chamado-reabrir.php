<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/chamado.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    if ($_POST != null) {
        $chamados_id          = $_POST['chamados_id'];
        $chamados_situacao_id = 6; // 6 = reaberto, 5 = cancelado, 4 = pendente, 3 = resolvido, 2 = enviado, 1 = aberto

        // Insere os dados no banco
        if (chamado_reabrir($conexao, $chamados_id, $chamados_situacao_id)) {
            $_SESSION["success"] = "Chamado reaberto com sucesso";
            header("location: ../../views/usuario/chamado-visualizar?chamado=$chamados_id");
        } else {
            $_SESSION["danger"] = "Erro ao reabrir o chamado";
            header("location: ../../views/usuario/chamado-visualizar?chamado=$chamados_id");
        }
    }
?>