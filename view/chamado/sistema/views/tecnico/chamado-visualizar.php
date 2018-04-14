<?php
	// Controle de acesso do usuário
	include_once("../../controllers/login/login-acesso.php");
	verificar_acesso();
	
	// Obtém ID via GET
	$chamados_id = $_GET['chamado'];
	$ver = visualizar_chamado($conexao, $chamados_id);
	// Se for administrador, supervisor ou analista do setor entra na tela
	if ($usuarios_permissao_id <= 4 && $ver["chamados_setor_servico_id"] == $usuarios_setor_id && $usuarios_status_id == 1) {
?>
<html>
	<head>
		<!-- Importação completa do head -->
		<?php include_once("../../controllers/import/head.php"); ?>
		<title>Chamado | Visualizar</title>
	</head>
	<body>
		<?php $tela = 'tecnico_chamado_visualizar' ?>
		<?php include_once("../usuario/menu-top.php"); ?>
		<section class="wrapper">
			<?php include_once("../usuario/menu-lateral.php"); ?>
			<br><br><br>
			<!-- Formulário -->
				<form id="validador" name="formulario" class="well form-horizontal" method="POST" action="../../controllers/chamado/chamado-alterar.php" enctype="multipart/form-data" onsubmit="return carregando_chamado_atualizar(this)">
					<!-- Título -->
					<a class="btn disabled chamado-ponteiro btn-block"><center><i class="fa fa-eye"></i>&ensp; Visualizar Chamado</center></a>
					<hr class="chamado-hr-espaco">
					<!-- Poup-up de aviso -->
					<div class="form-group">
						<div class="col-md-4 col-md-offset-4 chamado-aviso-espaco">
							<div class="popupunder-aviso alert alert-info animate-fading"><i class="fa fa-info"></i>
								<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
									<span aria-hidden="true">&ensp;<i class="material-icons">clear</i></span>
								</button>
								&ensp;Olá <?= $usuarios_nome ?> aqui você pode visualizar todos os dados do chamado.
							</div>
						</div>
					</div>

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
					<!-- Solicitante -->
					<div class="form-group">
						<label class="col-md-4 control-label">Solicitante</label>  
						<div class="col-md-4">
							<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Solicitante que realizou a abertura do chamado"></i>
							<div class="input-group">
								<span class="input-group-addon"><img class="chamado-visualizar-img-solicitante" src="../../../assets/img/perfil/<?= $ver["usuarios_imagem"] ?>" data-toggle="tooltip-img" title="<img class='tooltip-img' src='../../../assets/img/perfil/<?= $ver["usuarios_imagem"] ?>'>"></i></span>
								<input readonly="true" class="form-control chamado-input-desativado" type="text" value="<?= $ver["usuarios_nome"] ?> <?= $ver["usuarios_sobrenome"] ?>">
							</div>
						</div>
					</div>	
					<!-- Setor -->
					<div class="form-group">
						<label class="col-md-4 control-label">Setor</label>  
						<div class="col-md-4">
							<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Setor do solicitante"></i>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
								<input readonly="true" class="form-control chamado-input-desativado" type="text" value="<?= $ver["usuarios_setor"] ?>">
							</div>
						</div>
					</div>
					<!-- Telefone -->
					<div class="form-group">
						<label class="col-md-4 control-label">Telefone</label>
						<div class="col-md-4">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
								<input readonly="true" class="form-control chamado-input-desativado chamado-data" type="text" value="<?= $ver["usuarios_telefone"] ?>">
								<i id="chamado-i" class="fa fa-question-circle fa-2x chamado-i-id" data-toggle="tooltip" data-placement="top" title="Telefone do solicitante"></i>
							</div>
						</div>
					</div>
					<!-- Celular -->
					<?php if ($ver["usuarios_celular"] != null) { ?>
						<div class="form-group">
							<label class="col-md-4 control-label">Celular</label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
									<input readonly="true" class="form-control chamado-input-desativado chamado-data" type="text" value="<?= $ver["usuarios_celular"] ?>">
									<i id="chamado-i" class="fa fa-question-circle fa-2x chamado-i-id" data-toggle="tooltip" data-placement="top" title="Celular do solicitante"></i>
								</div>
							</div>
						</div>
					<?php } ?>
					<!-- E-mail -->
					<?php if ($ver["usuarios_email"] != null) { ?>
						<div class="form-group">
							<label class="col-md-4 control-label">E-mail</label>  
							<div class="col-md-4">
								<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="E-mail do solicitante"></i>
								<div class="input-group">
									<span class="input-group-addon"><i class="far fa-envelope"></i></span>
									<input readonly="true" class="form-control chamado-input-desativado" type="text" value="<?= $ver["usuarios_email"] ?>">
								</div>
							</div>
						</div>
					<?php } ?>
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
					<?php if ($ver["chamados_problema"] != null) { ?>
						<div class="form-group">
							<label for="chamado-descricao" class="col-md-4 control-label">Problema</label>
							<div class="col-md-4">
								<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Descrição do problema do chamado, com mais detalhes e características da ocorrência"></i>
								<div class="input-group">
									<span class="input-group-addon"><i class="fas fa-pencil-alt"></i></span>
									<textarea readonly="true" class="form-control chamado-area-desativado" placeholder="Descrição do problema" rows="5"><?= $ver["chamados_problema"] ?></textarea>
								</div>
							</div>
						</div>
					<?php } ?>
					<!-- Prioridade -->
					<div class="form-group">
						<label for="chamado-prioridade" class="col-md-4 control-label">Prioridade</label>
						<div class="col-md-4">
							<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Necessidade do atendimento do chamado"></i>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-heart"></i></span>
								<?php $prioridade = $ver["chamados_prioridade_id"]; ?>

								<?php if ($prioridade == 1) { $prioridade = "Alta"; ?>
									<input readonly="true" class="form-control chamado-input-desativado" type="text" value="<?= $prioridade ?>">
								<?php } ?>

								<?php if ($prioridade == 2) { $prioridade = "Média"; ?>
									<input readonly="true" class="form-control chamado-input-desativado" type="text" value="<?= $prioridade ?>">
								<?php } ?>

								<?php if ($prioridade == 3) { $prioridade = "Baixa"; ?>
									<input readonly="true" class="form-control chamado-input-desativado" type="text" value="<?= $prioridade ?>">
								<?php } ?>
							</div>
						</div>
					</div>
					<!-- Anexo -->	
					<?php if ($ver["chamados_anexo"] != null) { ?>		
						<div class="form-group">
							<!-- Sem arquivo -->
							<?php if ($ver["chamados_anexo"] == null) { ?>
								<label for="chamado-anexo" class="col-md-4 control-label">Anexo</label>
								<div class="col-md-4">
									<i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Não há anexo no chamado para download"></i>
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
										<input readonly="true" class="form-control chamado-input-desativado" type="text" placeholder="Arquivo (opcional)">
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
											<input readonly="true" class="form-control chamdo-sem-x chamado-link" type="text" value="<?= $ver["chamados_anexo"] ?>">
										<a>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
					<!-- Buttões de suporte -->
					<div class="form-group">
						<label class="col-md-4"></label>
						<div class="col-md-4 chamado-card-itens">
							<a class="btn disabled chamado-ponteiro btn-xs btn-block text-center chamado-text-itens">Menu do chamado</a>
							<div class="card chamado-itens">
								<?php if ($situacao == 1 || $situacao == 2 || $situacao == 4 || $situacao == 6) { ?>
									<?php if ($ver["tecnico_id"] == $usuarios_id) { ?>
										<!-- Finalizar chamado -->
										<div class="pull-left chamado-itens-linha cursor-default" data-toggle="modal" data-target="#modal-finalizar-chamado" data-id="<?= $ver["chamados_id"] ?>">
											<a class="btn btn-success btn-fab btn-fab-mini btn-round f-btn-success" data-toggle="tooltip" data-placement="top" title="Finalizar o chamado">
												<i class="glyphicon glyphicon-ok glyphicon-f-pointer chamado-glyphicon-btn"></i>
											</a>
										</div>
									<?php } ?>
									<?php if ($ver["tecnico_id"] == $usuarios_id) { ?>
										<?php if ($situacao != 4) { ?>
											<!-- Chamado pendente -->
											<div class="pull-left chamado-itens-linha cursor-default" data-toggle="modal" data-target="#modal-pendente-chamado" data-id="<?= $ver["chamados_id"] ?>">
												<a class="btn btn-warning btn-fab btn-fab-mini btn-round f-btn-warning" data-toggle="tooltip" data-placement="top" title="Deixar o chamado pendente">
													<i class="far fa-hand-paper glyphicon-f-pointer chamado-glyphicon-btn"></i>
												</a>
											</div>
										<?php } ?>
										<!-- Cancelar chamado -->
										<div class="pull-left chamado-itens-linha cursor-default" data-toggle="modal" data-target="#modal-cancelar-chamado" data-id="<?= $ver["chamados_id"] ?>">
											<a class="btn btn-danger btn-fab btn-fab-mini btn-round f-btn-danger" data-toggle="tooltip" data-placement="top" title="Cancelar o chamado">
												<i class="glyphicon glyphicon-remove glyphicon-f-pointer chamado-glyphicon-btn"></i>
											</a>
										</div>
									<?php } ?>
									<!-- Enviar -->
									<div class="pull-left chamado-itens-linha cursor-default" data-toggle="modal" data-target="#modal-enviar-chamado" data-usuario="<?= $usuario['usuarios_id'] ?>" data-id="<?= $ver["chamados_id"] ?>" data-nome="<?= $registro['usuarios_nome'] ?>" data-sobrenome="<?= $registro['usuarios_sobrenome'] ?>">
										<a class="btn btn-success btn-fab btn-fab-mini btn-round f-btn-success" data-toggle="tooltip" data-placement="top" title="Enviar">
											<i class="fab fa-telegram-plane glyphicon-f-pointer chamado-glyphicon-btn"></i>
										</a>
									</div>
								<?php } ?>
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
								<?php if ($ver["tecnico_id"] == $usuarios_id) { ?>
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
								<?php } ?>
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
		// Se não for administrador, supervisor ou analista do setor volta para a tela anterior
		$_SESSION["warning"] = "Acesso não permitido";
		die("<script> window.history.back(); </script>");
	}
?>