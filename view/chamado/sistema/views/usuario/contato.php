<?php
	// Controle de acesso do usuário
	include_once("../../controllers/login/login-acesso.php");
	verificar_acesso();
	// Se for usuário, técnico, analista, supervisor ou administrador entra na tela
	if ($usuarios_permissao_id <= 5 && $usuarios_status_id == 1) {
?>
<html>
	<head>
		<!-- Importação completa do head -->
		<?php include_once("../../controllers/import/head.php"); ?>
		<title>Chamado | Contato</title>
	</head>
	<body>
		<?php $tela = 'contato' ?>
		<?php include_once("menu-top.php"); ?>
		<section class="wrapper">
			<?php include_once("menu-lateral.php"); ?>
			<br><br><br>
			<!-- E-mail -->
            	<form id="validador-8" class="well form-horizontal" method="POST" action="../../controllers/sistema/contato/contato.php" onsubmit="return carregando_contato(this)">
					<!-- Título -->
					<a class="btn disabled chamado-ponteiro btn-block"><center><i class="material-icons">mail_outline</i>&ensp; Contato</center></a>
					<hr class="chamado-hr-espaco">
                    <br>

                    <!-- Subtítulo -->
                    <center>    
                        <span class="f-content-header wow fadeIn" data-wow-duration="1s" data-wow-delay=".0s">
                            Contate-nos
                        </span>
                        <h5 class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".0s">Sinta-se livre para nos contactar</h5>
                    </center>

                    <!-- De -->
					<div class="form-group">
						<label for="email_nome" class="col-md-4 control-label">De</label>  
						<div class="col-md-4">
							<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Seu nome"></i>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input readonly="true" id="email-nome" name="email_nome" placeholder="Nome" class="form-control input-desativado" type="text" value="<?= $usuarios_nome ?> <?= $usuarios_sobrenome ?>">
							</div>
						</div>
					</div>

                    <!-- Setor -->
					<div class="form-group">
						<label for="email_setor" class="col-md-4 control-label">Setor</label>  
						<div class="col-md-4">
							<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Seu setor"></i>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
								<input readonly="true" id="email-setor" name="email_setor" placeholder="Setor" class="form-control input-desativado" type="text" value="<?= $usuarios_setor ?>">
							</div>
						</div>
					</div>

                    <!-- E-mail -->
					<div class="form-group">
						<label for="email_email" class="col-md-4 control-label">E-mail</label>  
						<div class="col-md-4">
							<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Seu e-mail"></i>
							<div class="input-group">
								<span class="input-group-addon"><i class="far fa-envelope"></i></span>
								<input readonly="true" id="email-email" name="email_email" placeholder="E-mail" class="form-control input-desativado" type="text" value="<?= $usuarios_email ?>">
							</div>
						</div>
					</div>

                    <!-- Contato -->
					<div class="form-group">
						<label for="email_contato" class="col-md-4 control-label">Contato</label>  
						<div class="col-md-4">
							<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Seu telefone"></i>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
								<input readonly="true" id="email-contato" name="email_contato" placeholder="Contato" class="form-control input-desativado" type="text" value="<?= $usuarios_telefone ?>">
							</div>
						</div>
					</div>

					<!-- Motivo -->
					<div class="form-group">
						<label for="email_motivo" class="col-md-4 control-label">Motivo</label>  
						<div class="col-md-4">
							<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Motivo do contato"></i>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
								<select required tabindex="1" id="email-motivo" name="email_motivo" class="form-control selectpicker">	
									<option value="" disabled selected>Selecione o motivo do contato</option>
									<option value="Elogio">Elogio</option>
                                    <option value="Sugestão">Sugestão</option>
                                    <option value="Dúvida">Dúvida</option>
                                    <option value="Relatar um erro">Relatar um erro</option>
								</select>
							</div>
						</div>
					</div>

					<!-- Mensagem -->
					<div class="form-group">
						<label for="email_mensagem" class="col-md-4 control-label">Mensagem</label>
						<div class="col-md-4">
							<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Mensagem que será enviada"></i>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-pencil-alt"></i></span>
								<textarea required tabindex="2" class="form-control" id="email-mensagem" name="email_mensagem" placeholder="Mensagem" rows="5" onKeyUp="primeira_letra_maiscula(this);"></textarea>
							</div>
						</div>
					</div>

					<!-- Salvar -->
					<div class="footer text-center chamado-btn-ajuste">
						<button tabindex="3" id="enter" class="btn btn-info btn-ms f-btn-info" type="submit"><i id="carregando-contato"></i>Enviar</button>
					</div>
				</form>
			<!-- /E-mail -->
			<div class="rodape-fim"></div>
		</section>
	</body>
	<!-- Javascript -->
	<?php include("../../controllers/import/script-rodape.php"); ?>
</html>
<?php
	} else {
		// Se não for usuário, técnico, analista, supervisor ou administrador volta para a tela anterior
		$_SESSION["warning"] = "Acesso não permitido";
		die("<script> window.history.back(); </script>");
	}
?>