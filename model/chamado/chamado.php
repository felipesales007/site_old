<?php
    require_once("conecta.php");
    function listaChamado($conexao){
        $chamados = array();
        $resultado = mysqli_query($conexao, "SELECT C.*, DATE_FORMAT(DATE_SUB(hora, INTERVAL 3 HOUR), '%d/%m/%Y - %H:%i') AS hora, R.nome AS categoria_nome FROM chamados AS C JOIN categorias as R ON R.id = C.categoria_id ORDER BY id DESC");
        while($lista = mysqli_fetch_assoc($resultado)){
            array_push($chamados, $lista);
        }        
        return $chamados;
    }

    function listaChamadoPendente($conexao){
        $chamados = array();
        $resultado = mysqli_query($conexao, "SELECT C.*, DATE_FORMAT(DATE_SUB(hora, INTERVAL 3 HOUR), '%d/%m/%Y - %H:%i') AS hora, R.nome AS categoria_nome FROM chamados AS C JOIN categorias as R ON R.id = C.categoria_id WHERE C.categoria_id = 1 ORDER BY id DESC");
        while($lista = mysqli_fetch_assoc($resultado)){
            array_push($chamados, $lista);
        }
        return $chamados;
    }

    function listaChamadoResolvido($conexao){
        $chamados = array();
        $resultado = mysqli_query($conexao, "SELECT C.*, DATE_FORMAT(DATE_SUB(hora, INTERVAL 3 HOUR), '%d/%m/%Y - %H:%i') AS hora, R.nome AS categoria_nome FROM chamados AS C JOIN categorias as R ON R.id = C.categoria_id WHERE C.categoria_id = 2 ORDER BY id DESC");
        while($lista = mysqli_fetch_assoc($resultado)){
            array_push($chamados, $lista);
        }
        return $chamados;
    }

    function listaChamadoNaoResolvido($conexao){
        $chamados = array();
        $resultado = mysqli_query($conexao, "SELECT C.*, DATE_FORMAT(DATE_SUB(hora, INTERVAL 3 HOUR), '%d/%m/%Y - %H:%i') AS hora, R.nome AS categoria_nome FROM chamados AS C JOIN categorias as R ON R.id = C.categoria_id WHERE C.categoria_id = 3 ORDER BY id DESC");
        while($lista = mysqli_fetch_assoc($resultado)){
            array_push($chamados, $lista);
        }
        return $chamados;
    }

    function novoChamado($conexao, $nome, $setor, $ramal, $ip, $problema, $categoria_id)
    {
        $query = "INSERT INTO chamados (nome, setor, ramal, ip, problema, categoria_id) VALUES ('{$nome}', '{$setor}', '{$ramal}', '{$ip}', '{$problema}', '{$categoria_id}')";
        return mysqli_query($conexao, $query);
    }

    function alteraChamado($conexao, $id, $nome, $setor, $ramal, $ip, $problema, $categoria_id)
    {
        $query = "UPDATE chamados SET nome='{$nome}', setor='{$setor}', ramal='{$ramal}', ip='{$ip}', problema='{$problema}', categoria_id='{$categoria_id}' WHERE id='{$id}'";
        return mysqli_query($conexao, $query);
    }

    function removeChamado($conexao, $id){
        $query = "DELETE FROM chamados WHERE id = {$id}";
        return mysqli_query($conexao, $query);
    }

    function buscaChamado($conexao, $id){
        $query = "SELECT * FROM chamados WHERE id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }