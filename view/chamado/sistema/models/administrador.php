<?php
    function usuarios_todos($conexao) {
        $usuarios_todos = array();
        $sql = "SELECT 
            usuarios_usuario, usuarios_nome, usuarios_sobrenome, 
            usuarios_matricula, setores_setor AS usuarios_setor, 
            usuarios_email, usuarios_telefone, usuarios_celular, 
            usuarios_data_nascimento, usuarios_sexo, usuarios_imagem,  
            permissoes_permissao AS usuarios_permissao, usuarios_id, 
            status_nome AS usuarios_status, usuarios_setor_id,
            DATE_FORMAT(usuarios_data_cadastro, '%d/%m/%Y') AS usuarios_data_cadastro, 
            DATE_FORMAT(usuarios_data_cadastro, '%H:%i') AS usuarios_hora_cadastro
            FROM usuarios 
            INNER JOIN setores ON (usuarios.usuarios_setor_id = setores.setores_id)
            INNER JOIN permissoes ON (usuarios.usuarios_permissao_id = permissoes.permissoes_id)
            INNER JOIN status ON (usuarios.usuarios_status_id = status.status_id)
            WHERE usuarios_status_id = '1'
            ORDER BY usuarios_usuario ASC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($usuarios_todos, $registro);
        }        
        return $usuarios_todos;
    }

    ####################################################################################################
    
    function usuarios_todos_desativado($conexao) {
        $usuarios_todos_desativado = array();
        $sql = "SELECT 
            usuarios_usuario, usuarios_nome, usuarios_sobrenome, 
            usuarios_matricula, setores_setor AS usuarios_setor, 
            usuarios_email, usuarios_telefone, usuarios_celular, 
            usuarios_data_nascimento, usuarios_sexo, usuarios_imagem,  
            permissoes_permissao AS usuarios_permissao, usuarios_id, 
            status_nome AS usuarios_status, usuarios_setor_id,
            DATE_FORMAT(usuarios_data_cadastro, '%d/%m/%Y') AS usuarios_data_cadastro, 
            DATE_FORMAT(usuarios_data_cadastro, '%H:%i') AS usuarios_hora_cadastro
            FROM usuarios 
            INNER JOIN setores ON (usuarios.usuarios_setor_id = setores.setores_id)
            INNER JOIN permissoes ON (usuarios.usuarios_permissao_id = permissoes.permissoes_id)
            INNER JOIN status ON (usuarios.usuarios_status_id = status.status_id)
            WHERE usuarios_status_id = '2'
            ORDER BY usuarios_id ASC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($usuarios_todos_desativado, $registro);
        }        
        return $usuarios_todos_desativado;
    }

    ####################################################################################################

    function administrador_atualizar_usuario($conexao, $usuario_id, $usuario_setor, $usuario_permissao, $usuario_status) {
        $sql = "UPDATE usuarios SET usuarios_setor_id = '{$usuario_setor}',
            usuarios_permissao_id = '{$usuario_permissao}', 
            usuarios_status_id = '{$usuario_status}' 
            WHERE usuarios_id = '{$usuario_id}'";
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function listar_usuarios_masculino($conexao) {
        $sql = "SELECT count(usuarios_id) AS quantidade 
            FROM usuarios 
            WHERE usuarios_sexo = 'Masculino' AND usuarios_status_id = '1'";
        $retorno = $conexao -> query($sql);

        return mysqli_fetch_assoc($retorno);
    }

    ####################################################################################################

    function listar_usuarios_feminino($conexao) {
        $sql = "SELECT count(usuarios_id) AS quantidade 
            FROM usuarios 
            WHERE usuarios_sexo = 'Feminino' AND usuarios_status_id = '1'";
        $retorno = $conexao -> query($sql);

        return mysqli_fetch_assoc($retorno);
    }

    ####################################################################################################

    function listar_usuarios_outro($conexao) {
        $sql = "SELECT count(usuarios_id) AS quantidade 
            FROM usuarios 
            WHERE usuarios_sexo = 'Outro' AND usuarios_status_id = '1'";
        $retorno = $conexao -> query($sql);

        return mysqli_fetch_assoc($retorno);
    }

    ####################################################################################################

    function listar_usuarios_total($conexao) {
        $sql = "SELECT count(usuarios_id) AS quantidade 
            FROM usuarios WHERE usuarios_status_id = '1'";
        $retorno = $conexao -> query($sql);

        return mysqli_fetch_assoc($retorno);
    }

    ####################################################################################################

    function listar_usuarios_masculino_desativados($conexao) {
        $sql = "SELECT count(usuarios_id) AS quantidade 
            FROM usuarios 
            WHERE usuarios_sexo = 'Masculino' AND usuarios_status_id = '2'";
        $retorno = $conexao -> query($sql);

        return mysqli_fetch_assoc($retorno);
    }

    ####################################################################################################

    function listar_usuarios_feminino_desativados($conexao) {
        $sql = "SELECT count(usuarios_id) AS quantidade 
            FROM usuarios 
            WHERE usuarios_sexo = 'Feminino' AND usuarios_status_id = '2'";
        $retorno = $conexao -> query($sql);

        return mysqli_fetch_assoc($retorno);
    }

    ####################################################################################################

    function listar_usuarios_outro_desativados($conexao) {
        $sql = "SELECT count(usuarios_id) AS quantidade 
            FROM usuarios 
            WHERE usuarios_sexo = 'Outro' AND usuarios_status_id = '2'";
        $retorno = $conexao -> query($sql);

        return mysqli_fetch_assoc($retorno);
    }

    ####################################################################################################

    function listar_usuarios_total_desativados($conexao) {
        $sql = "SELECT count(usuarios_id) AS quantidade 
            FROM usuarios WHERE usuarios_status_id = '2'";
        $retorno = $conexao -> query($sql);

        return mysqli_fetch_assoc($retorno);
    }

    ####################################################################################################

    function adicionar_setor($conexao, $setores_setor) {
        $setores_status_id = 1;
        $sql = "INSERT INTO setores (setores_setor, setores_status_id) 
            VALUES ('{$setores_setor}', '{$setores_status_id}')";
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function setores_todos($conexao) {
        $usuarios_todos = array();
        $sql = "SELECT setores_id, setores_setor FROM setores WHERE setores_status_id = '1' ORDER BY setores_setor ASC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($usuarios_todos, $registro);
        }        
        return $usuarios_todos;
    }

    ####################################################################################################

    function setores_todos_desativado($conexao) {
        $setores_todos_desativado = array();
        $sql = "SELECT setores_id, setores_setor FROM setores WHERE setores_status_id = '2' ORDER BY setores_setor ASC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($setores_todos_desativado, $registro);
        }        
        return $setores_todos_desativado;
    }

    ####################################################################################################

    function desativar_setor($conexao, $setores_id, $setores_status_id) {
        $sql = "UPDATE setores SET setores_status_id = '{$setores_status_id}'
            WHERE setores_id = '{$setores_id}'";

        if(mysqli_num_rows(mysqli_query($conexao, 
            "SELECT setores_servicos_id FROM setores_servicos WHERE setores_servicos_id = '{$setores_id}'")) > 0) {
            mysqli_query($conexao, "UPDATE setores_servicos SET setores_servicos_status_id = '{$setores_status_id}'
                WHERE setores_servicos_id = '{$setores_id}'");
        }

        if(mysqli_num_rows(mysqli_query($conexao, 
            "SELECT usuarios_id FROM usuarios WHERE usuarios_setor_id = '{$setores_id}'")) > 0) {
            mysqli_query($conexao, "UPDATE usuarios SET usuarios_status_id = '{$setores_status_id}'
                WHERE usuarios_setor_id = '{$setores_id}'");
        }

        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function ativar_setor($conexao, $setores_id, $setores_status_id) {
        $sql = "UPDATE setores SET setores_status_id = '{$setores_status_id}'
            WHERE setores_id = '{$setores_id}'";
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function adicionar_setor_servico($conexao, $setor_id) {
        $setores_servicos_status_id = 1;
        $sql = "INSERT INTO setores_servicos (setores_servicos_id, setores_servicos_nome, setores_servicos_status_id) 
            VALUES ('{$setor_id}', (SELECT setores_setor FROM setores WHERE setores_id = '{$setor_id}'), '{$setores_servicos_status_id}')";
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function setores_servicos_todos($conexao) {
        $setores_servicos_todos = array();
        $sql = "SELECT setores_servicos_id, setores_servicos_nome FROM setores_servicos 
            WHERE setores_servicos_status_id = '1' 
            ORDER BY setores_servicos_nome ASC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($setores_servicos_todos, $registro);
        }        
        return $setores_servicos_todos;
    }

    ####################################################################################################

    function setores_servicos_todos_desativados($conexao) {
        $setores_servicos_todos_desativados = array();
        $sql = "SELECT setores_servicos_id, setores_servicos_nome FROM setores_servicos 
            WHERE setores_servicos_status_id = '2' 
            ORDER BY setores_servicos_nome ASC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($setores_servicos_todos_desativados, $registro);
        }        
        return $setores_servicos_todos_desativados;
    }

    ####################################################################################################

    function desativar_setor_servicos($conexao, $setores_servicos_id, $setores_servicos_status_id) {
        $sql = "UPDATE setores_servicos SET setores_servicos_status_id = '{$setores_servicos_status_id}'
            WHERE setores_servicos_id = '{$setores_servicos_id}'";
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function ativar_setor_servicos($conexao, $setores_servicos_id, $setores_servicos_status_id) {
        $sql = "UPDATE setores_servicos SET setores_servicos_status_id = '{$setores_servicos_status_id}'
            WHERE setores_servicos_id = '{$setores_servicos_id}'";
        return mysqli_query($conexao, $sql);
    }
?>