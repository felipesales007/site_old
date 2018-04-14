<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/chamado.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    // Obtem ID do chamado via GET
    $chamados_id = $_GET["chamado"];
    
    // Insere os dados no banco
    if (chamado_deletar_anexo($conexao, $chamados_id)) {
        $_SESSION["success"] = "Anexo deletado com sucesso";
        header("location: ../../views/usuario/chamado-visualizar?chamado=$chamados_id");
    } else {
        $_SESSION["danger"] = "Erro ao deletar anexo";
        header("location: ../../views/usuario/chamado-visualizar?chamado=$chamados_id");
    }	
?>