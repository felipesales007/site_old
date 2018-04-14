<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/perfil.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    $user_usuario_criar   = mb_strtolower($_POST['usuarios_usuario_criar']);
    $user_nome            = $_POST['usuarios_nome'];
    $user_sobrenome       = $_POST['usuarios_sobrenome'];
    $user_matricula       = $_POST['usuarios_matricula'];
    $user_telefone        = $_POST['usuarios_telefone'];
    $user_celular         = $_POST['usuarios_celular'];
    $user_email           = $_POST['usuarios_email'];
    $user_data_nascimento = $_POST['usuarios_data_nascimento'];
    $user_cpf             = base64_encode($_POST['usuarios_cpf']);
    $user_sexo            = $_POST['usuarios_sexo'];
    $user_imagem          = $_FILES['usuarios_imagem'];

    // Se a foto estiver sido selecionada
    if (!empty($user_imagem["name"])) {
        // Largura máxima em pixels
        $largura = 1000;
        // Altura máxima em pixels
        $altura = 1000;
        // Tamanho máximo do arquivo em bytes
        $tamanho = 1050000;

        $error = array();

        // Verifica se o arquivo é uma imagem
        if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $user_imagem["type"])) {
            $error[1] = "Isso não é uma imagem.";
        } 
        // Pega as dimensões da imagem
        $dimensoes = getimagesize($user_imagem["tmp_name"]);
        // Verifica se a largura da imagem é maior que a largura permitida
        if ($dimensoes[0] > $largura) {
            $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
        }
        // Verifica se a altura da imagem é maior que a altura permitida
        if ($dimensoes[1] > $altura) {
            $error[3] = "A altura da imagem não deve ultrapassar ".$altura." pixels";
        }
        // Verifica se o tamanho da imagem é maior que o tamanho permitido
        if ($user_imagem["size"] > $tamanho) {
            $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
        }

        if (count($error) != 0) {
            // Imagem default caso o usuário não defina uma imagem
            $imagem = $usuarios_imagem;
        }

        // Se não houver nenhum erro
        if (count($error) == 0) {
            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $user_imagem["name"], $ext);
            // Gera um nome único para a imagem
            $imagem = md5(uniqid(time())) . "." . $ext[1];
            // Caminho de onde ficará a imagem
            $caminho_imagem = "../../../assets/img/perfil/" . $imagem;
            // Faz o upload da imagem para seu respectivo caminho
            move_uploaded_file($user_imagem["tmp_name"], $caminho_imagem);
        }
    } else {
        // Imagem default caso o usuário não defina uma imagem
        $imagem = $usuarios_imagem;
    }

    // Altera os dados no banco
    if (usuario_alterar_perfil($conexao, $usuarios_id, 
    $user_usuario_criar, $user_nome, $user_sobrenome, 
    $user_matricula, $user_telefone, $user_celular, 
    $user_email, $user_data_nascimento, $user_cpf, 
    $user_sexo, $imagem)) {
        if (count($error) != 0) {
            $_SESSION["info"] = "Perfil alterado com sucesso, porém a imagem anexada não atende aos requisitos mínimos exigidos";
        } else {
            $_SESSION["success"] = "Perfil alterado com sucesso";
        }
        header("location: ../../views/usuario/perfil");
    } else {
        $_SESSION["danger"] = "Erro ao alterar o perfil";
        header("location: ../../views/usuario/perfil");
    }	
?>