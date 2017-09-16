<?php 
    require_once("banco-chamado.php");
    require_once("logica-usuario.php");

    $id = $_POST['id'];
    removeChamado($conexao, $id);
    $_SESSION["success"] = "Chamado excluído com sucesso!";
    header("Location: ../lista-pendentes");
    die();
?>