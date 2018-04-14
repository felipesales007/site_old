<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/supervisor.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    if ($_POST != null) {
        $ocorrencias_ocorrencia = $_POST['ocorrencias_ocorrencia'];

        // Insere os dados no banco
        if (adicionar_ocorrencia($conexao, $ocorrencias_ocorrencia, $usuarios_setor_id)) {
            $_SESSION["success"] = "Ocorrência adicionada com sucesso";   
            header("location: ../../views/supervisor/dashboard");
        } else {
            $_SESSION["danger"] = "Erro ao adicionar a ocorrência";
            header("location: ../../views/supervisor/dashboard");
        }
    }
?>