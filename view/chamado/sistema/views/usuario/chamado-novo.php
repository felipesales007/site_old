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
		<title>Chamado | Novo</title>
	</head>
	<body>
		<?php $tela = 'chamado_novo' ?>
		<?php include_once("menu-top.php"); ?>
		<section class="wrapper">
			<?php include_once("menu-lateral.php"); ?>
			<br><br><br>
			<!-- Formulário -->
				<form id="validador" name="formulario" class="well form-horizontal" method="POST" action="../../controllers/chamado/chamado-novo.php" enctype="multipart/form-data" onsubmit="return carregando_chamado_novo(this)">
					<!-- Título -->
					<a class="btn disabled chamado-ponteiro btn-block"><center><i class="fa fa-user-plus"></i>&ensp; Novo Chamado</center></a>
					<hr class="chamado-hr-espaco">
					<!-- Poup-up de aviso -->
					<div class="form-group">
						<div class="col-md-4 col-md-offset-4 chamado-aviso-espaco">
							<div class="popupunder-aviso alert alert-info animate-fading"><i class="fa fa-info"></i>
								<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
									<span aria-hidden="true">&ensp;<i class="material-icons">clear</i></span>
								</button>
								&ensp;Olá <?= $usuarios_nome ?> você também pode abrir um chamado para outro setor, basta informar na descrição do problema.
							</div>
						</div>
					</div>
					<!-- Setor -->
					<div class="form-group">
						<label for="chamado_setor" class="col-md-4 control-label">Para</label>  
						<div class="col-md-4">
							<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Selecione o setor em que deseja abrir a solicitação de chamado, por exemplo, setor de Tecnologia da Informação"></i>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
								<select required tabindex="1" id="chamado_setor" name="chamados_setor" class="form-control selectpicker">	
									<option value="" disabled selected>Setor</option>
									<?php $listar_setores_servicos = listar_setores_servicos($conexao); ?>
									<?php foreach ($listar_setores_servicos as $registro): ?>
										<option value="<?= $registro['setores_servicos_id'] ?>"><?= $registro["setores_servicos_nome"] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<!-- Ocorrência -->					
					<div class="form-group">
						<label for="chamado_categoria" class="col-md-4 control-label">Ocorrência</label>  
						<div class="col-md-4">
							<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Selecione a ocorrência que motivou a abertura do chamado, por exemplo, computador não liga"></i>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
								<select required tabindex="2" id="chamado_categoria" name="chamados_categoria" class="form-control selectpicker">
									<option value="" disabled selected>Selecione o setor primeiro</option>
								</select>
							</div>
						</div>
					</div>

					<!-- Problema -->
					<div class="form-group">
						<label for="chamado-descricao" class="col-md-4 control-label">Problema</label>
						<div class="col-md-4">
							<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Faça uma breve descrição do seu problema, dando mais detalhes e características ao seu chamado"></i>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-pencil-alt"></i></span>
								<textarea tabindex="3" class="form-control" id="chamado-descricao" name="chamados_descricao" placeholder="Descrição do problema" rows="5" onKeyUp="primeira_letra_maiscula(this);"></textarea>
							</div>
						</div>
					</div>
					<!-- Prioridade -->
					<div class="form-group">
						<label for="chamado-prioridade" class="col-md-4 control-label">Prioridade</label>
						<div class="col-md-4">
							<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Selecione a real necessidade do seu chamado para melhor atender a todos os setores"></i>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-heart"></i></span>
								<select required tabindex="4" id="chamado-prioridade" name="chamados_prioridade" class="form-control selectpicker">
									<option value="" disabled selected>Necessidade</option>
									<?php $listar_prioridades = listar_prioridades($conexao); ?>
									<?php foreach ($listar_prioridades as $registro): ?>
										<option value="<?= $registro['prioridades_id'] ?>" id="chamado-prioridade-<?= $registro['prioridades_id'] ?>">
											<?= $registro["prioridades_nome"] ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<!-- Anexo -->			
					<div class="form-group">
						<label for="chamado-anexo" class="col-md-4 control-label">Anexar</label>  
						<div class="col-md-4">
							<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Se necessário, adicione um arquivo ao seu chamado para um atendimento mais eficiente no setor, com 2 MB de tamanho no máximo"></i>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
								<div class="chamado-anexo-nome form-control">Arquivo (opcional)</div>
								<input id="chamado-anexo" name="chamados_anexo" class="form-control" type="file">
							</div>
						</div>
					</div>
					<!-- Salvar -->
					<div class="footer text-center chamado-btn-ajuste">
						<button tabindex="5" id="enter" class="btn btn-success btn-ms f-btn-success" type="submit"><i id="carregando"></i>Salvar</button>
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
		// Se não for usuário, técnico, analista, supervisor ou administrador volta para a tela anterior
		$_SESSION["warning"] = "Acesso não permitido";
		die("<script> window.history.back(); </script>");
	}
?>