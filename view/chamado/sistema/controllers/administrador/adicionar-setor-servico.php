<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/administrador.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    if ($_POST != null) {
        $setor_id = $_POST['setores_servicos_nome'];

        // Insere os dados no banco
        if (adicionar_setor_servico($conexao, $setor_id)) {
            $_SESSION["success"] = "Setor de serviço adicionado com sucesso";   
            header("location: ../../views/administrador/administrador");
        } else {
            $_SESSION["danger"] = "Erro ao adicionar o setor, <b>ou ele já pode ser um setor de serviços ativo ou desativado</b>";
            header("location: ../../views/administrador/administrador");
        }
    }
?>