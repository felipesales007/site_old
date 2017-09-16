<?php 
    require_once("banco-chamado.php"); 
    require_once("logica-usuario.php");
?> 
<?php
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $setor = $_POST['setor'];
    $ramal = $_POST['ramal'];
    $ip = $_POST['ip'];
    $problema = $_POST['problema'];
    $categoria_id = $_POST['categoria_id'];

    if(alteraChamado($conexao, $id, $nome, $setor, $ramal, $ip, $problema, $categoria_id))
    {
        $_SESSION["success"] = "Chamado alterado com sucesso!";
        header("location: ../lista-pendentes");
    }
    else
    {
        $_SESSION["danger"] = "Erro ao alterar o chamado!";
        header("location: ../formulario-alterar");
    }
?>