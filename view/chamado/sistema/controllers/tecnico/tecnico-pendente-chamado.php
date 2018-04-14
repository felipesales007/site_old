<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/tecnico.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    // Obtem dados do chamado
    $chamado_id          = $_POST["chamado_id"];
    $chamado_situacao_id = 4; // 1 = aberto, 2 = enviado, 3 = resolvido, 4 = pendente, 5 = cancelado, 6 = reaberto
    
    // Insere os dados no banco
    if (tecnico_pendente_chamado($conexao, $chamado_id, $chamado_situacao_id)) {
        $_SESSION["success"] = "Alteração de status para pendente realizada com sucesso";
        if ($usuarios_permissao_id == 4) {
            header("location: ../../views/tecnico/servicos");
        } else {
            header("location: ../../views/analista/chamado-global");
        }
        
    } else {
        $_SESSION["danger"] = "Erro ao alterar o status do chamado para pendente";
        if ($usuarios_permissao_id == 4) {
            header("location: ../../views/tecnico/servicos");
        } else {
            header("location: ../../views/analista/chamado-global");
        }
    }	
?>