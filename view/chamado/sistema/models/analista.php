<?php
    function listar_chamados_setor_abertos($conexao, $usuarios_setor_id) {
        $status = 1; // 1 = aberto, 2 = enviado, 3 = resolvido, 4 = pendente, 5 = cancelado, 6 = reaberto
        $listar_chamados_abertos = array();
        $sql = "SELECT chamados_id, usuarios_nome, usuarios_sobrenome, setores_setor, ocorrencias_ocorrencia, 
            chamados_problema, chamados_prioridade_id, prioridades_nome, usuarios_imagem, 
            DATE_FORMAT(chamados_data_abertura, '%d/%m/%Y') AS chamados_data_abertura,
            DATE_FORMAT(chamados_data_abertura, '%H:%i') AS chamados_hora_abertura
            FROM chamados 
            INNER JOIN usuarios ON (chamados.chamados_usuario_id = usuarios.usuarios_id) 
            INNER JOIN setores ON (usuarios.usuarios_setor_id = setores.setores_id) 
            INNER JOIN ocorrencias ON (chamados.chamados_ocorrencia_id = ocorrencias.ocorrencias_id) 
            INNER JOIN prioridades ON (chamados.chamados_prioridade_id = prioridades.prioridades_id) 
            WHERE chamados_setor_servico_id = '{$usuarios_setor_id}'
            AND chamados_situacao_id = '{$status}' ORDER BY chamados_prioridade_id ASC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()){
            array_push($listar_chamados_abertos, $registro);
        }        
        return $listar_chamados_abertos;
    }

    ####################################################################################################

    function listar_responsaveis($conexao, $usuarios_setor_id) {
        $usuarios_status_id = 1; // 1 = ativo, 2 = desativado
        $listar_responsaveis = array();
        $sql = "SELECT usuarios_id, usuarios_nome, usuarios_sobrenome 
            FROM usuarios 
            WHERE usuarios_setor_id = '{$usuarios_setor_id}' 
            AND usuarios_permissao_id BETWEEN '1' AND '4' 
            AND usuarios_status_id = '{$usuarios_status_id}' 
            ORDER BY usuarios_nome ASC";                                 
        $retorno = $conexao -> query($sql);

        while ($registro = $retorno -> fetch_array()) {
            array_push($listar_responsaveis, $registro);
        }
        return $listar_responsaveis;
    }

    ####################################################################################################

    function analista_enviar_chamado($conexao, $usuario_id, $chamado_id, $responsavel_id) {
        $chamados_situacao_id = 2; // 1 = aberto, 2 = enviado, 3 = resolvido, 4 = pendente, 5 = cancelado, 6 = reaberto
        $sql = "UPDATE chamados SET chamados_usuario_enviou_id = '{$usuario_id}',
            chamados_responsavel_id = '{$responsavel_id}', 
            chamados_situacao_id = '{$chamados_situacao_id}' 
            WHERE chamados_id = '{$chamado_id}'";
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function analista_responsaveis_demanda($conexao, $usuarios_setor_id) {
        $usuarios_status_id = 1; // 1 = ativo, 2 = desativado
        $analista_responsaveis_demanda = array();
        $sql = "SELECT usuarios_id, usuarios_nome, usuarios_sobrenome, usuarios_imagem 
            FROM usuarios 
            WHERE usuarios_setor_id = '{$usuarios_setor_id}' 
            AND usuarios_permissao_id BETWEEN '1' AND '4' 
            AND usuarios_status_id = '{$usuarios_status_id}' 
            ORDER BY usuarios_nome ASC";
        $retorno = $conexao -> query($sql);

        while ($registro = $retorno -> fetch_array()) {
            array_push($analista_responsaveis_demanda, $registro);
        }
        return $analista_responsaveis_demanda;
    }

    ####################################################################################################

    function responsaveis_demanda_enviado($conexao, $usuarios_setor_id, $responsavel_id) {
        $usuarios_status_id = 1; // 1 = ativo, 2 = desativado
        $chamados_situacao_id = 2; // 2 = enviado
        $responsaveis_demanda_enviado = array();
        $sql = "SELECT usuarios_id, COUNT(chamados_situacao_id) AS enviado
            FROM usuarios 
            INNER JOIN chamados ON (usuarios.usuarios_id = chamados.chamados_responsavel_id)
            WHERE chamados_responsavel_id = '{$responsavel_id}'
            AND usuarios_setor_id = '{$usuarios_setor_id}' 
            AND usuarios_permissao_id BETWEEN '1' AND '4' 
            AND usuarios_status_id = '{$usuarios_status_id}'
            AND chamados_situacao_id = '{$chamados_situacao_id}'";
        $retorno = $conexao -> query($sql);

        while ($registro = $retorno -> fetch_array()) {
            array_push($responsaveis_demanda_enviado, $registro);
        }
        return $responsaveis_demanda_enviado;
    }

    ####################################################################################################

    function responsaveis_demanda_resolvido($conexao, $usuarios_setor_id, $responsavel_id) {
        $usuarios_status_id = 1; // 1 = ativo, 2 = desativado
        $chamados_situacao_id = 3; // 3 = resolvido
        $responsaveis_demanda_resolvido = array();
        $sql = "SELECT usuarios_id, COUNT(chamados_situacao_id) AS resolvido
            FROM usuarios 
            INNER JOIN chamados ON (usuarios.usuarios_id = chamados.chamados_responsavel_id)
            WHERE chamados_responsavel_id = '{$responsavel_id}'
            AND usuarios_setor_id = '{$usuarios_setor_id}' 
            AND usuarios_permissao_id BETWEEN '1' AND '4' 
            AND usuarios_status_id = '{$usuarios_status_id}'
            AND chamados_situacao_id = '{$chamados_situacao_id}'";
        $retorno = $conexao -> query($sql);

        while ($registro = $retorno -> fetch_array()) {
            array_push($responsaveis_demanda_resolvido, $registro);
        }
        return $responsaveis_demanda_resolvido;
    }

    ####################################################################################################

    function responsaveis_demanda_pendente($conexao, $usuarios_setor_id, $responsavel_id) {
        $usuarios_status_id = 1; // 1 = ativo, 2 = desativado
        $chamados_situacao_id = 4; // 4 = pendente
        $responsaveis_demanda_pendente = array();
        $sql = "SELECT usuarios_id, COUNT(chamados_situacao_id) AS pendente
            FROM usuarios 
            INNER JOIN chamados ON (usuarios.usuarios_id = chamados.chamados_responsavel_id)
            WHERE chamados_responsavel_id = '{$responsavel_id}'
            AND usuarios_setor_id = '{$usuarios_setor_id}' 
            AND usuarios_permissao_id BETWEEN '1' AND '4' 
            AND usuarios_status_id = '{$usuarios_status_id}'
            AND chamados_situacao_id = '{$chamados_situacao_id}'";
        $retorno = $conexao -> query($sql);

        while ($registro = $retorno -> fetch_array()) {
            array_push($responsaveis_demanda_pendente, $registro);
        }
        return $responsaveis_demanda_pendente;
    }

    ####################################################################################################

    function responsaveis_demanda_cancelado($conexao, $usuarios_setor_id, $responsavel_id) {
        $usuarios_status_id = 1; // 1 = ativo, 2 = desativado
        $chamados_situacao_id = 5; // 5 = cancelado
        $responsaveis_demanda_cancelado = array();
        $sql = "SELECT usuarios_id, COUNT(chamados_situacao_id) AS cancelado
            FROM usuarios 
            INNER JOIN chamados ON (usuarios.usuarios_id = chamados.chamados_responsavel_id)
            WHERE chamados_responsavel_id = '{$responsavel_id}'
            AND usuarios_setor_id = '{$usuarios_setor_id}' 
            AND usuarios_permissao_id BETWEEN '1' AND '4' 
            AND usuarios_status_id = '{$usuarios_status_id}'
            AND chamados_situacao_id = '{$chamados_situacao_id}'";
        $retorno = $conexao -> query($sql);

        while ($registro = $retorno -> fetch_array()) {
            array_push($responsaveis_demanda_cancelado, $registro);
        }
        return $responsaveis_demanda_cancelado;
    }

    ####################################################################################################

    function responsaveis_demanda_reaberto($conexao, $usuarios_setor_id, $responsavel_id) {
        $usuarios_status_id = 1; // 1 = ativo, 2 = desativado
        $chamados_situacao_id = 6; // 6 = reaberto
        $responsaveis_demanda_reaberto = array();
        $sql = "SELECT usuarios_id, COUNT(chamados_situacao_id) AS reaberto
            FROM usuarios 
            INNER JOIN chamados ON (usuarios.usuarios_id = chamados.chamados_responsavel_id)
            WHERE chamados_responsavel_id = '{$responsavel_id}'
            AND usuarios_setor_id = '{$usuarios_setor_id}' 
            AND usuarios_permissao_id BETWEEN '1' AND '4' 
            AND usuarios_status_id = '{$usuarios_status_id}'
            AND chamados_situacao_id = '{$chamados_situacao_id}'";
        $retorno = $conexao -> query($sql);

        while ($registro = $retorno -> fetch_array()) {
            array_push($responsaveis_demanda_reaberto, $registro);
        }
        return $responsaveis_demanda_reaberto;
    }

    ####################################################################################################

    function listar_pesquisar_chamados($conexao, $usuarios_setor_id) {
        // chamados_situacao_id = 2 (enviado), 4 (pendente), 6 (reaberto)
        $listar_pesquisar_chamados = array();
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
            WHERE chamados_setor_servico_id = '{$usuarios_setor_id}' 
            AND chamados_situacao_id = '2' OR chamados_situacao_id = '4' OR chamados_situacao_id = '6'
            ORDER BY chamados_prioridade_id ASC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()){
            array_push($listar_pesquisar_chamados, $registro);
        }        
        return $listar_pesquisar_chamados;
    }

    ####################################################################################################

    function listar_pesquisar_chamados_fechados($conexao, $usuarios_setor_id) {
        // chamados_situacao_id = 3 (resolvido), 5 (cancelado)
        $listar_pesquisar_chamados_fechados = array();
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
            INNER JOIN situacoes ON (chamados_setor_servico_id = situacoes.situacoes_id) 
            WHERE chamados_setor_servico_id = '{$usuarios_setor_id}' 
            AND chamados_situacao_id = '3' OR chamados_situacao_id = '5'
            ORDER BY chamados_prioridade_id ASC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()){
            array_push($listar_pesquisar_chamados_fechados, $registro);
        }        
        return $listar_pesquisar_chamados_fechados;
    }
?>