<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/tecnico.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    // Obtem dados do chamado
    $chamado_id          = $_POST["chamado_id"];
    $chamado_solucao     = $_POST["chamado_cancelar_chamado"];
    $chamado_situacao_id = 5; // 1 = aberto, 2 = enviado, 3 = resolvido, 4 = pendente, 5 = cancelado, 6 = reaberto
    
    // Insere os dados no banco
    if (tecnico_cancelar_chamado($conexao, $chamado_id, $chamado_solucao, $chamado_situacao_id)) {
        $_SESSION["success"] = "Chamado cancelado com sucesso";
        if ($usuarios_permissao_id == 4) {
            header("location: ../../views/tecnico/servicos");
        } else {
            header("location: ../../views/analista/chamado-global");
        }
        
    } else {
        $_SESSION["danger"] = "Erro ao cancelar o chamado";
        if ($usuarios_permissao_id == 4) {
            header("location: ../../views/tecnico/servicos");
        } else {
            header("location: ../../views/analista/chamado-global");
        }
    }	
?>