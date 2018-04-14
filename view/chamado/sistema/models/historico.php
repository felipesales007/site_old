<?php
    function listar_historico_usuario($conexao, $usuarios_id) {
        $listar_historico_usuario = array();
        $sql = "SELECT chamados_id, usuarios_nome, usuarios_sobrenome, usuarios_imagem, 
            historico_chamados_acao, historico_chamados_ocorrencia, setores_setor, 
            DATE_FORMAT(historico_chamados_data, '%d/%m/%Y') AS historico_chamados_data_data, 
            DATE_FORMAT(historico_chamados_data, '%H:%i') AS historico_chamados_data_hora
            FROM historico_chamados 
            INNER JOIN chamados ON (historico_chamados_chamado_id = chamados_id) 
            INNER JOIN usuarios ON (chamados_usuario_id = usuarios_id) 
            INNER JOIN setores ON (usuarios_setor_id = setores_id)
            WHERE historico_chamados_usuario_id = '{$usuarios_id}' 
            ORDER BY historico_chamados_id DESC";

        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($listar_historico_usuario, $registro);
        }        
        return $listar_historico_usuario;
    }

    ####################################################################################################

    function listar_historico_perfil($conexao, $usuarios_id) {
        $listar_historico_usuario = array();
        $sql = "SELECT usuarios_nome, usuarios_sobrenome, usuarios_imagem, 
            historico_perfil_acao, historico_perfil_ocorrencia, setores_setor, 
            DATE_FORMAT(historico_perfil_data, '%d/%m/%Y') AS historico_perfil_data_data, 
            DATE_FORMAT(historico_perfil_data, '%H:%i') AS historico_perfil_data_hora
            FROM historico_perfil 
            INNER JOIN usuarios ON (historico_perfil_usuario_id = usuarios_id) 
            INNER JOIN setores ON (usuarios_setor_id = setores_id)
            WHERE historico_perfil_usuario_id = '{$usuarios_id}' 
            ORDER BY historico_perfil_id DESC";

        $retorno = $conexao -> query($sql);

        while($registro = $retorno -> fetch_array()) {
            array_push($listar_historico_usuario, $registro);
        }        
        return $listar_historico_usuario;
    }
?>