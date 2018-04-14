<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/supervisor.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    // Obtem dados do chamado
    $ocorrencia_id     = $_POST["ocorrencia_id"];
    $ocorrencia_status = 1; // 1 = ativado, 2 = desativado
    
    // Insere os dados no banco
    if (desativar_ocorrencia($conexao, $ocorrencia_id, $ocorrencia_status)) {
        $_SESSION["success"] = "Ocorrência ativada com sucesso";
        header("location: ../../views/supervisor/dashboard");
    } else {
        $_SESSION["danger"] = "Erro ao ativar a ocorrência";
        header("location: ../../views/supervisor/dashboard");
    }	
?>