<?php 
    require_once("../model/chamado");
    require_once("logica_usuario");

    $id = $_POST['id'];
    removeChamado($conexao, $id);
    $_SESSION["success"] = "Chamado excluído com sucesso!";
    header("Location: ../view/lista_pendentes");
    die();
?>