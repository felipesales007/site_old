<?php 
    require_once("../model/chamado.php");
    require_once("logica_usuario.php");

    $id = $_POST['id'];
    removeChamado($conexao, $id);
    $_SESSION["success"] = "Chamado excluído com sucesso!";
    header("Location: ../view/lista_pendentes.php");
    die();
?>