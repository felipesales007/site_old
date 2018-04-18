<?php
	// Controle de acesso do usuário
	include_once("../../controllers/login/login-acesso.php");
	verificar_acesso();
	
	// Obtem ID via GET
	$chamados_id = $_GET['chamado'];
	$ver = visualizar_chamado($conexao, $chamados_id);
	// Se for usuário, técnico, analista, supervisor ou administrador entra na tela
	if ($usuarios_permissao_id <= 5 && $ver["chamados_usuario_id"] == $usuarios_id && $usuarios_status_id == 1) {
?>
<html>
	<head>
		<!-- Importação completa do head -->
		<?php include_once("../../controllers/import/head.php"); ?>
		<title>Chamado | Visualizar</title>
	</head>
	<body>
		<?php $tela = 'chamado_visualizar' ?>
		<?php include_once("menu-top.php"); ?>
		<section class="wrapper">
			<?php include_once("menu-lateral.php"); ?>
			<br><br><br>
			<!-- Formulário -->
				<form id="validador" name="formulario" class="well form-horizontal" method="POST" action="../../controllers/chamado/chamado-alterar.php" enctype="multipart/form-data" onsubmit="return carregando_chamado_atualizar(this)">
					<!-- Título -->
					<a class="btn disabled chamado-ponteiro btn-block"><center><i class="fa fa-eye"></i>&ensp; Visualizar Chamado</center></a>
					<hr class="chamado-hr-espaco">
					<!-- Poup-up de aviso -->
					<?php $situacao = $ver['chamados_situacao_id']; ?>
					<?php if ($situacao == 3 || $situacao == 5) { ?>
						<div class="form-group">
							<div class="col-md-4 col-md-offset-4 chamado-aviso-espaco">
								<div class="popupunder-aviso alert alert-info animate-fading"><i class="fa fa-info"></i>
									<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
										<span aria-hidden="true">&ensp;<i class="material-icons">clear</i></span>
									</button>
									&ensp;Olá <?= $usuarios_nome ?>, se o seu problema não foi resolvido você pode reabrir o chamado.
								</div>
							</div>
						</div>
					<?php } else { ?>
						<div class="form-group">
							<div class="col-md-4 col-md-offset-4 chamado-aviso-espaco">
								<div class="popupunder-aviso alert alert-info animate-fading"><i class="fa fa-info"></i>
									<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
										<span aria-hidden="true">&ensp;<i class="material-icons">clear</i></span>
									</button>
									&ensp;Olá <?= $usuarios_nome ?> aqui você pode visualizar todos os dados do seu chamado, e alterar algumas informações.
								</div>
							</div>
						</div>
					<?php } ?>

					<!-- Responsável técnico -->
					<?php if ($ver["tecnico_nome"] != null) { ?>
						<div class="form-group">
							<label class="col-md-4"></label>
							<div class="col-md-4">
								<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Responsável pelo atendimento do chamado"></i>
								<div>
									<div class="card-item">
										<div class="card-corpo">
											<div class="card-informacao">
												<div class="col-xs-3 col-sm-2 col-md-5 col-lg-4">
													<img class="img-circle img-raised img-responsive img-view-modify" src="../../../assets/img/perfil/<?= $ver["tecnico_imagem"] ?>"/>
												</div>
												<div class="card-perfil">
													<h6 class="pull-right text-responsavel">Responsável</h6>
													<h1><?= $ver["tecnico_nome"] ?></h1>
													<h5><?= $ver["setores_servicos_nome"] ?></h5>
													<hr class="chamado-visualizar-hr">
													<h3><i class="glyphicon glyphicon-phone-alt"></i> <?= $ver["tecnico_telefone"] ?></h3>
													<?php if ($ver["tecnico_celular"] != null) { ?><h3><i class="glyphicon glyphicon-phone"></i> <?= $ver["tecnico_celular"] ?></h3><?php } else { ?><h3><i class="glyphicon glyphicon-phone card-itens"></i></h3><?php } ?>
													<?php if ($ver["tecnico_email"] != null) { ?><h3><i class="far fa-envelope"></i> <?= $ver["tecnico_email"] ?></h3><?php } else { ?><h3><i class="far fa-envelope card-itens"></i></h3><?php } ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>

					<!-- Id e status do chamado -->
					<div class="form-group">
						<label class="col-md-4 control-label">Nº</label>
						<div class="col-md-4">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
								<input readonly="true" name="chamados_id" class="form-control chamado-input-desativado chamado-id" type="text" value="<?= $ver["chamados_id"] ?>">
								<i id="chamado-i" class="fa fa-question-circle fa-2x chamado-i-id some-mini-tela" data-toggle="tooltip" data-placement="top" title="Número do chamado"></i>
								
								<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x some-mini-tela" data-toggle="tooltip" data-placement="top" title="Status do chamado"></i>
								<?php
									$situacao = $ver['chamados_situacao_id'];
									if ($situacao == 1) {
										echo "<span class='pull-right f-label f-btn-default chamado-status'>Aberto</span>";
									}
									if ($situacao == 2) {
										echo "<span class='pull-right f-label f-btn-info chamado-status'>Enviado</span>";
									}
									if ($situacao == 3) {
										echo "<span class='pull-right f-label f-btn-success chamado-status'>Resolvido</span>";
									}
									if ($situacao == 4) {
										echo "<span class='pull-right f-label f-btn-warning chamado-status'>Pendente</span>";
									}
									if ($situacao == 5) {
										echo "<span class='pull-right f-label f-btn-danger chamado-status'>Cancelado</span>";
									}
									if ($situacao == 6) {
										echo "<span class='pull-right f-label f-btn-primary chamado-status'>Reaberto</span>";
									}
								?>
							</div>
						</div>
					</div>					
					<!-- Data e hora de abertura do chamado -->
					<div class="form-group">
						<label class="col-md-4 control-label">Aberto em</label>
						<div class="col-md-4">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input readonly="true" class="form-control chamado-input-desativado chamado-data" type="text" value="<?= $ver["chamados_data_abertura_data"] ?> - <?= $ver["chamados_data_abertura_hora"] ?>">
								<i id="chamado-i" class="fa fa-question-circle fa-2x chamado-i-id" data-toggle="tooltip" data-placement="top" title="Data e hora de abertura do chamado"></i>
							</div>
						</div>
					</div>
					<!-- Data e hora de fechamento do chamado -->
					<?php if ($ver["chamados_data_fechamento_data"] != null) { ?>
						<div class="form-group">
							<label class="col-md-4 control-label">Fechado em</label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
									<input readonly="true" class="form-control chamado-input-desativado chamado-data" type="text" value="<?= $ver["chamados_data_fechamento_data"] ?> - <?= $ver["chamados_data_fechamento_hora"] ?>">
									<i id="chamado-i" class="fa fa-question-circle fa-2x chamado-i-id" data-toggle="tooltip" data-placement="top" title="Data e hora de fechamento do chamado"></i>
								</div>
							</div>
						</div>
					<?php } ?>
					<!-- Setor -->
					<div class="form-group">
						<label class="col-md-4 control-label">Para</label>  
						<div class="col-md-4">
							<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Setor que irá solucionar a ocorrêcia do chamado"></i>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
								<input readonly="true" class="form-control chamado-input-desativado" type="text" value="<?= $ver["setores_servicos_nome"] ?>">
							</div>
						</div>
					</div>
					<!-- Ocorrência -->					
					<div class="form-group">
						<label class="col-md-4 control-label">Ocorrência</label>  
						<div class="col-md-4">
							<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Motivo da abertura do chamado"></i>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
								<input readonly="true" class="form-control chamado-input-desativado" type="text" value="<?= $ver["ocorrencias_ocorrencia"] ?>">
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
								<?php if ($situacao == 3 || $situacao == 5) { ?>
									<textarea readonly="true" class="form-control chamado-area-desativado" placeholder="Descrição do problema" rows="5"><?= $ver["chamados_problema"] ?></textarea>
								<?php } else { ?>
									<textarea tabindex="1" class="form-control" id="chamado-descricao" name="chamados_descricao" placeholder="Descrição do problema" rows="5" onKeyUp="primeira_letra_maiscula(this);"><?= $ver["chamados_problema"] ?></textarea>
								<?php } ?>
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
								<?php $prioridade = $ver["chamados_prioridade_id"]; ?>

								<?php if ($prioridade == 1) { $prioridade = "Alta"; ?>
									<?php if ($situacao == 3 || $situacao == 5) { ?>
										<input readonly="true" class="form-control chamado-input-desativado" type="text" value="<?= $prioridade ?>">
									<?php } else { ?>
										<select tabindex="2" id="chamado-prioridade" name="chamados_prioridade" class="form-control selectpicker">
											<option value="<?= $ver["chamados_prioridade_id"] ?>" id="chamado-prioridade-1" selected><?= $prioridade ?></option>
											<option value="2" id="chamado-prioridade-2">Média</option>
											<option value="3" id="chamado-prioridade-3">Baixa</option>
										</select>
									<?php } ?>
								<?php } ?>

								<?php if ($prioridade == 2) { $prioridade = "Média"; ?>
									<?php if ($situacao == 3 || $situacao == 5) { ?>
										<input readonly="true" class="form-control chamado-input-desativado" type="text" value="<?= $prioridade ?>">
									<?php } else { ?>
										<select tabindex="2" id="chamado-prioridade" name="chamados_prioridade" class="form-control selectpicker">
											<option value="<?= $ver["chamados_prioridade_id"] ?>" id="chamado-prioridade-2" selected><?= $prioridade ?></option>
											<option value="1" id="chamado-prioridade-1">Alta</option>
											<option value="3" id="chamado-prioridade-3">Baixa</option>
										</select>
									<?php } ?>
								<?php } ?>

								<?php if ($prioridade == 3) { $prioridade = "Baixa"; ?>
									<?php if ($situacao == 3 || $situacao == 5) { ?>
										<input readonly="true" class="form-control chamado-input-desativado" type="text" value="<?= $prioridade ?>">
									<?php } else { ?>
										<select tabindex="2" id="chamado-prioridade" name="chamados_prioridade" class="form-control selectpicker">
											<option value="<?= $ver["chamados_prioridade_id"] ?>" id="chamado-prioridade-3" selected><?= $prioridade ?></option>
											<option value="1" id="chamado-prioridade-1">Alta</option>
											<option value="2" id="chamado-prioridade-2">Média</option>
										</select>
									<?php } ?>
								<?php } ?>
							</div>
						</div>
					</div>
					<!-- Anexo -->			
					<div class="form-group">
						<!-- Sem arquivo -->
						<?php if ($ver["chamados_anexo"] == null) { ?>
							<label for="chamado-anexo" class="col-md-4 control-label">Anexar</label>
							<div class="col-md-4">
								<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Se necessário, adicione um arquivo ao seu chamado para um atendimento mais eficiente no setor, com 5 MB de tamanho no máximo"></i>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
									<?php if ($situacao == 3 || $situacao == 5) { ?>
										<input readonly="true" class="form-control chamado-input-desativado" type="text" placeholder="Arquivo (opcional)">
									<?php } else { ?>
										<div class="chamado-anexo-nome form-control">Arquivo (opcional)</div>
										<input id="chamado-anexo" name="chamados_anexo" class="form-control" type="file">
									<?php } ?>
								</div>
							</div>
						<?php } ?>
						
						<!-- Com arquivo -->
						<?php if ($ver["chamados_anexo"] != null) { ?>
							<label class="col-md-4 control-label">Baixar anexo</label>
							<div class="col-md-4">
								<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Clique na área verde para baixar o anexo"></i>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-paperclip"></i></span>
									<a href="../../../assets/anexos/chamados/<?= $ver["chamados_anexo"] ?>" target="_blank">
										<?php if ($situacao == 3 || $situacao == 5) { ?>
											<input readonly="true" class="form-control chamdo-sem-x chamado-link" type="text" value="<?= $ver["chamados_anexo"] ?>">
										<?php } else { ?>
											<input readonly="true" name="chamados_anexo" class="form-control chamdo-sem-x chamado-link" type="text" value="<?= $ver["chamados_anexo"] ?>">
										<?php } ?>	
									<a>
								</div>
								<?php if ($situacao == 1 || $situacao == 2 || $situacao == 4 || $situacao == 6) { ?>
									<i id="chamado-i" class="pull-right fa fa-question-circle i-hidden"></i>
									<i class="pull-right" data-toggle="tooltip" data-placement="top" title="Excluir anexo">
										<a class="pull-right label label-danger chamado-anexo-deletar f-btn-danger" data-toggle="modal" data-target="#modal-confirmar-delete-anexo"><i class="glyphicon glyphicon-trash chamado-anexo-link"></i>&ensp;Excluir</a>
									</i>
									<i class="pull-right" data-toggle="tooltip" data-placement="top" title="Alterar anexo">
										<a class="pull-right label label-success chamado-anexo-alterar f-btn-success btn-success" data-toggle="modal" data-target="#modal-alterar-anexo"><i class="fas fa-redo chamado-anexo-link"></i>&ensp;Alterar</a>					
									</i>
								<?php } ?>
							</div>
						<?php } ?>
					</div>

					<!-- Buttões de suporte -->
					<div class="form-group">
						<label class="col-md-4"></label>
						<div class="col-md-4 chamado-card-itens">
							<a class="btn disabled chamado-ponteiro btn-xs btn-block text-center chamado-text-itens">Menu do chamado</a>
							<div class="card chamado-itens">
								<!-- Feedback -->
								<script>
									// Atualiza as notificações como vista
									$(document).ready(function() {
										$("#chamado-notificacao-vista").click(function() {
											var chamados_id 		= <?php echo $ver["chamados_id"] ?>;
											var chamados_usuario_id = <?= $usuarios_id ?>;

											$.post("../../controllers/chamado/chamado-notificacao-vista.php", {
												chamados_id: chamados_id,
												chamados_usuario_id: chamados_usuario_id
											});
										});
									});
								</script>
								<div class="pull-left chamado-itens-linha cursor-default">
									<div id="chamado-notificacao-vista" data-toggle="modal" data-target="#modal-feedback">
										<?php $numero_feedback_novos = count(feedback_notificacao($conexao, $ver["chamados_id"], $usuarios_id)); ?>
										<?php if ($numero_feedback_novos > 0 && $numero_feedback_novos < 10) { ?>
											<a class="label label-success f-btn-danger hover-btn-feedback" data-toggle="tooltip" data-placement="top" title="Você tem <?= $numero_feedback_novos ?> <?php if ($numero_feedback_novos == 1) { echo 'feedback'; } else { echo 'feedbacks'; } ?>"><?= $numero_feedback_novos ?></a>
										<?php } ?>
										<?php if ($numero_feedback_novos > 9) { ?>
											<a class="label label-success f-btn-danger hover-btn-feedback2" data-toggle="tooltip" data-placement="top" title="Você tem <?= $numero_feedback_novos ?> feedbacks"><?= $numero_feedback_novos ?></a>
										<?php } ?>
									
										<a class="btn-feedback btn btn-primary btn-fab btn-fab-mini btn-round f-btn-primary" data-toggle="tooltip" data-placement="top" title="Feedback">
											<i class="glyphicon glyphicon-comment glyphicon-f-pointer chamado-glyphicon-btn"></i>
										</a>
									</div>
								</div>
								<!-- Histórico -->
								<div class="pull-left chamado-itens-linha cursor-default" data-toggle="modal" data-target="#modal-historico">
									<a class="btn btn-warning btn-fab btn-fab-mini btn-round f-btn-warning" data-toggle="tooltip" data-placement="top" title="Histórico">
										<i class="fa fa-book glyphicon-f-pointer chamado-glyphicon-btn icon-historico"></i>
									</a>
								</div>
								<!-- Imprimir -->
								<div class="pull-left chamado-itens-linha cursor-default" data-toggle="tooltip" data-placement="top" title="Imprimir">
									<a href="../../controllers/sistema/gerar-pdf.php?chamado=<?= $ver["chamados_id"] ?>" target="_blank" class="btn btn-success btn-fab btn-fab-mini btn-round f-btn-success">
										<i class="glyphicon glyphicon-print glyphicon-f-pointer chamado-glyphicon-btn"></i>
									</a>
								</div>
							</div>
						</div>
					</div>

					<!-- Solução -->
					<?php if ($situacao == 3 && $ver["chamados_solucao"] != null) { ?>
						<div class="form-group">
							<label class="col-md-4 control-label">Solução</label>
							<div class="col-md-4">
								<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Descrição da solução do chamado"></i>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
									<textarea readonly="true" class="form-control chamado-area-desativado" rows="5"><?= $ver["chamados_solucao"] ?></textarea>
								</div>
							</div>
						</div>
					<?php } ?>
					<!-- Não solução -->
					<?php if ($situacao == 5 && $ver["chamados_solucao"] != null) { ?>
						<div class="form-group">
							<label class="col-md-4 control-label">Motivo</label>
							<div class="col-md-4">
								<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Descrição do motivo para o cancelamento do chamado"></i>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-ban-circle"></i></span>
									<textarea readonly="true" class="form-control chamado-area-desativado" rows="5"><?= $ver["chamados_solucao"] ?></textarea>
								</div>
							</div>
						</div>
					<?php } ?>

					<!-- Alterar -->
					<?php if ($situacao == 1 || $situacao == 2 || $situacao == 4 || $situacao == 6) { ?>
						<div class="footer text-center chamado-footer cursor-default chamado-btn-ajuste">
							<button tabindex="3" class="btn btn-info btn-ms f-btn-info" type="submit"><i id="carregando"></i>Alterar</button>
						</div>
					<?php } else { ?>
						<div class="footer text-center chamado-footer cursor-default chamado-btn-ajuste">
							<button class="btn btn-primary btn-ms f-btn-primary" data-toggle="modal" data-target="#modal-reabrir-chamado">Reabrir chamado</button>
						</div>
					<?php } ?>
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