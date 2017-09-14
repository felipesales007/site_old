<!-- PEGA AS INFORMAÇÕES INSERIDAS PARA PASSAR PARA O BANCO DE BADOS -->
<?php 
    require_once("../model/chamado.php");
    require_once("logica_usuario.php");

    $nome           = $_POST['nome'];
    $setor          = $_POST['setor'];
    $ramal          = $_POST['ramal'];
    $ip             = $_POST['ip'];
    $problema       = $_POST['problema'];
    $categoria_id   = $_POST['categoria_id'];

    if(novoChamado($conexao, $nome, $setor, $ramal, $ip, $problema, $categoria_id)) {
        $_SESSION["success"] = "Chamado salvo com sucesso!";
        header("location: ../view/chamado_novo.php");
    } else {
        $_SESSION["danger"] = "Erro ao salvar o chamado!";
        header("location: ../view/chamado_novo.php");
    }
?>