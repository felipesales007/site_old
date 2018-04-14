<?php
    function listar_setores($conexao) {
        $listar_setores = array();
        $sql            = "SELECT * FROM setores WHERE setores_status_id = '1' ORDER BY setores_setor ASC";                                 
        $retorno        = $conexao -> query($sql);

        while ($registro = $retorno -> fetch_array()) {
            array_push($listar_setores, $registro);
        }
        return $listar_setores;
    }

    ####################################################################################################

    function login_criar_conta($conexao, 
        $usuarios_usuario_criar, $usuarios_nome, $usuarios_sobrenome,
        $usuarios_matricula, $usuarios_senha_criar, $usuarios_setor,
        $usuarios_telefone, $usuarios_celular, $usuarios_email,
        $usuarios_data_nascimento, $usuarios_cpf, $usuarios_sexo,
        $imagem, $usuarios_permissao_id, $usuarios_status_id) {

        $sql = "INSERT INTO usuarios (
            usuarios_usuario, usuarios_nome, usuarios_sobrenome,
            usuarios_matricula, usuarios_senha, usuarios_setor_id,
            usuarios_telefone, usuarios_celular, usuarios_email,
            usuarios_data_nascimento, usuarios_cpf, usuarios_sexo,
            usuarios_imagem, usuarios_permissao_id, usuarios_status_id) 
            VALUES (
                '{$usuarios_usuario_criar}', '{$usuarios_nome}', '{$usuarios_sobrenome}',
                '{$usuarios_matricula}', '{$usuarios_senha_criar}', '{$usuarios_setor}',
                '{$usuarios_telefone}', '{$usuarios_celular}', '{$usuarios_email}',
                '{$usuarios_data_nascimento}', '{$usuarios_cpf}', '{$usuarios_sexo}',
                '{$imagem}', '{$usuarios_permissao_id}', '{$usuarios_status_id}')";
        
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function recuperar_senha($conexao, $usuario, $cpf) {
        $sql       = "SELECT * FROM usuarios WHERE usuarios_usuario = '{$usuario}' AND usuarios_cpf = '{$cpf}'";
        $resultado = mysqli_query($conexao, $sql);
        $recuperar = mysqli_fetch_assoc($resultado);
        return $recuperar;
    }

    ####################################################################################################

    function autenticar_login($conexao, $usuario, $senha) {
        $sql = "SELECT 
            usuarios_id, usuarios_usuario, usuarios_senha, usuarios_sexo, 
            usuarios_permissao_id, usuarios_status_id 
            FROM usuarios
            WHERE usuarios_usuario = '{$usuario}' AND usuarios_senha = '{$senha}'";
        $resultado      = mysqli_query($conexao, $sql);
        $acesso_usuario = mysqli_fetch_assoc($resultado);
        return $acesso_usuario;
    }

    ####################################################################################################     

    function usuario($conexao) {
        $usuario_id = usuario_id();
        $sql = "SELECT 
            usuarios_id, usuarios_usuario, usuarios_senha, usuarios_nome, usuarios_sobrenome, 
            usuarios_matricula, usuarios_setor_id, setores_setor AS usuarios_setor, 
            usuarios_email, usuarios_cpf, usuarios_telefone, usuarios_celular, 
            usuarios_data_nascimento, usuarios_sexo, usuarios_imagem, usuarios_permissao_id, 
            permissoes_permissao AS usuarios_permissao, usuarios_status_id, status_nome AS usuarios_status, 
            DATE_FORMAT(usuarios_data_cadastro, '%d/%m/%Y') AS usuarios_data_cadastro, 
            DATE_FORMAT(usuarios_data_cadastro, '%H:%i') AS usuarios_hora_cadastro
            FROM usuarios 
            INNER JOIN setores ON (usuarios.usuarios_setor_id = setores.setores_id)
            INNER JOIN permissoes ON (usuarios.usuarios_permissao_id = permissoes.permissoes_id)
            INNER JOIN status ON (usuarios.usuarios_status_id = status.status_id)
            WHERE usuarios_id = '{$usuario_id}'";

        $usuario = $conexao -> query($sql);
        return mysqli_fetch_assoc($usuario);
    }
?>