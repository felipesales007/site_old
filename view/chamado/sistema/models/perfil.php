<?php
    function usuario_alterar_senha($conexao, $usuarios_id, $usuarios_senha_nova) {
        $sql = "UPDATE usuarios SET usuarios_senha = '{$usuarios_senha_nova}'
            WHERE usuarios_id = '{$usuarios_id}'";
        return mysqli_query($conexao, $sql);
    }

    ####################################################################################################

    function usuario_alterar_perfil($conexao, $usuarios_id, 
        $user_usuario_criar, $user_nome, $user_sobrenome, 
        $user_matricula, $user_telefone, $user_celular, 
        $user_email, $user_data_nascimento, $user_cpf, 
        $user_sexo, $imagem) {
        $sql = "UPDATE usuarios SET 
            usuarios_usuario = '{$user_usuario_criar}', usuarios_nome = '{$user_nome}', 
            usuarios_sobrenome = '{$user_sobrenome}', usuarios_matricula = '{$user_matricula}', 
            usuarios_telefone = '{$user_telefone}', usuarios_celular = '{$user_celular}', 
            usuarios_email = '{$user_email}', usuarios_data_nascimento = '{$user_data_nascimento}', 
            usuarios_cpf = '{$user_cpf}', usuarios_sexo = '{$user_sexo}', usuarios_imagem = '{$imagem}' 
            WHERE usuarios_id = '{$usuarios_id}'";
        return mysqli_query($conexao, $sql);
    }
?>