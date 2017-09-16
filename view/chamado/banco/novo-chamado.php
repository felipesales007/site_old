<?php 
require_once("banco-chamado.php");
require_once("logica-usuario.php");
?>
<?php

        $nome = $_POST['nome'];
        $setor = $_POST['setor'];
        $ramal = $_POST['ramal'];
        $ip = $_POST['ip'];
        $problema = $_POST['problema'];
        $categoria_id = $_POST['categoria_id'];

        if(novoChamado($conexao, $nome, $setor, $ramal, $ip, $problema, $categoria_id))
        {
            $_SESSION["success"] = "Chamado salvo com sucesso!";
            header("location: ../formulario-novo");
        }
        else
        {
            $_SESSION["danger"] = "Erro ao salvar o chamado!";
            header("location: ../formulario-novo");
        }
?>