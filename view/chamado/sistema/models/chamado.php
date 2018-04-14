<?php
    function listar_setores_servicos($conexao) {
        $listar_setores_servicos = array();
        $sql = "SELECT * FROM setores_servicos WHERE setores_servicos_status_id = '1' ORDER BY setores_servicos_nome ASC";                                 
        $retorno = $conexao -> query($sql);

        while ($registro = $retorno -> fetch_array()) {
            array_push($listar_setores_servicos, $registro);
        }
        return $listar_setores_servicos;
    }

    ####################################################################################################

    function listar_prioridades($conexao) {
        $listar_prioridades = array();
        $sql                = "SELECT * FROM prioridades ORDER BY prioridades_id ASC";                                 
        $retorno            = $conexao -> query($sql);

        while ($registro = $retorno -> fetch_array()) {
            array_push($listar_prioridades, $registro);
        }
        return $listar_prioridades;
    }

    ####################################################################################################

    function chamado_novo($conexao, 
        $chamados_usuario_id, $chamados_ocorrencia_id, $chamados_problema, 
        $chamados_prioridade_id, $anexo, $chamados_setor_servico_id, $chamados_situacao_id) {

        $sql = "INSERT INTO chamados (
            chamados_usuario_id, chamados_ocorrencia_id, chamados_problema,
            chamados_prioridade_id, chamados_anexo, chamados_setor_servico_id, chamados_situacao_id) 
            VALUES (
                '{$chamados_usuario_id}', '{$chamados_ocorrencia_id}', '{$chamados_problema}',
                '{$chamados_prioridade_id}', '{$anexo}', '{$chamados_setor_servico_id}', '{$chamados_situacao_id}')";
        
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function ultimo_chamado($conexao, $chamados_usuario_id) {
        $id = "SELECT MAX(chamados_id) AS chamado FROM chamados WHERE chamados_usuario_id = '{$chamados_usuario_id}'";

        $chamado = $conexao -> query($id);
        return mysqli_fetch_assoc($chamado);
    }

    ####################################################################################################

    function listar_chamados_abertos($conexao) {
        $solicitante = usuario_id();
        $listar_chamados_abertos = array();
        $sql = "SELECT chamados_id, setores_servicos_nome, ocorrencias_ocorrencia, chamados_prioridade_id, 
            DATE_FORMAT(chamados_data_abertura, '%d/%m/%Y') AS chamados_data_abertura_data, 
            DATE_FORMAT(chamados_data_abertura, '%H:%i') AS chamados_data_abertura_hora, chamados_situacao_id, 
            prioridades_nome, situacoes_nome 
            FROM chamados 
            INNER JOIN setores_servicos ON (chamados.chamados_setor_servico_id = setores_servicos.setores_servicos_id) 
            INNER JOIN ocorrencias ON (chamados.chamados_ocorrencia_id = ocorrencias.ocorrencias_id) 
            INNER JOIN usuarios ON (chamados.chamados_usuario_id = usuarios.usuarios_id) 
            INNER JOIN prioridades ON (chamados.chamados_prioridade_id = prioridades.prioridades_id) 
            INNER JOIN situacoes ON (chamados.chamados_situacao_id = situacoes.situacoes_id) 
            WHERE usuarios.usuarios_id = '{$solicitante}' ORDER BY chamados_id DESC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($listar_chamados_abertos, $registro);
        }        
        return $listar_chamados_abertos;
    }

    ####################################################################################################

    function visualizar_chamado($conexao, $chamados_id) {
        $sql = "SELECT chamados_id, setores_servicos_nome, ocorrencias_ocorrencia, chamados_problema, 
            DATE_FORMAT(chamados_data_abertura, '%d/%m/%Y') AS chamados_data_abertura_data, 
            DATE_FORMAT(chamados_data_fechamento, '%d/%m/%Y') AS chamados_data_fechamento_data, 
            DATE_FORMAT(chamados_data_abertura, '%H:%i') AS chamados_data_abertura_hora, 
            DATE_FORMAT(chamados_data_fechamento, '%H:%i') AS chamados_data_fechamento_hora, 
            chamados_prioridade_id, chamados_situacao_id, chamados_anexo, chamados_usuario_id, 
            solicitante.usuarios_nome AS usuarios_nome, solicitante.usuarios_sobrenome AS usuarios_sobrenome, 
            tecnico.usuarios_nome AS tecnico_nome, tecnico.usuarios_telefone AS tecnico_telefone, 
            tecnico.usuarios_celular AS tecnico_celular, tecnico.usuarios_email AS tecnico_email, 
            tecnico.usuarios_imagem AS tecnico_imagem, chamados_solucao, chamados_setor_servico_id, 
            (SELECT setores_setor FROM setores WHERE setores_id = solicitante.usuarios_setor_id) AS usuarios_setor, 
            solicitante.usuarios_email AS usuarios_email, solicitante.usuarios_telefone AS usuarios_telefone, 
            solicitante.usuarios_celular AS usuarios_celular, solicitante.usuarios_imagem AS usuarios_imagem, 
            tecnico.usuarios_id AS tecnico_id, tecnico.usuarios_sobrenome AS tecnico_sobrenome,
            (SELECT setores_setor FROM setores WHERE setores_id = tecnico.usuarios_setor_id) AS tecnico_setor,
            (SELECT situacoes_nome FROM situacoes WHERE situacoes_id = chamados_situacao_id) AS chamados_situacao,
            (SELECT prioridades_nome FROM prioridades WHERE prioridades_id = chamados_prioridade_id) AS chamados_prioridade 
            FROM chamados 
            INNER JOIN setores_servicos ON (chamados.chamados_setor_servico_id = setores_servicos.setores_servicos_id) 
            INNER JOIN ocorrencias ON (chamados.chamados_ocorrencia_id = ocorrencias.ocorrencias_id) 
            INNER JOIN usuarios AS solicitante ON (solicitante.usuarios_id = chamados.chamados_usuario_id)
            LEFT JOIN usuarios AS tecnico ON (tecnico.usuarios_id = chamados.chamados_responsavel_id)
            WHERE chamados.chamados_id = '{$chamados_id}'";

        $visualizar = $conexao -> query($sql);
        return mysqli_fetch_assoc($visualizar);
    }

    ####################################################################################################

    function chamado_atualizar($conexao, $chamados_id, $chamados_problema, $chamados_prioridade_id, $anexo) {
        $sql = "UPDATE chamados SET chamados_problema = '{$chamados_problema}', 
            chamados_prioridade_id = '{$chamados_prioridade_id}', chamados_anexo = '{$anexo}' 
            WHERE chamados_id = '{$chamados_id}'";
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function chamado_deletar_anexo($conexao, $chamados_id) {
        $sql = "UPDATE chamados SET chamados_anexo = '' WHERE chamados_id = '{$chamados_id}'";
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function chamado_alterar_anexo($conexao, $chamados_id, $anexo) {
        $sql = "UPDATE chamados SET chamados_anexo = '{$anexo}' WHERE chamados_id = '{$chamados_id}'";	
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function chamado_reabrir($conexao, $chamados_id, $chamados_situacao_id) {
        $sql = "UPDATE chamados SET chamados_situacao_id = '{$chamados_situacao_id}', chamados_data_fechamento = '' 
            WHERE chamados_id = '{$chamados_id}'";	
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function chamado_postar_feedback($conexao, 
        $feedbacks_chamado_id, $feedbacks_usuario_id,
        $feedbacks_feedback, $feedbacks_status_id, $feedbacks_notificacao_status_id) {

        $sql = "INSERT INTO feedbacks (
            feedbacks_chamado_id, feedbacks_usuario_id, 
            feedbacks_feedback, feedbacks_status_id, feedbacks_notificacao_status_id) 
            VALUES (
                '{$feedbacks_chamado_id}', '{$feedbacks_usuario_id}', 
                '{$feedbacks_feedback}', '{$feedbacks_status_id}', '{$feedbacks_notificacao_status_id}')";
        
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################
    
    function listar_feedbacks($conexao, $chamado_id) {
        $feedbacks_status_id = 1; // 1 = ativo, 2 = desativado (invisível)
        $listar_feedbacks    = array();
        $sql = "SELECT feedbacks_usuario_id, usuarios_nome, usuarios_sobrenome, feedbacks_feedback, 
            DATE_FORMAT(feedbacks_data, '%d/%m/%Y') AS feedbacks_data_data, usuarios_imagem, 
            DATE_FORMAT(feedbacks_data, '%H:%i') AS feedbacks_data_hora, feedbacks_id 
            FROM feedbacks 
            INNER JOIN usuarios ON (feedbacks_usuario_id = usuarios.usuarios_id) 
            WHERE feedbacks_chamado_id = '{$chamado_id}' AND feedbacks_status_id = '{$feedbacks_status_id}' 
            ORDER BY feedbacks_id DESC";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($listar_feedbacks, $registro);
        }        
        return $listar_feedbacks;
    }

    ####################################################################################################

    function chamado_deletar_feedback($conexao, $feedback_id, $feedbacks_status_id) {
        $sql = "UPDATE feedbacks SET feedbacks_status_id = '{$feedbacks_status_id}' 
            WHERE feedbacks_id = '{$feedback_id}'";
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function feedback_notificacao($conexao, $chamado_id, $usuarios_id) {
        $feedbacks_status_id              = 1; // 1 = ativo, 2 = desativado (invisível)
        $feedbacks_notificacao_status_id  = 1; // 1 = ativo, 2 = desativado (invisível)
        $feedback_notificacao             = array();
        $sql = "SELECT feedbacks_id FROM feedbacks 
            WHERE feedbacks_chamado_id = '{$chamado_id}' 
            AND feedbacks_status_id = '{$feedbacks_status_id}'
            AND feedbacks_notificacao_status_id = '{$feedbacks_notificacao_status_id}' 
            AND feedbacks_usuario_id != '{$usuarios_id}'";
        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($feedback_notificacao, $registro);
        }        
        return $feedback_notificacao;
    }

    ####################################################################################################

    function feedback_notificacao_vista($conexao, $chamados_id, $chamados_usuario_id, 
        $feedbacks_notificacao_status_id, $feedbacks_status_id) {

        $sql = "UPDATE feedbacks SET feedbacks_notificacao_status_id = '{$feedbacks_notificacao_status_id}' 
            WHERE feedbacks_chamado_id = '{$chamados_id}' 
            AND feedbacks_usuario_id != '{$chamados_usuario_id}' 
            AND feedbacks_status_id = '{$feedbacks_status_id}'";
        mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function listar_historico($conexao, $chamado_id) {
        $listar_historico = array();
        $sql = "SELECT usuarios_usuario, usuarios_nome, usuarios_imagem, 
        DATE_FORMAT(historico_chamados_data, '%d/%m/%Y') AS historico_chamados_data_data, 
        DATE_FORMAT(historico_chamados_data, '%H:%i') AS historico_chamados_data_hora, 
        historico_chamados_ocorrencia, historico_chamados_acao
        FROM historico_chamados 
        INNER JOIN usuarios ON (historico_chamados_usuario_id = usuarios.usuarios_id) 
        WHERE historico_chamados_chamado_id = '{$chamado_id}' 
        ORDER BY historico_chamados_id DESC";

        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($listar_historico, $registro);
        }        
        return $listar_historico;
    }
?>