<?php
    function gerar_pdf($conexao, $chamados_id) {
        $sql = "SELECT chamados_id, chamados_problema, tecnico.usuarios_celular AS tecnico_celular, 
            solicitante.usuarios_celular AS usuarios_celular, tecnico.usuarios_email AS tecnico_email, 
            solicitante.usuarios_email AS usuarios_email, chamados_solucao, 
            solicitante.usuarios_nome AS usuarios_nome, tecnico.usuarios_nome AS tecnico_nome, ocorrencias_ocorrencia, 
            tecnico.usuarios_sobrenome AS tecnico_sobrenome, solicitante.usuarios_sobrenome AS usuarios_sobrenome, 
            tecnico.usuarios_telefone AS tecnico_telefone, solicitante.usuarios_telefone AS usuarios_telefone, 

            DATE_FORMAT(chamados_data_fechamento, '%d/%m/%Y') AS chamados_data_fechamento_data, 
            DATE_FORMAT(chamados_data_abertura, '%d/%m/%Y') AS chamados_data_abertura_data, 
            (SELECT setores_setor FROM setores WHERE setores_id = solicitante.usuarios_setor_id) AS usuarios_setor, 
            (SELECT setores_setor FROM setores WHERE setores_id = tecnico.usuarios_setor_id) AS tecnico_setor,
            (SELECT situacoes_nome FROM situacoes WHERE situacoes_id = chamados_situacao_id) AS chamados_situacao, 
            (SELECT prioridades_nome FROM prioridades WHERE prioridades_id = chamados_prioridade_id) AS chamados_prioridade 

            FROM chamados 
            INNER JOIN ocorrencias ON (chamados.chamados_ocorrencia_id = ocorrencias.ocorrencias_id) 
            INNER JOIN usuarios AS solicitante ON (solicitante.usuarios_id = chamados.chamados_usuario_id)
            LEFT JOIN usuarios AS tecnico ON (tecnico.usuarios_id = chamados.chamados_responsavel_id)
            WHERE chamados.chamados_id = '{$chamados_id}'";

        $visualizar = $conexao -> query($sql);
        return mysqli_fetch_assoc($visualizar);
    }
?>