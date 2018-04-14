<?php
	// Controle de acesso do usuário
	include_once("../../controllers/login/login-acesso.php");
    verificar_acesso();
    
    // Obtém ID via GET
	$user_id = $_GET['usuario'];
    $usuario_setor = usuario_setor_visualizar($conexao, $user_id );
	// Se for administrador ou supervisor entra na tela
	if ($usuarios_permissao_id <= 2 && $usuarios_status_id == 1) {
?>
<html>
	<head>
		<!-- Importação completa do head -->
		<?php include_once("../../controllers/import/head.php"); ?>
		<title>Usuário | Visualizar</title>
	</head>
	<body>
		<?php $tela = 'usuario_setor_visualizar' ?>
		<?php include_once("../usuario/menu-top.php"); ?>
		<section class="wrapper">
			<?php include_once("../usuario/menu-lateral.php"); ?>
			<br><br><br>
			<!-- Formulário -->
				<form id="validador" method="POST" class="well form-horizontal">
					<!-- Título -->
					<a class="btn disabled chamado-ponteiro btn-block"><center><i class="fa fa-eye"></i>&ensp; Visualizar usuário</center></a>
					<hr class="chamado-hr-espaco">
					<br>
					<center>
						<img src="../../../assets/img/perfil/<?= $usuario_setor['usuarios_imagem'] ?>" class="img-circle perfil-img card-item">
					</center>

					<div class="perfil-card">
						<br><br><br><br><br>
						<!-- Usuário -->
						<div class="form-group">
							<label class="col-md-4 control-label">Usuário</label>  
							<div class="col-md-4">
								<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Usuário de acesso"></i>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input readonly="true" class="form-control login-input-desativado" type="text" value="<?= $usuario_setor['usuarios_usuario'] ?>">
								</div>
							</div>
						</div>

						<!-- Nome -->
						<div class="form-group">
							<label class="col-md-4 control-label">Nome</label>  
							<div class="col-md-4">
								<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Nome e sobrenome do usuário"></i>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input readonly="true" class="form-control chamado-input-desativado" type="text" value="<?= $usuario_setor['usuarios_nome'] ?> <?= $usuario_setor['usuarios_sobrenome'] ?>">
								</div>
							</div>
						</div>

						<!-- Matrícula -->
						<div class="form-group">
							<label class="col-md-4 control-label">Matrícula</label>  
							<div class="col-md-4">
								<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Matrícula do usuário"></i>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
									<input readonly="true" class="form-control chamado-input-desativado" type="number" value="<?= $usuario_setor['usuarios_matricula'] ?>">
								</div>
							</div>
						</div>

						<!-- Setor -->
						<div class="form-group">
							<label class="col-md-4 control-label">Setor</label>  
							<div class="col-md-4">
								<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Setor de trabalho do usuário, você pode transferir o usuário para outro setor"></i>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
									<select required tabindex="1" id="login-setor" name="usuarios_setor" class="form-control selectpicker">
										<option value="<?= $usuario_setor['usuarios_setor_id'] ?>" selected><?= $usuario_setor['usuarios_setor'] ?></option>
										<?php $listar_setores = listar_setores($conexao); ?>
										<?php foreach ($listar_setores as $registro): if ($usuario_setor['usuarios_setor_id'] != $registro['setores_id']) { ?>
											<option value="<?= $registro['setores_id'] ?>"><?= $registro["setores_setor"] ?></option>
										<?php } endforeach; ?>
									</select>
								</div>
							</div>
						</div>

						<!-- Telefone -->
						<div class="form-group">
							<label class="col-md-4 control-label">Telefone</label>  
							<div class="col-md-4">
								<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Telefone para contato com o usuário"></i>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
									<input readonly="true" class="form-control chamado-input-desativado" type="text" value="<?= $usuario_setor['usuarios_telefone'] ?>">
								</div>
							</div>
						</div>

						<!-- Celular -->
						<?php if ($usuario_setor['usuarios_celular'] != null) { ?>
							<div class="form-group">
								<label class="col-md-4 control-label">Celular</label>  
								<div class="col-md-4">
									<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Celular para contato com o usuário"></i>
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
										<input readonly="true" class="form-control chamado-input-desativado" type="text" value="<?= $usuario_setor['usuarios_celular'] ?>">
									</div>
								</div>
							</div>
						<?php } ?>

						<!-- E-mail -->
						<?php if ($usuario_setor['usuarios_email'] != null) { ?>
							<div class="form-group">
								<label class="col-md-4 control-label">E-mail</label>  
								<div class="col-md-4">
									<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="E-mail do usuário"></i>
									<div class="input-group">
										<span class="input-group-addon"><i class="far fa-envelope"></i></span>
										<input readonly="true" class="form-control chamado-input-desativado" type="email" value="<?= $usuario_setor['usuarios_email'] ?>">
									</div>
								</div>
							</div>
						<?php } ?>

						<!-- Data de nascimento -->
						<?php if ($usuario_setor['usuarios_data_nascimento'] != null) { ?>
							<div class="form-group">
								<label class="col-md-4 control-label">Data de nascimento</label>  
								<div class="col-md-4">
									<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Data de nascimento do usuário"></i>
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										<input readonly="true" class="datepicker form-control chamado-input-desativado" type="text" value=" <?= $usuario_setor['usuarios_data_nascimento'] ?>">
									</div>
								</div>
							</div>
						<?php } ?>

						<!-- Data de cadastro -->
						<div class="form-group">
							<label class="col-md-4 control-label">Data de cadastro</label>  
							<div class="col-md-4">
								<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Data e hora de cadastro do usuário no sistema"></i>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
									<input readonly="true" class="datepicker form-control chamado-input-desativado" type="text" value=" <?= $usuario_setor['usuarios_data_cadastro'] ?> - <?= $usuario_setor['usuarios_hora_cadastro'] ?>">
								</div>
							</div>
						</div>

						<!-- Permissão de usuário -->
						<div class="form-group">
							<label class="col-md-4 control-label">Permissão</label>  
							<div class="col-md-4">
								<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Permissão de acesso que o usuário possui no sistema"></i>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-ok-circle"></i></span>
									<select required tabindex="2" id="usuario-permissao" name="usuario_permissao" class="form-control selectpicker">
										<option value="<?= $usuario_setor['usuarios_permissao_id'] ?>" selected><?= $usuario_setor['usuarios_permissao'] ?></option>
										<?php $listra_permissao = listar_permissao($conexao); ?>
										<?php foreach ($listra_permissao as $registro): if ($usuario_setor['usuarios_permissao_id'] != $registro['permissoes_id']) { ?>
											<option value="<?= $registro['permissoes_id'] ?>"><?= $registro["permissoes_permissao"] ?></option>
										<?php } endforeach; ?>
									</select>
								</div>
							</div>
						</div>

						<!-- Status do usuário -->
						<div class="form-group">
							<label class="col-md-4 control-label">Status</label>  
							<div class="col-md-4">
								<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Status do usuário no sistema"></i>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-heart"></i></span>
									<select required tabindex="3" id="usuario-status" name="usuario_status" class="form-control selectpicker">
										<option value="<?= $usuario_setor['usuarios_status_id'] ?>" selected><?= $usuario_setor['usuarios_status'] ?></option>
										<?php $listra_permissao = listar_status($conexao); ?>
										<?php foreach ($listra_permissao as $registro): if ($usuario_setor['usuarios_status_id'] != $registro['status_id']) { ?>
											<option value="<?= $registro['status_id'] ?>"><?= $registro["status_nome"] ?></option>
										<?php } endforeach; ?>
									</select>
								</div>
							</div>
						</div>

						<!-- Alterar -->
						<div class="footer text-center chamado-btn-ajuste">
							<button tabindex="4" id="enter" class="btn btn-success btn-ms f-btn-success" data-toggle="modal" data-target="#modal-administrador-alterar-usuario" data-id="<?= $usuario_setor['usuarios_id'] ?>">Alterar</button>
						</div>
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