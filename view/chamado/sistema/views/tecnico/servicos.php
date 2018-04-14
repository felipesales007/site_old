<?php
	// Controle de acesso do usuário
	include_once("../../controllers/login/login-acesso.php");
	verificar_acesso();
	// Se for administrador entra na tela
	if ($usuarios_permissao_id < 5 && $usuarios_status_id == 1) {
?>
<html>
	<head>
		<!-- Importação completa do head -->
		<?php include_once("../../controllers/import/head.php"); ?>
		<title>Chamado | Serviços</title>
	</head>
	<body>
		<?php $tela = 'servicos' ?>
		<?php include_once("../usuario/menu-top.php"); ?>
		<section class="wrapper">
			<?php include_once("../usuario/menu-lateral.php"); ?>
			<br><br><br>
			<div class="well">
				<!-- Título -->
				<a class="btn disabled chamado-ponteiro btn-block"><center><i class="material-icons">build</i>&ensp; Lista de serviços</center></a>
				<hr class="lista-hr-espaco">

				<!-- Menu para visualização entre chamados abertos e fechados -->
				<div class="radio tecnico-chamado-tipo">
					<label>
						<input type="radio" name="tecnico-servicos" onclick="chamado_servico();" id="chamado-aberto" checked>
						<span class="label label-info f-btn-info tecnico-label-chamado-tipo">Abertos</span>
					</label>
					<span class="tecnico-label-chamado-espaco"></span>
					<label>
						<input type="radio" name="tecnico-servicos" onclick="chamado_servico();">
						<span class="label label-danger f-btn-danger tecnico-label-chamado-tipo">Fechados</span>
					</label>
				</div>

				<!-- Lista chamados abertos -->
					<div id="servicos-abertos">
						<!-- Barra de pesquisa -->
						<div class="col-xs-9 col-sm-5 col-md-3 lista-pesquisar">
							<i id="lista-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="right" title="Olá <?= $usuarios_nome ?> você pode realizar pesquisas por nº do chamado, nome, setor, ocorrência, problema, data, hora, prioridade, ou status"></i>
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
									<input tabindex="1" class="form-control" type="text" data-action="pesquisar" data-pesquisar="#pesquisar-tecnico-chamado-aberto" placeholder="Pesquisar" onKeyUp="primeira_letra_maiscula(this);">
								</div>
							</div>
						</div>

						<?php $listar_servicos_chamados_abertos = count(listar_servicos_chamados_abertos($conexao, $usuarios_setor_id, $usuarios_id)) ?>
						<!-- Quantidade de chamados  -->
						<a class="pull-right label label-primary lista-n cursor-default" data-toggle="tooltip" data-placement="left" title="Quantidade de chamados em andamento">
							Nº <?= $listar_servicos_chamados_abertos ?>
						</a>

						<!-- Título da tabela -->
						<table class="tabela lista-item-fixo-margem">
							<thead class="lista-item-fixo">
								<tr class="tr">
									<th class="th" width=100>Nº</th>
									<th class="th" width=33><i class="glyphicon glyphicon-picture chamado-historico-img-icone"></i></th>
									<th class="th ellipsis">Nome</th>
									<th class="th hidden-xs">Setor</th>
									<th class="th hidden-xs ellipsis">Ocorrência</th>
									<th class="th hidden-sm hidden-xs ellipsis">Problema</th>
									<th class="th hidden-sm hidden-xs" width=127>Data</th>
									<th class="th hidden-sm hidden-xs" width=67>Hora</th>
									<th class="th hidden-sm hidden-xs" width=112>Prioridade</th>
									<th class="th hidden-sm hidden-xs" width=155><center>Status</center></th>
									<th class="th" width=45><center><i class="fab fa-telegram-plane chamado-analista-envia2"></i></center></th>
								</tr>
							</thead>
						</table>

						<!-- Lista de dados -->
						<div class="tabela-scroll">
							<table id="pesquisar-tecnico-chamado-aberto" class="tabela">
								<tbody class="lista-item">
									<?php $listar_servicos_chamados_abertos = listar_servicos_chamados_abertos($conexao, $usuarios_setor_id, $usuarios_id); ?>
									<?php foreach ($listar_servicos_chamados_abertos as $registro): ?>
										<?php 
											$prioridade 	 = $registro['chamados_prioridade_id'];
											$prioridade_nome = mb_strtolower($registro['prioridades_nome']);
											if ($prioridade == 1) {
												$prioridade = "<span class='f-label f-btn-danger btn-block'>Alta</span>";
											}
											if ($prioridade == 2) {
												$prioridade = "<span class='f-label f-btn-warning btn-block'>Média</span>";
											}
											if ($prioridade == 3) {
												$prioridade = "<span class='f-label f-btn-info btn-block'>Baixa</span>";
											}

											$situacao = $registro['chamados_situacao_id'];
											if ($situacao == 1) {
												$situacao = "<span class='f-label f-btn-default btn-block'>Aberto</span>";
											}
											if ($situacao == 2) {
												$situacao = "<span class='f-label f-btn-info btn-block'>Enviado</span>";
											}
											if ($situacao == 3) {
												$situacao = "<span class='f-label f-btn-success btn-block'>Resolvido</span>";
											}
											if ($situacao == 4) {
												$situacao = "<span class='f-label f-btn-warning btn-block'>Pendente</span>";
											}
											if ($situacao == 5) {
												$situacao = "<span class='f-label f-btn-danger btn-block'>Cancelado</span>";
											}
											if ($situacao == 6) {
												$situacao = "<span class='f-label f-btn-primary btn-block'>Reaberto</span>";
											}
										?>

										<tr>
											<td class="td afastado-margem" width=100 onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';">
												<?php if ($registro['chamados_problema'] != '') {
													$problema = 'com o problema ' .mb_strtolower($registro['chamados_problema']);
												} else {
													$problema = null;
												} ?>
												<div data-toggle="tooltip" data-placement="top" title="Chamado de nº <?= $registro['chamados_id'] ?> aberto por <?= $registro['usuarios_nome'] ?> <?= $registro['usuarios_sobrenome'] ?> do setor <?= mb_strtolower($registro['setores_setor']) ?> com a ocorrência de <?= mb_strtolower($registro['ocorrencias_ocorrencia']) ?> <?= $problema ?> no dia <?= $registro['chamados_data_abertura'] ?> às <?= $registro['chamados_hora_abertura'] ?> de prioridade <?= $prioridade_nome ?> com o status <?= mb_strtolower($registro['situacoes_nome']) ?>">
													<?= $registro['chamados_id'] ?>
												</div>
											</td>
											<td class="td afastado-margem" width=33 onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';">
												<img class="chamado-historico-img2" src="../../../assets/img/perfil/<?= $registro["usuarios_imagem"] ?>" data-toggle="tooltip-img" title="<img class='tooltip-img' src='../../../assets/img/perfil/<?= $registro['usuarios_imagem'] ?>'>">
											</td>
											<td class="td afastado-margem" onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';">
												<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $registro['usuarios_nome'] ?> <?= $registro['usuarios_sobrenome'] ?>">
													<?= $registro['usuarios_nome'] ?> <?= $registro['usuarios_sobrenome'] ?>
												</div>										
											</td>
											<td class="td afastado-margem hidden-xs" onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';">
												<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $registro['setores_setor'] ?>">
													<?= $registro['setores_setor'] ?>
												</div>
											</td>
											<td class="td afastado-margem hidden-xs" onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';">
												<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $registro['ocorrencias_ocorrencia'] ?>">
													<?= $registro['ocorrencias_ocorrencia'] ?>
												</div>
											</td>
											<td class="td afastado-margem hidden-sm hidden-xs" onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';">
												<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $registro['chamados_problema'] ?>">
													<?= $registro['chamados_problema'] ?>
												</div>
											</td>
											<td class="td afastado-margem hidden-sm hidden-xs" width=127 onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';"><?= $registro['chamados_data_abertura'] ?></td>
											<td class="td afastado-margem hidden-sm hidden-xs" width=67 onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';"><?= $registro['chamados_hora_abertura'] ?></td>
											<td class="td hidden-sm hidden-xs" width=112 onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';"><center><?= $prioridade ?></center></td>
											<td class="td hidden-sm hidden-xs" width=155 onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';"><center><?= $situacao ?></center></td>
											<td class="td modal-id" width=45 data-toggle="modal" data-target="#modal-enviar-chamado" data-usuario="<?= $usuario['usuarios_id'] ?>" data-id="<?= $registro['chamados_id'] ?>" data-nome="<?= $registro['usuarios_nome'] ?>" data-sobrenome="<?= $registro['usuarios_sobrenome'] ?>">
												<div data-toggle="tooltip" data-placement="top" title="Enviar">
													<center>
														<a class='f-label f-btn-success btn-block chamado-analista-envia'>
															<i class="fas fa-child glyphicon-f-pointer"></i>
														</a>
													</center>
												</div>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				<!-- /Lista chamados abertos -->

				<!-- ############################################ Outra lista ############################################ -->
				
				<!-- Lista chamados fechados -->
					<div id="servicos-fechados">
						<!-- Barra de pesquisa -->
						<div class="col-xs-9 col-sm-5 col-md-3 lista-pesquisar">
							<i id="lista-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="right" title="Olá <?= $usuarios_nome ?> você pode realizar pesquisas por nº do chamado, nome, setor, ocorrência, problema, data, hora, prioridade, ou status"></i>
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
									<input tabindex="1" class="form-control" type="text" data-action="pesquisar" data-pesquisar="#pesquisar-tecnico-chamado-fechado" placeholder="Pesquisar" onKeyUp="primeira_letra_maiscula(this);">
								</div>
							</div>
						</div>

						<?php $listar_servicos_chamados_fechados = count(listar_servicos_chamados_fechados($conexao, $usuarios_setor_id, $usuarios_id)) ?>
						<!-- Quantidade de chamados  -->
						<a class="pull-right label label-primary lista-n cursor-default" data-toggle="tooltip" data-placement="left" title="Quantidade de chamados em andamento">
							Nº <?= $listar_servicos_chamados_fechados ?>
						</a>

						<!-- Título da tabela -->
						<table class="tabela lista-item-fixo-margem">
							<thead class="lista-item-fixo">
								<tr class="tr">
									<th class="th" width=100>Nº</th>
									<th class="th" width=33><i class="glyphicon glyphicon-picture chamado-historico-img-icone"></i></th>
									<th class="th ellipsis">Nome</th>
									<th class="th hidden-xs">Setor</th>
									<th class="th hidden-xs ellipsis">Ocorrência</th>
									<th class="th hidden-sm hidden-xs ellipsis">Problema</th>
									<th class="th hidden-sm hidden-xs" width=127>Data</th>
									<th class="th hidden-sm hidden-xs" width=67>Hora</th>
									<th class="th hidden-sm hidden-xs" width=112>Prioridade</th>
									<th class="th hidden-sm hidden-xs" width=155><center>Status</center></th>
									<th class="th" width=45><center><i class="fab fa-telegram-plane chamado-analista-envia2"></i></center></th>
								</tr>
							</thead>
						</table>

						<!-- Lista de dados -->
						<div class="tabela-scroll">
							<table id="pesquisar-tecnico-chamado-fechado" class="tabela">
								<tbody class="lista-item">
									<?php $listar_servicos_chamados_fechados = listar_servicos_chamados_fechados($conexao, $usuarios_setor_id, $usuarios_id); ?>
									<?php foreach ($listar_servicos_chamados_fechados as $registro): ?>
										<?php 
											$prioridade 	 = $registro['chamados_prioridade_id'];
											$prioridade_nome = mb_strtolower($registro['prioridades_nome']);
											if ($prioridade == 1) {
												$prioridade = "<span class='f-label f-btn-danger btn-block'>Alta</span>";
											}
											if ($prioridade == 2) {
												$prioridade = "<span class='f-label f-btn-warning btn-block'>Média</span>";
											}
											if ($prioridade == 3) {
												$prioridade = "<span class='f-label f-btn-info btn-block'>Baixa</span>";
											}

											$situacao = $registro['chamados_situacao_id'];
											if ($situacao == 1) {
												$situacao = "<span class='f-label f-btn-default btn-block'>Aberto</span>";
											}
											if ($situacao == 2) {
												$situacao = "<span class='f-label f-btn-info btn-block'>Enviado</span>";
											}
											if ($situacao == 3) {
												$situacao = "<span class='f-label f-btn-success btn-block'>Resolvido</span>";
											}
											if ($situacao == 4) {
												$situacao = "<span class='f-label f-btn-warning btn-block'>Pendente</span>";
											}
											if ($situacao == 5) {
												$situacao = "<span class='f-label f-btn-danger btn-block'>Cancelado</span>";
											}
											if ($situacao == 6) {
												$situacao = "<span class='f-label f-btn-primary btn-block'>Reaberto</span>";
											}
										?>

										<tr>
											<td class="td afastado-margem" width=100 onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';">
												<?php if ($registro['chamados_problema'] != '') {
													$problema = 'com o problema ' .mb_strtolower($registro['chamados_problema']);
												} else {
													$problema = null;
												} ?>
												<div data-toggle="tooltip" data-placement="top" title="Chamado de nº <?= $registro['chamados_id'] ?> aberto por <?= $registro['usuarios_nome'] ?> <?= $registro['usuarios_sobrenome'] ?> do setor <?= mb_strtolower($registro['setores_setor']) ?> com a ocorrência de <?= mb_strtolower($registro['ocorrencias_ocorrencia']) ?> <?= $problema ?> no dia <?= $registro['chamados_data_abertura'] ?> às <?= $registro['chamados_hora_abertura'] ?> de prioridade <?= $prioridade_nome ?> com o status <?= mb_strtolower($registro['situacoes_nome']) ?>">
													<?= $registro['chamados_id'] ?>
												</div>
											</td>
											<td class="td afastado-margem" width=33 onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';">
												<img class="chamado-historico-img2" src="../../../assets/img/perfil/<?= $registro["usuarios_imagem"] ?>" data-toggle="tooltip-img" title="<img class='tooltip-img' src='../../../assets/img/perfil/<?= $registro['usuarios_imagem'] ?>'>">
											</td>
											<td class="td afastado-margem" onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';">
												<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $registro['usuarios_nome'] ?> <?= $registro['usuarios_sobrenome'] ?>">
													<?= $registro['usuarios_nome'] ?> <?= $registro['usuarios_sobrenome'] ?>
												</div>										
											</td>
											<td class="td afastado-margem hidden-xs" onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';">
												<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $registro['setores_setor'] ?>">
													<?= $registro['setores_setor'] ?>
												</div>
											</td>
											<td class="td afastado-margem hidden-xs" onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';">
												<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $registro['ocorrencias_ocorrencia'] ?>">
													<?= $registro['ocorrencias_ocorrencia'] ?>
												</div>
											</td>
											<td class="td afastado-margem hidden-sm hidden-xs" onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';">
												<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $registro['chamados_problema'] ?>">
													<?= $registro['chamados_problema'] ?>
												</div>
											</td>
											<td class="td afastado-margem hidden-sm hidden-xs" width=127 onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';"><?= $registro['chamados_data_abertura'] ?></td>
											<td class="td afastado-margem hidden-sm hidden-xs" width=67 onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';"><?= $registro['chamados_hora_abertura'] ?></td>
											<td class="td hidden-sm hidden-xs" width=112 onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';"><center><?= $prioridade ?></center></td>
											<td class="td hidden-sm hidden-xs" width=155 onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';"><center><?= $situacao ?></center></td>
											<td class="td modal-id" width=45>
												<div data-toggle="tooltip" data-placement="top" title="Chamado fechado">
													<center>
														<a class='f-label f-btn-default btn-block chamado-analista-envia'>
															<i class="fas fa-child glyphicon-f-pointer"></i>
														</a>
													</center>
												</div>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				<!-- /Lista chamados fechados -->
			</div>
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