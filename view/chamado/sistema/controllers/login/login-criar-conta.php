<html>
	<head>
        <!-- Importação completa do head -->
		<?php include_once("../import/head.php"); ?>
		<title>Login | Criar usuário</title>
	</head>
	<style>
		body {
			background: url("../../../assets/img/background.jpg") no-repeat center top fixed;
			background-size: cover;
			-webkit-background-size: cover; /* Safari / Chrome */
			-moz-background-size: cover; /* Firefox */
			-ms-background-size: cover; /* IE */
			-o-background-size: cover; /* Opera */
		}
	</style>
	<body class="signup-page">
        <div class="wrapper">
			<div class="header header-filter">
                <?php
                    if ($_POST != null) {
                        $usuarios_usuario_criar   = mb_strtolower($_POST['usuarios_usuario_criar']);
                        $usuarios_nome            = $_POST['usuarios_nome'];
                        $usuarios_sobrenome       = $_POST['usuarios_sobrenome'];
                        $usuarios_matricula       = $_POST['usuarios_matricula'];
                        $usuarios_senha_criar     = base64_encode($_POST['usuarios_senha_criar']);
                        $usuarios_setor           = $_POST['usuarios_setor'];
                        $usuarios_telefone        = $_POST['usuarios_telefone'];
                        $usuarios_celular         = $_POST['usuarios_celular'];
                        $usuarios_email           = $_POST['usuarios_email'];
                        $usuarios_data_nascimento = $_POST['usuarios_data_nascimento'];
                        $usuarios_cpf             = base64_encode($_POST['usuarios_cpf']);
                        $usuarios_sexo            = $_POST['usuarios_sexo'];
                        $usuarios_imagem          = $_FILES['usuarios_imagem'];
                        $usuarios_permissao_id    = 5; // 5 = usuário, 4 = técnico, 3 = analista, 2 = supervisor, 1 = administrador
                        $usuarios_status_id       = 1; // 1 = ativo, 2 = desativado

                        // Se a foto estiver sido selecionada
                        if (!empty($usuarios_imagem["name"])) {
                            // Largura máxima em pixels
                            $largura = 1000;
                            // Altura máxima em pixels
                            $altura = 1000;
                            // Tamanho máximo do arquivo em bytes
                            $tamanho = 1050000;
                    
                            $error = array();
                    
                            // Verifica se o arquivo é uma imagem
                            if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $usuarios_imagem["type"])) {
                                $error[1] = "Isso não é uma imagem.";
                            } 
                            // Pega as dimensões da imagem
                            $dimensoes = getimagesize($usuarios_imagem["tmp_name"]);
                            // Verifica se a largura da imagem é maior que a largura permitida
                            if ($dimensoes[0] > $largura) {
                                $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
                            }
                            // Verifica se a altura da imagem é maior que a altura permitida
                            if ($dimensoes[1] > $altura) {
                                $error[3] = "A altura da imagem não deve ultrapassar ".$altura." pixels";
                            }
                            // Verifica se o tamanho da imagem é maior que o tamanho permitido
                            if ($usuarios_imagem["size"] > $tamanho) {
                                $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
                            }

                            if (count($error) != 0) {
                                // Imagem default caso o usuário não defina uma imagem
                                if ($usuarios_sexo == "Masculino") {
                                    $imagem = "masculino.png";
                                }
                                if ($usuarios_sexo == "Feminino") {
                                    $imagem = "feminino.png";
                                }
                                if ($usuarios_sexo == "Outro") {
                                    $imagem = "outro.png";
                                }
                            }
                    
                            // Se não houver nenhum erro
                            if (count($error) == 0) {
                                // Pega extensão da imagem
                                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $usuarios_imagem["name"], $ext);
                                // Gera um nome único para a imagem
                                $imagem = md5(uniqid(time())) . "." . $ext[1];
                                // Caminho de onde ficará a imagem
                                $caminho_imagem = "../../../assets/img/perfil/" . $imagem;
                                // Faz o upload da imagem para seu respectivo caminho
                                move_uploaded_file($usuarios_imagem["tmp_name"], $caminho_imagem);
                            }
                        } else {
                            // Imagem default caso o usuário não defina uma imagem
                            if ($usuarios_sexo == "Masculino") {
                                $imagem = "masculino.png";
                            }
                            if ($usuarios_sexo == "Feminino") {
                                $imagem = "feminino.png";
                            }
                            if ($usuarios_sexo == "Outro") {
                                $imagem = "outro.png";
                            }
                        }

                        // Insere os dados no banco
                        if (login_criar_conta($conexao, 
                            $usuarios_usuario_criar, $usuarios_nome, $usuarios_sobrenome,
                            $usuarios_matricula, $usuarios_senha_criar, $usuarios_setor,
                            $usuarios_telefone, $usuarios_celular, $usuarios_email,
                            $usuarios_data_nascimento, $usuarios_cpf, $usuarios_sexo,
                            $imagem, $usuarios_permissao_id, $usuarios_status_id)) {
                            ?>
                                <!-- Modal de avisos -->
                                <?php include_once("../../views/public/modal.php"); ?>
                                <script>
                                    // Mostra o modal na tela
                                    $(document).ready(function() {
                                        $("#modal-novo-usuario-sucesso").modal("show");
                                    });
                                </script>
                            <?php
                            if (count($error) != 0) {
                                ?>
                                    <!-- Poup-up de aviso -->
                                    <div class="form-group">
                                        <div class="col-md-4 col-md-offset-4">
                                            <div class="popupunder alert alert-info wow fadeInUp" data-wow-duration="1s" data-wow-delay=".0s"><i class="fa fa-bullhorn"></i>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
                                                    <span aria-hidden="true">&ensp;<i class="material-icons">clear</i></span>
                                                </button>
                                                &ensp;A imagem anexada não atende aos requisitos mínimos exigidos
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        } else {
                            ?>
                                <!-- Modal de avisos -->
                                <?php include_once("../../views/public/modal.php"); ?>
                                <script>
                                    // Mostra o modal na tela
                                    $(document).ready(function() {
                                        $("#modal-novo-usuario-erro").modal("show");
                                    });
                                </script>
                            <?php
                        }
                    }
                ?>
        <!-- Rodapé -->
        <div class="login-footer col-md-12 col-xs-12">
		    <?php include_once("../../views/public/login-rodape.php"); ?>
        </div>
    </body>
</html>