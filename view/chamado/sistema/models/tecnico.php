<?php
    function listar_servicos_chamados_abertos($conexao, $usuarios_setor_id, $usuarios_id) {
        // chamados_situacao_id = 2 (enviado), 4 (pendente), 6 (reaberto)
        $listar_servicos_chamados_abertos = array();
        $sql = "SELECT chamados_id, solicitante.usuarios_nome AS usuarios_nome, chamados_situacao_id, 
            solicitante.usuarios_sobrenome AS usuarios_sobrenome, setores_setor, ocorrencias_ocorrencia, 
            chamados_problema, chamados_prioridade_id, prioridades_nome, tecnico.usuarios_nome AS tecnico_nome, 
            solicitante.usuarios_imagem AS usuarios_imagem, tecnico.usuarios_sobrenome AS tecnico_sobrenome,
            DATE_FORMAT(chamados_data_abertura, '%d/%m/%Y') AS chamados_data_abertura, situacoes_nome, 
            DATE_FORMAT(chamados_data_abertura, '%H:%i') AS chamados_hora_abertura 
            FROM chamados 
            INNER JOIN usuarios AS solicitante ON (chamados.chamados_usuario_id = solicitante.usuarios_id) 
            INNER JOIN usuarios AS tecnico ON (chamados.chamados_responsavel_id = tecnico.usuarios_id) 
            INNER JOIN setores ON (solicitante.usuarios_setor_id = setores.setores_id) 
            INNER JOIN ocorrencias ON (chamados.chamados_ocorrencia_id = ocorrencias.ocorrencias_id)  
            INNER JOIN prioridades ON (chamados.chamados_prioridade_id = prioridades.prioridades_id) 
            INNER JOIN situacoes ON (chamados_situacao_id = situacoes.situacoes_id) 
            WHERE chamados_setor_servico_id = '{$usuarios_setor_id}' AND tecnico.usuarios_id = '{$usuarios_id}'
            AND chamados_situacao_id = '2' OR chamados_situacao_id = '4' OR chamados_situacao_id = '6'
            ORDER BY chamados_prioridade_id ASC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($listar_servicos_chamados_abertos, $registro);
        }        
        return $listar_servicos_chamados_abertos;
    }

    ####################################################################################################

    function listar_servicos_chamados_fechados($conexao, $usuarios_setor_id, $usuarios_id) {
        // chamados_situacao_id = 3 (solucionado), 5 (não solucionado)
        $listar_servicos_chamados_fechados = array();
        $sql = "SELECT chamados_id, solicitante.usuarios_nome AS usuarios_nome, chamados_situacao_id, 
            solicitante.usuarios_sobrenome AS usuarios_sobrenome, setores_setor, ocorrencias_ocorrencia, 
            chamados_problema, chamados_prioridade_id, prioridades_nome, tecnico.usuarios_nome AS tecnico_nome, 
            solicitante.usuarios_imagem AS usuarios_imagem, tecnico.usuarios_sobrenome AS tecnico_sobrenome,
            DATE_FORMAT(chamados_data_abertura, '%d/%m/%Y') AS chamados_data_abertura, situacoes_nome, 
            DATE_FORMAT(chamados_data_abertura, '%H:%i') AS chamados_hora_abertura 
            FROM chamados 
            INNER JOIN usuarios AS solicitante ON (chamados.chamados_usuario_id = solicitante.usuarios_id) 
            INNER JOIN usuarios AS tecnico ON (chamados.chamados_responsavel_id = tecnico.usuarios_id) 
            INNER JOIN setores ON (solicitante.usuarios_setor_id = setores.setores_id) 
            INNER JOIN ocorrencias ON (chamados.chamados_ocorrencia_id = ocorrencias.ocorrencias_id)  
            INNER JOIN prioridades ON (chamados.chamados_prioridade_id = prioridades.prioridades_id) 
            INNER JOIN situacoes ON (chamados_situacao_id = situacoes.situacoes_id) 
            WHERE chamados_setor_servico_id = '{$usuarios_setor_id}' AND tecnico.usuarios_id = '{$usuarios_id}'
            AND chamados_situacao_id = '3' OR chamados_situacao_id = '5'
            ORDER BY chamados_id DESC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($listar_servicos_chamados_fechados, $registro);
        }        
        return $listar_servicos_chamados_fechados;
    }

    ####################################################################################################

    function tecnico_finalizar_chamado($conexao, $chamado_id, $chamado_solucao, $chamado_situacao_id) {
        $sql = "UPDATE chamados SET chamados_solucao = '{$chamado_solucao}', 
            chamados_situacao_id = '{$chamado_situacao_id}', chamados_data_fechamento = NOW()
            WHERE chamados_id = '{$chamado_id}'";
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function tecnico_cancelar_chamado($conexao, $chamado_id, $chamado_solucao, $chamado_situacao_id) {
        $sql = "UPDATE chamados SET chamados_solucao = '{$chamado_solucao}', 
            chamados_situacao_id = '{$chamado_situacao_id}', chamados_data_fechamento = NOW()
            WHERE chamados_id = '{$chamado_id}'";
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function tecnico_pendente_chamado($conexao, $chamado_id, $chamado_situacao_id) {
        $sql = "UPDATE chamados SET chamados_situacao_id = '{$chamado_situacao_id}'
            WHERE chamados_id = '{$chamado_id}'";
        return mysqli_query($conexao, $sql);
    }
?>