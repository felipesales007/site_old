<html>
	<head>
		<!-- Importação completa do head -->
		<?php include_once("../../controllers/import/head.php"); ?>
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
				<!-- Login -->
					<main class="container wow fadeInUp" data-wow-duration="1s" data-wow-delay=".0s">
						<div class="row"><br><br>
							<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
								<div class="card card-signup login-menu">
									<form id="validador" name="formulario" class="form" method="POST" action="../../controllers/login/login-criar-conta" enctype="multipart/form-data" onsubmit="return carregando_criar_conta(this)">
										<div class="header header-primary text-center">
											<img src="../../../assets/img/login-logo.png" width=250>
										</div>
										<p class="text-divider">Criar conta de acesso</p>
										<br>
										<div class="col-sm-10 col-sm-offset-1">
											<!-- Usuário -->
											<i id="login-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="O usuário é gerado automaticamente com as informações dos campos primeiro nome e matrícula"></i>
											<div class="form-group"> 
												<div class="input-group">
													<span class="input-group-addon login-usuario-icone"><i class="glyphicon glyphicon-user"></i></span>
													<input readonly="true" maxlength=21 id="login-usuario-auto" name="usuarios_usuario_criar" placeholder="Usuário" class="form-control login-input-desativado" type="text">
												</div>
											</div>
											<!-- Nome -->
											<i id="login-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencher com o seu primeiro nome sem acentos ou caracteres especiais, por exemplo, Felipe"></i>
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
													<input required tabindex="1" maxlength=15 id="login-nome" name="usuarios_nome" placeholder="Primeiro nome" class="form-control" type="text" onKeypress="return somente_letras(event)" onkeyup="maiuscula('login-nome')" onkeyup="this.value = sem_espaco(this.value)">
												</div>
											</div>
											<!-- Sobrenome -->
											<i id="login-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencher com o seu sobrenome sem acentos ou caracteres especiais, por exemplo, seu nome Felipe Sales, sobrenome Sales"></i>
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
													<input required tabindex="2" maxlength=15 id="login-sobrenome" name="usuarios_sobrenome" placeholder="Sobrenome" class="form-control" type="text" onKeypress="return somente_letras(event)" onkeyup="maiuscula('login-sobrenome')" onkeyup="this.value = sem_espaco(this.value)">
												</div>
											</div>
											<!-- Matrícula -->
											<i id="login-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencher com a sua matrícula que consta em seu crachá"></i>
											<div class="form-group"> 
												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
													<input required tabindex="3" maxlength="6" id="login-matricula" name="usuarios_matricula" placeholder="Matrícula" class="form-control zero-esquerda" type="number" onkeyup="this.value = sem_espaco(this.value)">
												</div>
											</div>
											<!-- Senha -->
											<i id="login-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencher com uma senha para acesso ao sistema, senha de no mínimo 6 dígitos e no máximo 10 dígitos, sem caractere especial, este dado está seguro com criptografia de ponta-a-ponta"></i>
											<div class="form-group"> 
												<div class="input-group">
													<span class="input-group-addon"><i class="fas fa-key"></i></span>
													<input required tabindex="4" minlength=6 maxlength=10 id="login-senha" name="usuarios_senha_criar" placeholder="Senha" class="form-control" type="password" onKeypress="return somente_letras_numeros(event)" onkeyup="this.value = sem_espaco(this.value)">
												</div>
											</div>
											<!-- Repetir senha -->
											<i id="login-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencha repetindo a senha digitada anteriormente para acesso ao sistema"></i>
											<div class="form-group"> 
												<div class="input-group">
													<span class="input-group-addon"><i class="fas fa-key"></i></span>
													<input required tabindex="5" minlength=6 maxlength=10 id="login-senha-repetir" name="usuarios_senha_repetir" placeholder="Confirmação de senha" class="form-control" type="password" onKeypress="return somente_letras_numeros(event)" onkeyup="this.value = sem_espaco(this.value)">	
												</div>
											</div>
											<!-- Setor -->
											<i id="login-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Selecione o seu setor de trabalho"></i>
											<div class="form-group"> 
												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
													<select required tabindex="6" id="login-setor" name="usuarios_setor" class="form-control selectpicker">
														<option value="" disabled selected>Setor</option>
														<?php $listar_setores = listar_setores($conexao); ?>
														<?php foreach ($listar_setores as $registro): ?>
															<option value="<?= $registro['setores_id'] ?>"><?= $registro["setores_setor"] ?></option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<!-- Telefone -->
											<i id="login-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencher com o seu telefone ou do seu setor de trabalho, por exemplo, (99)9999-9999"></i>
											<div class="form-group"> 
												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
													<input required tabindex="7" maxlength=13 id="login-telefone" name="usuarios_telefone" placeholder="Telefone" class="form-control zero-esquerda" type="text" onKeypress="formatar('(99)9999-9999', this)" onclick="auto_numero()" onfocus="this.selectionStart = this.selectionEnd = 500" onblur="if(this.value == '(71)') {this.value = '';}" onkeyup="this.value = sem_espaco(this.value)">
												</div>
											</div>
											<!-- Celular -->
											<i id="login-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencher com outro telefone para contato, se houver, por exemplo, (99)99999-9999"></i>
											<div class="form-group"> 
												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
													<input tabindex="8" maxlength=14 id="login-celular" name="usuarios_celular" placeholder="Celular (opcional)" class="form-control zero-esquerda" type="text" onKeypress="formatar('(99)99999-9999', this)" onclick="auto_numero_opcional()" onfocus="this.selectionStart = this.selectionEnd = 500" onblur="if(this.value == '(71)') {this.value = '';}" onkeyup="this.value = sem_espaco(this.value)">
												</div>
											</div>
											<!-- E-mail -->
											<i id="login-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencher com o seu e-mail de trabalho, se hover, por exemplo, felipe@hotmail.com"></i>
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><i class="far fa-envelope"></i></span>
													<input tabindex="9" maxlength=40 id="login-email" name="usuarios_email" placeholder="E-mail (opcional)" class="form-control" type="email" onkeyup="this.value = sem_espaco(this.value)">
												</div>
											</div>
											<!-- Data de nascimento -->
											<i id="login-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Selecione a sua data de nascimento"></i>
											<div class="form-group"> 
												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
													<input tabindex="10" maxlength="10" id="login-data-nascimento" name="usuarios_data_nascimento" placeholder="Nascimento (opcional)" class="datepicker form-control" type="text" onKeypress="formatar_data('99/99/9999', this)" onkeyup="this.value = sem_espaco(this.value)">
												</div>
											</div>
											<!-- CPF -->
											<i id="login-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencher com o seu CPF para utilizá-lo na recuperação de senha, este dado está seguro com criptografia de ponta-a-ponta"></i>
											<div class="form-group"> 
												<div class="input-group">
													<span class="input-group-addon"><i class="far fa-address-card"></i></span>
													<input required tabindex="11" maxlength="11" id="login-cpf" name="usuarios_cpf" placeholder="CPF" class="form-control" type="tel" onkeyup="this.value = sem_espaco(this.value)">
												</div>
											</div>
											<!-- Sexo -->
											<i id="login-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Selecione o seu gênero, sexo em que se identifica"></i>
											<div class="form-group"> 
												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
													<select required tabindex="12" id="login-sexo" name="usuarios_sexo" class="form-control selectpicker">
														<option value="" disabled selected>Sexo</option>
														<option value="Masculino">Masculino</option>
														<option value="Feminino">Feminino</option>
														<option value="Outro">Outro</option>
													</select>
												</div>
											</div>
											<!-- Imagem -->
											<i id="login-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Selecione uma imagem de perfil com dimensões de no máximo 1000 x 1000 e de 1 MB de tamanho"></i>
											<div class="form-group"> 
												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
													<div class="login-imagem-nome form-control">Imagem (opcional)</div>
													<input tabindex="13" id="login-imagem" name="usuarios_imagem" class="form-control" type="file">
												</div>
											</div>
										</div>
										<!-- Criar usuário -->
										<div class="footer text-center">
											<button id="enter" class="btn btn-simple btn-primary btn-lg" type="submit" tabindex="13"><i id="carregando"></i>Criar Usuário</button>
										</div>
										<!-- Links -->
										<div id="login-link-rodape">
											<a href="login" id="login-criar" class="pull-left login-ponteiro">Fazer login</a>
											<a href="login-recuperar-senha" id="login-esqueceu" class="pull-right login-ponteiro">Esqueceu a senha?</a>	
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