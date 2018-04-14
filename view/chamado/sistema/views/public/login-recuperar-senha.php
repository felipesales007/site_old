<html>
	<head>
		<!-- Importação completa do head -->
		<?php include_once("../../controllers/import/head.php"); ?>
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
				<!-- Login -->
					<main class="container">
						<div class="row"><br><br>
							<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
								<div class="card card-signup login-menu">
									<form id="validador" name="formulario" class="form" method="POST" action="../../controllers/login/login-recuperar-senha" onsubmit="return carregando_recuperar_senha(this)">
										<div class="header header-primary text-center">
											<img src="../../../assets/img/login-logo.png" width=250>
										</div>
										<p class="text-divider">Recuperar senha de acesso</p>
										<br>
										<div class="col-sm-10 col-sm-offset-1">
											<!-- Usuário -->
											<i id="login-i" class="pull-right fa fa-question-circle fa-2x wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s" data-toggle="tooltip" data-placement="top" title="Seu primeiro nome e sua matrícula, por exemplo, felipe1234"></i>
											<div class="form-group wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
													<input required tabindex="1" maxlength=21 id="login-usuario" name="usuarios_usuario" placeholder="Usuário" class="form-control letra-primeiro" type="text" onKeypress="return somente_letras_numeros(event)">
												</div>
											</div>
											<!-- CPF -->
											<i id="login-i" class="pull-right fa fa-question-circle fa-2x wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s" data-toggle="tooltip" data-placement="top" title="Preencher com o seu CPF para utilizá-lo na recuperação da senha"></i>
											<div class="form-group wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s"> 
												<div class="input-group">
													<span class="input-group-addon"><i class="far fa-address-card"></i></span>
													<input required tabindex="2" maxlength="14" id="login-cpf" name="usuarios_cpf" placeholder="CPF" class="form-control" type="text" onKeypress="formatar('999.999.999-99', this)">
												</div>
											</div>
										</div>
										<!-- Recuperar -->
										<div class="footer text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
											<button id="enter" class="btn btn-simple btn-primary btn-lg" type="submit" tabindex="3"><i id="carregando"></i>Recuperar</button>
										</div>
										<!-- Links -->
										<div id="login-link-rodape">
											<a href="login-criar-conta" id="login-criar" class="pull-left login-ponteiro">Criar conta</a>
											<a href="login" id="login-esqueceu" class="pull-right login-ponteiro">Fazer login</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</main>
				<!-- /Login -->

				<!-- Rodapé -->
				<?php include_once("login-rodape.php"); ?>
	</body>
</html>