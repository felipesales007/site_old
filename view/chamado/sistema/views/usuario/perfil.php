<?php
	// Controle de acesso do usuário
	include_once("../../controllers/login/login-acesso.php");
	verificar_acesso();
	// Se for administrador entra na tela
	if ($usuarios_permissao_id <= 5 && $usuarios_status_id == 1) {
?>
<html>
	<head>
		<!-- Importação completa do head -->
		<?php include_once("../../controllers/import/head.php"); ?>
		<title>Chamado | Perfil</title>
	</head>
	<body>
		<?php $tela = 'perfil' ?>
		<?php include_once("../usuario/menu-top.php"); ?>
		<section class="wrapper">
			<?php include_once("../usuario/menu-lateral.php"); ?>
			<br><br><br>

            <!-- Formulário -->
                <form id="validador" class="well form-horizontal" method="POST" action="../../controllers/sistema/perfil-alterar.php" enctype="multipart/form-data" onsubmit="return carregando_perfil_atualizar(this)">
					<!-- Título -->
					<a class="btn disabled chamado-ponteiro btn-block"><center><i class="material-icons">face</i>&ensp; Perfil</center></a>
                    <hr class="chamado-hr-espaco">
                    <br>
                    <center>
                        <img src="../../../assets/img/perfil/<?= $usuarios_imagem ?>" class="img-circle perfil-img card-item">
                    </center>

                    <div class="form-group perfil-aviso-espaco">
                        <div class="col-md-4 col-md-offset-4 chamado-aviso-espaco">
                            <div class="popupunder-aviso alert alert-info animate-fading"><i class="fa fa-info"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
                                    <span aria-hidden="true">&ensp;<i class="material-icons">clear</i></span>
                                </button>
                                &ensp;O seu supervisor ficará ciente de qualquer alteração no seu perfil.
                            </div>
                        </div>
                    </div>

                    <div class="perfil-card">
                        <br><br><br><br><br>
                        <!-- Usuário -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Usuário</label>  
                            <div class="col-md-4">
                                <i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="O usuário é gerado automaticamente com as informações dos campos primeiro nome e matrícula"></i>
                                <div class="input-group">
                                    <span class="input-group-addon login-usuario-icone"><i class="glyphicon glyphicon-user"></i></span>
                                    <input readonly="true" maxlength=21 id="login-usuario-auto" name="usuarios_usuario_criar" placeholder="Usuário" class="form-control login-input-desativado" type="text" value="<?= $usuarios_usuario ?>">
                                </div>
                            </div>
                        </div>

                        <!-- Nome -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nome</label>  
                            <div class="col-md-4">
                                <i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencher com o seu primeiro nome sem acentos ou caracteres especiais, por exemplo, Felipe"></i>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input required tabindex="1" maxlength=15 id="login-nome" name="usuarios_nome" placeholder="Primeiro nome" class="form-control" type="text" onKeypress="return somente_letras(event)" onkeyup="maiuscula('login-nome')" value="<?= $usuarios_nome ?>">
                                </div>
                            </div>
                        </div>

                        <!-- Sobrenome -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Sobrenome</label>  
                            <div class="col-md-4">
                                <i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencher com o seu sobrenome sem acentos ou caracteres especiais, por exemplo, seu nome Felipe Sales, sobrenome Sales"></i>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input required tabindex="2" maxlength=15 id="login-sobrenome" name="usuarios_sobrenome" placeholder="Sobrenome" class="form-control" type="text" onKeypress="return somente_letras(event)" onkeyup="maiuscula('login-sobrenome')" value="<?= $usuarios_sobrenome ?>">
                                </div>
                            </div>
                        </div>

                        <!-- Matrícula -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Matrícula</label>  
                            <div class="col-md-4">
                                <i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencher com a sua matrícula que consta em seu crachá"></i>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                    <input required tabindex="3" maxlength="6" id="login-matricula" name="usuarios_matricula" placeholder="Matrícula" class="form-control zero-esquerda" type="number" value="<?= $usuarios_matricula ?>">
                                </div>
                            </div>
                        </div>

                        <!-- Setor -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Setor</label>  
                            <div class="col-md-4">
                                <i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Seu setor de trabalho, para alterá-lo entre em contato com o supervisor do setor"></i>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                                    <input required readonly="true" id="login-setor" name="usuarios_setor" class="form-control chamado-input-desativado" type="text" value="<?= $usuarios_setor ?>">
                                </div>
                            </div>
                        </div>

                        <!-- Telefone -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Telefone</label>  
                            <div class="col-md-4">
                                <i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencher com o seu telefone ou do seu setor de trabalho, por exemplo, (99)9999-9999"></i>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                                    <input required tabindex="4" maxlength=13 id="login-telefone" name="usuarios_telefone" placeholder="Telefone" class="form-control zero-esquerda" type="text" onKeypress="formatar('(99)9999-9999', this)" onclick="auto_numero()" onfocus="this.selectionStart = this.selectionEnd = 500" onblur="if(this.value == '(71)') {this.value = '';}" value="<?= $usuarios_telefone ?>">
                                </div>
                            </div>
                        </div>

                        <!-- Celular -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Celular</label>  
                            <div class="col-md-4">
                                <i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencher com outro telefone para contato, se houver, por exemplo, (99)99999-9999"></i>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                    <input tabindex="5" maxlength=14 id="login-celular" name="usuarios_celular" placeholder="Celular (opcional)" class="form-control zero-esquerda" type="text" onKeypress="formatar('(99)99999-9999', this)" onclick="auto_numero_opcional()" onfocus="this.selectionStart = this.selectionEnd = 500" onblur="if(this.value == '(71)') {this.value = '';}" value="<?= $usuarios_celular ?>">
                                </div>
                            </div>
                        </div>

                        <!-- E-mail -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">E-mail</label>  
                            <div class="col-md-4">
                                <i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencher com o seu e-mail de trabalho, se hover, por exemplo, felipe@hotmail.com"></i>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="far fa-envelope"></i></span>
                                    <input tabindex="6" maxlength=40 id="login-email" name="usuarios_email" placeholder="E-mail (opcional)" class="form-control" type="email" value="<?= $usuarios_email ?>">
                                </div>
                            </div>
                        </div>

                        <!-- Data de nascimento -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Data de nascimento</label>  
                            <div class="col-md-4">
                                <i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Selecione a sua data de nascimento"></i>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input tabindex="7" maxlength="10" id="login-data-nascimento" name="usuarios_data_nascimento" placeholder="Nascimento (opcional)" class="datepicker form-control" type="text" onKeypress="formatar_data('99/99/9999', this)" value="<?= $usuarios_data_nascimento ?>">
                                </div>
                            </div>
                        </div>

                        <!-- CPF -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">CPF</label>  
                            <div class="col-md-4">
                                <i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencher com o seu CPF para utilizá-lo na recuperação de senha, este dado está seguro com criptografia de ponta-a-ponta"></i>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="far fa-address-card"></i></span>
                                    <input required tabindex="8" maxlength="14" id="login-cpf" name="usuarios_cpf" placeholder="CPF" class="form-control" type="text" onKeypress="formatar('999.999.999-99', this)" value="<?= $usuarios_cpf ?>">
                                </div>
                            </div>
                        </div>

                        <!-- Sexo -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Sexo</label>  
                            <div class="col-md-4">
                                <i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Selecione o seu gênero, sexo em que se identifica"></i>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <select required tabindex="9" id="login-sexo" name="usuarios_sexo" class="form-control selectpicker">
                                        <?php if ($usuarios_sexo == "Masculino") { ?>
                                            <option value="<?= $usuarios_sexo ?>" selected><?= $usuarios_sexo ?></option>
                                            <option value="Feminino">Feminino</option>
                                            <option value="Outro">Outro</option>
                                        <?php } ?>
                                        <?php if ($usuarios_sexo == "Feminino") { ?>
                                            <option value="<?= $usuarios_sexo ?>" selected><?= $usuarios_sexo ?></option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Outro">Outro</option>
                                        <?php } ?>
                                        <?php if ($usuarios_sexo == "Outro") { ?>
                                            <option value="<?= $usuarios_sexo ?>" selected><?= $usuarios_sexo ?></option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Feminino">Feminino</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Imagem -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Imagem</label>  
                            <div class="col-md-4">
                                <i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Selecione uma imagem de perfil com dimensões de no máximo 1000 x 1000 e de 1 MB de tamanho"></i>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                    <div class="login-imagem-nome form-control">Alterar imagem</div>
									<input tabindex="10" id="login-imagem" name="usuarios_imagem" class="form-control" type="file">
                                </div>
                            </div>
                        </div>

                        <!-- Alterar -->
                        <div class="footer text-center chamado-btn-ajuste">
                            <button tabindex="11" id="enter" class="btn btn-success btn-ms f-btn-success" type="submit"><i id="carregando-alterar-perfil"></i>Alterar</button>
                        </div>
                    </div>
                </form>
                
                <div class="analista-espaco"></div>

                <form id="validador-6" class="well form-horizontal" method="POST" action="../../controllers/sistema/perfil-alterar-senha.php" onsubmit="return carregando_senha_atualizar(this)">
					<!-- Título -->
					<a id="alterar-senha" class="btn disabled chamado-ponteiro btn-block"><center><i class="fas fa-key"></i>&ensp; Alterar senha</center></a>
                    <hr class="chamado-hr-espaco">

                    <div class="form-group perfil-aviso-espaco">
                        <div class="col-md-4 col-md-offset-4 chamado-aviso-espaco">
                            <div class="popupunder-fixo alert alert-info"><i class="fa fa-info"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
                                    <span aria-hidden="true">&ensp;<i class="material-icons">clear</i></span>
                                </button>
                                &ensp;Você pode alterar a senha se necessário.
                            </div>
                        </div>
                    </div>
                    <br><br><br><br><br>
                    
                    <!-- Senha atual -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Senha atual</label>
                        <div class="col-md-4">
                            <i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencha com a senha atual de acesso ao sistema"></i>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input required tabindex="12" minlength=6 maxlength=10 id="login-senha-atual" name="usuarios_senha_atual" placeholder="Senha" class="form-control" type="password" onKeypress="return somente_letras_numeros(event)">
                            </div>
                        </div>
                    </div>

                    <!-- Nova senha -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nova senha</label>
                        <div class="col-md-4">
                            <i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencher com a nova senha para acesso ao sistema, senha de no mínimo 6 dígitos e no máximo 10 dígitos, sem caractere especial, este dado está seguro com criptografia de ponta-a-ponta"></i>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input required tabindex="13" minlength=6 maxlength=10 id="login-senha" name="usuarios_senha_criar" placeholder="Nova senha" class="form-control" type="password" onKeypress="return somente_letras_numeros(event)">
                            </div>
                        </div>
                    </div>

                    <!-- Repetir nova senha -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Repetir nova senha</label>
                        <div class="col-md-4">
                            <i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Preencha repetindo a nova senha digitada anteriormente para acesso ao sistema"></i>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input required tabindex="14" minlength=6 maxlength=10 id="login-senha-repetir" name="usuarios_senha_repetir" placeholder="Confirmação de senha" class="form-control" type="password" onKeypress="return somente_letras_numeros(event)">
                            </div>
                        </div>
                    </div>

                    <!-- Alterar -->
                    <div class="footer text-center chamado-btn-ajuste">
                        <button tabindex="15" id="enter" class="btn btn-success btn-ms f-btn-success" type="submit"><i id="carregando-senha"></i>Alterar</button>
                    </div>
				</form>
			<!-- /Formulário -->
			<div class="rodape-fim"></div>
		</section>
	</body>
	<!-- Javascript -->
	<?php include("../../controllers/import/script-rodape.php"); ?>
</html>
<?php
	} else {
		// Se não for administrador volta para a tela anterior
		$_SESSION["warning"] = "Acesso não permitido";
		die("<script> window.history.back(); </script>");
		
	}
?>