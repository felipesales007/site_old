<?php
    function usuario_setor($conexao, $usuarios_setor_id) {
        $usuario_setor = array();
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
            WHERE usuarios_setor_id = '{$usuarios_setor_id}' AND usuarios_status_id = '1'
            ORDER BY usuarios_id ASC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($usuario_setor, $registro);
        }        
        return $usuario_setor;
    }

    ####################################################################################################

    function usuario_setor_desativado($conexao, $usuarios_setor_id) {
        $usuario_setor_desativado = array();
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
            WHERE usuarios_setor_id = '{$usuarios_setor_id}' AND usuarios_status_id = '2'
            ORDER BY usuarios_id ASC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($usuario_setor_desativado, $registro);
        }        
        return $usuario_setor_desativado;
    }

    ####################################################################################################

    function usuario_setor_visualizar($conexao, $user_id) {
        $sql = "SELECT 
            usuarios_usuario, usuarios_nome, usuarios_sobrenome, 
            usuarios_matricula, setores_setor AS usuarios_setor, 
            usuarios_email, usuarios_telefone, usuarios_celular, 
            usuarios_data_nascimento, usuarios_sexo, usuarios_imagem,  
            permissoes_permissao AS usuarios_permissao, usuarios_id, usuarios_status_id,
            status_nome AS usuarios_status, usuarios_setor_id, usuarios_permissao_id,
            DATE_FORMAT(usuarios_data_cadastro, '%d/%m/%Y') AS usuarios_data_cadastro, 
            DATE_FORMAT(usuarios_data_cadastro, '%H:%i') AS usuarios_hora_cadastro
            FROM usuarios 
            INNER JOIN setores ON (usuarios.usuarios_setor_id = setores.setores_id)
            INNER JOIN permissoes ON (usuarios.usuarios_permissao_id = permissoes.permissoes_id)
            INNER JOIN status ON (usuarios.usuarios_status_id = status.status_id)
            WHERE usuarios_id = '{$user_id}'";

        $usuario = $conexao -> query($sql);
        return mysqli_fetch_assoc($usuario);
    }

    ####################################################################################################

    function listar_permissao($conexao) {
        $listra_permissao = array();
        $sql = "SELECT permissoes_id, permissoes_permissao FROM permissoes ORDER BY permissoes_permissao ASC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($listra_permissao, $registro);
        }        
        return $listra_permissao;
    }

    ####################################################################################################

    function listar_status($conexao) {
        $listra_status = array();
        $sql = "SELECT status_id, status_nome FROM status ORDER BY status_nome ASC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($listra_status, $registro);
        }        
        return $listra_status;
    }

    ####################################################################################################

    function supervisor_atualizar_usuario($conexao, $usuario_id, $usuario_setor, $usuario_permissao, $usuario_status) {
        $sql = "UPDATE usuarios SET usuarios_setor_id = '{$usuario_setor}',
            usuarios_permissao_id = '{$usuario_permissao}', 
            usuarios_status_id = '{$usuario_status}' 
            WHERE usuarios_id = '{$usuario_id}'";
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function adicionar_ocorrencia($conexao, $ocorrencias_ocorrencia, $usuarios_setor_id) {
        $ocorrencias_status_id = 1;
        $sql = "INSERT INTO ocorrencias (ocorrencias_ocorrencia, ocorrencias_setor_id, ocorrencias_status_id) 
            VALUES (
                '{$ocorrencias_ocorrencia}', '{$usuarios_setor_id}', '{$ocorrencias_status_id}')";
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function listar_ocorrencias($conexao, $usuarios_setor_id) {
        $listar_ocorrencias = array();
        $sql = "SELECT ocorrencias_id, ocorrencias_ocorrencia 
            FROM ocorrencias 
            WHERE ocorrencias_setor_id = '{$usuarios_setor_id}'
            AND ocorrencias_status_id = '1' 
            ORDER BY ocorrencias_ocorrencia ASC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($listar_ocorrencias, $registro);
        }        
        return $listar_ocorrencias;
    }

    ####################################################################################################

    function listar_ocorrencias_desativada($conexao, $usuarios_setor_id) {
        $listar_ocorrencias_desativada = array();
        $sql = "SELECT ocorrencias_id, ocorrencias_ocorrencia 
            FROM ocorrencias 
            WHERE ocorrencias_setor_id = '{$usuarios_setor_id}'
            AND ocorrencias_status_id = '2' 
            ORDER BY ocorrencias_ocorrencia ASC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($listar_ocorrencias_desativada, $registro);
        }        
        return $listar_ocorrencias_desativada;
    }

    ####################################################################################################

    function desativar_ocorrencia($conexao, $ocorrencia_id, $ocorrencia_status) {
        $sql = "UPDATE ocorrencias SET ocorrencias_status_id = '{$ocorrencia_status}'
            WHERE ocorrencias_id = '{$ocorrencia_id}'";
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function ativar_ocorrencia($conexao, $ocorrencia_id, $ocorrencia_status) {
        $sql = "UPDATE ocorrencias SET ocorrencias_status_id = '{$ocorrencia_status}'
            WHERE ocorrencias_id = '{$ocorrencia_id}'";
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function listar_chamados_resolvidos($conexao, $usuarios_setor_id) {
        $sql = "SELECT count(chamados_id) AS quantidade 
            FROM chamados 
            WHERE chamados_setor_servico_id = '{$usuarios_setor_id}'
            AND chamados_situacao_id = '3'";
        $retorno = $conexao -> query($sql);

        return mysqli_fetch_assoc($retorno);
    }

    ####################################################################################################

    function listar_chamados_cancelados($conexao, $usuarios_setor_id) {
        $sql = "SELECT count(chamados_id) AS quantidade 
            FROM chamados 
            WHERE chamados_setor_servico_id = '{$usuarios_setor_id}'
            AND chamados_situacao_id = '5'";
        $retorno = $conexao -> query($sql);

        return mysqli_fetch_assoc($retorno);
    }

    ####################################################################################################

    function listar_chamados_pendentes($conexao, $usuarios_setor_id) {
        $sql = "SELECT count(chamados_id) AS quantidade
            FROM chamados 
            WHERE chamados_setor_servico_id = '{$usuarios_setor_id}'
            AND chamados_situacao_id = '4'";
        $retorno = $conexao -> query($sql);

        return mysqli_fetch_assoc($retorno);
    }

    ####################################################################################################

    function listar_chamados_enviados($conexao, $usuarios_setor_id) {
        $sql = "SELECT count(chamados_id) AS quantidade
            FROM chamados 
            WHERE chamados_setor_servico_id = '{$usuarios_setor_id}'
            AND chamados_situacao_id = '2'";
        $retorno = $conexao -> query($sql);

        return mysqli_fetch_assoc($retorno);
    }

    ####################################################################################################

    function listar_chamados_abertos_ok($conexao, $usuarios_setor_id) {
        $sql = "SELECT count(chamados_id) AS quantidade
            FROM chamados 
            WHERE chamados_setor_servico_id = '{$usuarios_setor_id}'
            AND chamados_situacao_id = '1'";
        $retorno = $conexao -> query($sql);

        return mysqli_fetch_assoc($retorno);
    }

    ####################################################################################################

    function listar_chamados_reabertos($conexao, $usuarios_setor_id) {
        $sql = "SELECT count(chamados_id) AS quantidade
            FROM chamados 
            WHERE chamados_setor_servico_id = '{$usuarios_setor_id}'
            AND chamados_situacao_id = '6'";
        $retorno = $conexao -> query($sql);

        return mysqli_fetch_assoc($retorno);
    }

    ####################################################################################################

    function listar_chamados_todos($conexao, $usuarios_setor_id) {
        $sql = "SELECT count(chamados_id) AS quantidade
            FROM chamados 
            WHERE chamados_setor_servico_id = '{$usuarios_setor_id}'";
        $retorno = $conexao -> query($sql);

        return mysqli_fetch_assoc($retorno);
    }
?>