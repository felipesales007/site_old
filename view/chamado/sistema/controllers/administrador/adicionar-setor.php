<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/administrador.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    if ($_POST != null) {
        $setores_setor = $_POST['setores_setor'];

        // Insere os dados no banco
        if (adicionar_setor($conexao, $setores_setor)) {
            $_SESSION["success"] = "Setor adicionado com sucesso";   
            header("location: ../../views/administrador/administrador");
        } else {
            $_SESSION["danger"] = "Erro ao adicionar o setor, <b>ou ele já pode existir em setor ativo ou desativado</b>";
            header("location: ../../views/administrador/administrador");
        }
    }
?>