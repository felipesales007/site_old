<html>
	<head>
		<!-- Importação completa do head -->
		<?php include_once("../import/head.php"); ?>
		<title>Login | Recuperar senha</title>
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
                        $usuario = $_POST["usuarios_usuario"];
                        $cpf     = base64_encode($_POST["usuarios_cpf"]);

                        // Recebe os dados informados e verifica se eles existem no banco de dados
                        // Se eles existem mostra a senha na tela, se não, usuário é informado que os dados não existem
                        $recuperar = recuperar_senha($conexao, $usuario, $cpf);
                            
                        if ($recuperar == null) {
                            ?>
                                <!-- Modal de avisos -->
                                <?php include_once("../../views/public/modal.php"); ?>
                                <script>
                                    // Mostra o modal na tela
                                    $(document).ready(function() {
                                        $("#modal-recuperar-senha-erro").modal("show");
                                    });
                                </script>
                            <?php
                        } else {
                            ?>
                                <!-- Modal de avisos -->
                                <?php include_once("../../views/public/modal.php"); ?>
                                <script>
                                    // Mostra o modal na tela
                                    $(document).ready(function() {
                                        $("#modal-recuperar-senha-sucesso").modal("show");
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