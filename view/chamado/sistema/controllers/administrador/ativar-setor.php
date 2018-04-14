<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/administrador.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    // Obtem dados do chamado
    $setores_id        = $_POST["setor_id"];
    $setores_status_id = 1; // 1 = ativado, 2 = desativado
    
    // Insere os dados no banco
    if (ativar_setor($conexao, $setores_id, $setores_status_id)) {
        $_SESSION["success"] = "Setor ativo com sucesso";
        header("location: ../../views/administrador/administrador");
    } else {
        $_SESSION["danger"] = "Erro ao ativar o setor";
        header("location: ../../views/administrador/administrador");
    }	
?>