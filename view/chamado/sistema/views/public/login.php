<html>
	<head>
		<!-- Controle de acesso do usuário -->
		<?php include_once("../../controllers/login/login-acesso.php"); ?>
		<!-- Importação completa do head -->
		<?php include_once("../../controllers/import/head.php"); ?>
		<title>Chamado | Login</title>
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
				<?php if (usuario_logado() && $usuarios_status_id == 1) { ?>
					<!-- Login logado -->
						<main class="container wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".0s">
							<div class="row"><br><br>
								<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
									<div class="card card-signup login-menu">
										<form action="../../controllers/login/logout.php">
											<div class="header header-primary text-center">
												<img src="../../../assets/img/login-logo.png" width=250>
											</div>
											<center>
												<img src="../../../assets/img/perfil/<?= $usuarios_imagem ?>" class="img-circle" id="login-img-usuario">
											</center>
											<p class="text-divider"><?= $usuarios_nome ?> está logado no sistema</p>
											<br>
											<div class="col-sm-10 col-sm-offset-1">
												<center>
													<button class="btn btn-danger btn-fab btn-fab-mini btn-round">
														<span class="fa fa-power-off"></span>
													</button>
													<p>Sair do sistema</p>
												</center>
											<hr class="login-hr">
											<center>
												<a href="../usuario/chamado-novo" class="btn btn-primary login-button-espaco f-btn-primary"><i class="glyphicon glyphicon-share-alt glyphicon-f-pointer"></i>&ensp;Voltar</a>
											</center>
											</div>
										</form>
									</div>
								</div>
							</div>
						</main>
					<!-- /Login logado -->
                <?php } else { ?>
					<!-- Login deslogado -->
						<main class="container wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".0s">
							<div class="row"><br><br>
								<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
									<div class="card card-signup login-menu">
										<form id="validador" class="form" action="../../controllers/login/login.php" method="POST" onsubmit="return carregando_login(this)">
											<div class="header header-primary text-center">
												<img src="../../../assets/img/login-logo.png" width=250>
											</div>
											<p class="text-divider">Acesso para o sistema</p>
											<br>
											<div class="col-sm-10 col-sm-offset-1">
												<!-- Usuário -->
												<i id="login-i" class="pull-right fa fa-question-circle fa-2x wow fadeInRight" data-wow-duration="1s" data-wow-delay=".2s" data-toggle="tooltip" data-placement="top" title="Seu primeiro nome e sua matrícula, por exemplo, felipe1234"></i>
												<div class="form-group wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">
													<div class="input-group">
														<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
														<input required tabindex="1" maxlength=21 id="login-usuario" name="usuarios_usuario" placeholder="Usuário" class="form-control letra-primeiro" type="text" onKeypress="return somente_letras_numeros(event)" onkeyup="this.value = sem_espaco(this.value)">
													</div>
												</div>
												<!-- Senha -->
												<i id="login-i" class="pull-right fa fa-question-circle fa-2x wow fadeInRight" data-wow-duration="1s" data-wow-delay=".4s" data-toggle="tooltip" data-placement="top" title="Senha definida pelo usuário de no mínimo 6 dígitos e no máximo 10 dígitos, sem caractere especial"></i>
												<div class="form-group wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s"> 
													<div class="input-group">
														<span class="input-group-addon"><i class="fas fa-key"></i></span>
														<input required tabindex="2" maxlength=10 id="login-senha" name="usuarios_senha" placeholder="Senha" class="form-control" type="password" onKeypress="return somente_letras_numeros(event)" onkeyup="this.value = sem_espaco(this.value)">
													</div>
												</div>
											</div>
											<!-- Entrar -->
											<div class="footer text-center wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".6s">
												<button id="enter" class="btn btn-simple btn-primary btn-lg" type="submit" tabindex="3"><i id="carregando"></i>Entrar</button>
											</div>
											<!-- Links -->
											<div id="login-link-rodape">
												<a href="login-criar-conta" id="login-criar" class="pull-left login-ponteiro wow fadeInRight" data-wow-duration="1s" data-wow-delay=".4s">Criar conta</a>
												<a href="login-recuperar-senha" id="login-esqueceu" class="pull-right login-ponteiro wow fadeInRight" data-wow-duration="1s" data-wow-delay=".6s">Esqueceu a senha?</a>	
											</div>
										</form>
									</div>
								</div>
							</div>
						</main>
					<!-- /Login deslogado -->
				<?php } ?>
				<!-- Rodapé -->
				<?php include_once("login-rodape.php"); ?>
	</body>
</html>