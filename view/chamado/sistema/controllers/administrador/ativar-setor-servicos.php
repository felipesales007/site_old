<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/administrador.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    // Obtem dados do chamado
    $setores_servicos_id        = $_POST["setor_servicos_id"];
    $setores_servicos_status_id = 1; // 1 = ativado, 2 = desativado
    
    // Insere os dados no banco
    if (ativar_setor_servicos($conexao, $setores_servicos_id, $setores_servicos_status_id)) {
        $_SESSION["success"] = "Setor de serviços ativado com sucesso";
        header("location: ../../views/administrador/administrador");
    } else {
        $_SESSION["danger"] = "Erro ao ativar o setor de serviços";
        header("location: ../../views/administrador/administrador");
    }	
?>