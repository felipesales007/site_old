<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/analista.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    // Obtem os dados do chamado
    $usuario_id     = $_POST["usuario_id"];
    $chamado_id     = $_POST["chamado_id"];
    $responsavel_id = $_POST["responsavel_id"];
    
    // Insere os dados no banco
    if (analista_enviar_chamado($conexao, $usuario_id, $chamado_id, $responsavel_id)) {
        $_SESSION["success"] = "Chamado enviado com sucesso";
        if ($usuarios_permissao_id == 4) {
            header("location: ../../views/tecnico/servicos");
        } else {
            header("location: ../../views/analista/chamado-global");
        }
        
    } else {
        $_SESSION["danger"] = "Erro ao enviar chamado";
        if ($usuarios_permissao_id == 4) {
            header("location: ../../views/tecnico/servicos");
        } else {
            header("location: ../../views/analista/chamado-global");
        }
    }	
?>