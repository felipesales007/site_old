<?php
    include_once("conexao/banco-conexao-selects.php");

    $chamado_setor  = $_REQUEST['chamado_setor'];
    $chamado_status = 1; // 1 = ativo, 2 = desativado

    $sql = "SELECT * 
        FROM ocorrencias 
        WHERE ocorrencias_setor_id = '{$chamado_setor}' 
        AND ocorrencias_status_id = '{$chamado_status}' 
        ORDER BY ocorrencias_ocorrencia";
    $retorno = mysqli_query($conn, $sql);

    while ($registro = mysqli_fetch_assoc($retorno)) {
        $listar_ocorrencias[] = array(
            'ocorrencias_id' => $registro['ocorrencias_id'],
            'ocorrencias_ocorrencia' => utf8_encode($registro['ocorrencias_ocorrencia']),
        );
    }
    echo(json_encode($listar_ocorrencias));
?>