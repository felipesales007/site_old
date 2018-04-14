<?php
	// Controle de acesso do usuário
	include_once("../../controllers/login/login-acesso.php");
	verificar_acesso();
	// Se for administrador ou supervisor entra na tela
	if ($usuarios_permissao_id <= 2 && $usuarios_status_id == 1) {
?>
<html>
	<head>
		<!-- Importação completa do head -->
		<?php include_once("../../controllers/import/head.php"); ?>
		<title>Chamado | Dashboard</title>
	</head>
	<body>
		<?php $tela = 'dashboard' ?>
		<?php include_once("../usuario/menu-top.php"); ?>
		<section class="wrapper">
			<?php include_once("../usuario/menu-lateral.php"); ?>
			<br><br><br>
			<div class="well">
				<!-- Dashboard -->
					<div class="card card-nav-tabs card-plain">
						<div class="header header-f-primary">
							<div class="nav-tabs-navigation">
								<div class="nav-tabs-wrapper">
									<ul class="nav nav-tabs" data-tabs="tabs">
										<li class="active"><a href="#grupo" data-toggle="tab"><i class="material-icons">group</i>&ensp;Grupo</a></li>
										<li><a href="#chamados" data-toggle="tab"><i class="material-icons">build</i>&ensp;Chamados</a></li>
										<li><a href="#setor" data-toggle="tab"><i class="material-icons">card_travel</i>&ensp;Setor</a></li>
									</ul>
								</div>
							</div>
						</div>
						
						<div class="content">
							<div class="tab-content">
								<!-- Grupo -->
								<div class="tab-pane active" id="grupo">
									<div>
										<!-- Cards de responsáveis -->
											<!-- Título -->
											<a class="btn disabled chamado-ponteiro btn-block"><center><i class="glyphicon glyphicon-wrench"></i>&ensp; Responsáveis e suas demandas</center></a>
											<hr class="lista-hr-demanda">

											<?php $analista_responsaveis_demanda = analista_responsaveis_demanda($conexao, $usuarios_setor_id); ?>
											<?php foreach ($analista_responsaveis_demanda as $registro): ?>
											<?php $responsavel_id = $registro["usuarios_id"] ?>
											
											<?php $responsaveis_demanda_enviado = responsaveis_demanda_enviado($conexao, $usuarios_setor_id, $responsavel_id); ?>
											<?php $responsaveis_demanda_resolvido = responsaveis_demanda_resolvido($conexao, $usuarios_setor_id, $responsavel_id); ?>
											<?php $responsaveis_demanda_pendente = responsaveis_demanda_pendente($conexao, $usuarios_setor_id, $responsavel_id); ?>
											<?php $responsaveis_demanda_cancelado = responsaveis_demanda_cancelado($conexao, $usuarios_setor_id, $responsavel_id); ?>
											<?php $responsaveis_demanda_reaberto = responsaveis_demanda_reaberto($conexao, $usuarios_setor_id, $responsavel_id); ?>
											<?php foreach ($responsaveis_demanda_enviado as $enviado): ?>
											<?php foreach ($responsaveis_demanda_resolvido as $resolvido): ?>
											<?php foreach ($responsaveis_demanda_pendente as $pendente): ?>
											<?php foreach ($responsaveis_demanda_cancelado as $cancelado): ?>
											<?php foreach ($responsaveis_demanda_reaberto as $reaberto): ?>
												<div class="box">
													<div class="pull-left">
														<img src="../../../assets/img/perfil/<?= $registro["usuarios_imagem"] ?>" class="img-circle grid-img">
													</div>
													<h5 class="pull-left grid-nome ellipsis"><?= $registro["usuarios_nome"] ?> <?= $registro["usuarios_sobrenome"] ?></h5>
													<h6 class="pull-left grid-subtitulo">Chamados</h6>
													<h6 class="pull-left grid-contador"><i class="bola-enviado" data-toggle="tooltip" data-placement="top" title="Enviados"></i> <?= $enviado["enviado"] ?></h6>
													<h6 class="pull-left grid-contador"><i class="bola-resolvido" data-toggle="tooltip" data-placement="top" title="Resolvidos"></i> <?= $resolvido["resolvido"] ?></h6>
													<h6 class="pull-left grid-contador"><i class="bola-pendente" data-toggle="tooltip" data-placement="top" title="Pendentes"></i> <?= $pendente["pendente"] ?></h6>
													<h6 class="pull-left grid-contador"><i class="bola-cancelado" data-toggle="tooltip" data-placement="top" title="Cancelados"></i> <?= $cancelado["cancelado"] ?></h6>
													<h6 class="pull-left grid-contador"><i class="bola-reaberto" data-toggle="tooltip" data-placement="top" title="Reabertos"></i> <?= $reaberto["reaberto"] ?></h6>
												</div>
											<?php endforeach; ?>
											<?php endforeach; ?>
											<?php endforeach; ?>
											<?php endforeach; ?>
											<?php endforeach; ?>
											<?php endforeach; ?>
										<!-- /Cards de responsáveis -->
									</div>
									<br>

									<div>
										<!-- Usuários criados -->
											<!-- Título -->
											<a class="btn disabled chamado-ponteiro btn-block"><center><i class="glyphicon glyphicon-user"></i>&ensp;Usuários do setor</center></a>
											<hr class="lista-hr-espaco">

											<!-- Menu para visualização entre usuários ativos e desativados -->
											<div class="radio pesquisar-usuario-tipo">
												<label>
													<input type="radio" name="pesquisar-usuario" onclick="pesquisar_usuario();" id="usuario-aberto" checked>
													<span class="label label-info f-btn-info tecnico-label-chamado-tipo">Ativo</span>
												</label>
												<span class="tecnico-label-chamado-espaco"></span>
												<label>
													<input type="radio" name="pesquisar-usuario" onclick="pesquisar_usuario();">
													<span class="label label-danger f-btn-danger tecnico-label-chamado-tipo">Desativado</span>
												</label>
											</div>

											<div id="usuario-ativo">
												<!-- Barra de pesquisa -->
												<div class="col-xs-9 col-sm-5 col-md-3 lista-pesquisar">
													<i id="lista-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Olá <?= $usuarios_nome ?> você pode realizar pesquisas por usuário, nome, matrícula, telefone, ou permissão"></i>
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
															<input tabindex="1" class="form-control" type="text" data-action="pesquisar" data-pesquisar="#pesquisar-usuario-setor" placeholder="Pesquisar" onKeyUp="primeira_letra_maiscula(this);">
														</div>
													</div>
												</div>

												<?php $usuario_setor = count(usuario_setor($conexao, $usuarios_setor_id)) ?>
												<!-- Quantidade de chamados  -->
												<a class="pull-right label label-primary lista-n cursor-default" data-toggle="tooltip" data-placement="left" title="Quantidade de usuários no setor">
													Nº <?= $usuario_setor ?>
												</a>

												<!-- Título da tabela -->
												<table class="tabela lista-item-fixo-margem">
													<thead class="lista-item-fixo">
														<tr class="tr">
															<th class="th" width=33><i class="glyphicon glyphicon-picture chamado-historico-img-icone"></i></th>
															<th class="th">Usuário</th>
															<th class="th hidden-xs">Nome</th>
															<th class="th hidden-xs hidden-sm">Matrícula</th>
															<th class="th hidden-xs">Telefone</th>
															<th class="th">Permissão</th>
														</tr>
													</thead>
												</table>
												<!-- Lista de dados -->
												<div class="tabela-scroll">
													<table id="pesquisar-usuario-setor" class="tabela">
														<tbody class="lista-item">
															<?php $usuario_setor = usuario_setor($conexao, $usuarios_setor_id); ?>
															<?php foreach ($usuario_setor as $usuario_setor): ?>
																<tr onclick="location.href = 'usuario-visualizar?usuario=<?= $usuario_setor['usuarios_id'] ?>';">
																	<td class="td afastado-margem" width=33>
																		<img class="chamado-historico-img2" src="../../../assets/img/perfil/<?= $usuario_setor["usuarios_imagem"] ?>" data-toggle="tooltip-img" title="<img class='tooltip-img' src='../../../assets/img/perfil/<?= $usuario_setor['usuarios_imagem'] ?>'>">
																	</td>
																	<td class="td afastado-margem">
																		<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $usuario_setor['usuarios_usuario'] ?>">
																			<?= $usuario_setor['usuarios_usuario'] ?>
																		</div>
																	</td>
																	<td class="td afastado-margem hidden-xs">
																		<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $usuario_setor['usuarios_nome'] ?> <?= $usuario_setor['usuarios_sobrenome'] ?>">
																			<?= $usuario_setor['usuarios_nome'] ?> <?= $usuario_setor['usuarios_sobrenome'] ?>
																		</div>
																	</td>
																	<td class="td afastado-margem hidden-xs hidden-sm">
																		<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $usuario_setor['usuarios_matricula'] ?>">
																			<?= $usuario_setor['usuarios_matricula'] ?>
																		</div>
																	</td>
																	<td class="td afastado-margem hidden-xs">
																		<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $usuario_setor['usuarios_telefone'] ?>">
																			<?= $usuario_setor['usuarios_telefone'] ?>
																		</div>
																	</td>
																	<td class="td afastado-margem">
																		<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $usuario_setor['usuarios_permissao'] ?>">
																			<?= $usuario_setor['usuarios_permissao'] ?>
																		</div>
																	</td>
																</tr>
															<?php endforeach; ?>
														</tbody>
													</table> 
												</div>
											</div>

											<!-- ############################################ Outra lista ############################################ -->

											<div id="usuario-desativado">
												<!-- Barra de pesquisa -->
												<div class="col-xs-9 col-sm-5 col-md-3 lista-pesquisar">
													<i id="lista-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Olá <?= $usuarios_nome ?> você pode realizar pesquisas por usuário, nome, matrícula, telefone, ou permissão"></i>
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
															<input tabindex="1" class="form-control" type="text" data-action="pesquisar" data-pesquisar="#pesquisar-usuario-setor-desativado" placeholder="Pesquisar" onKeyUp="primeira_letra_maiscula(this);">
														</div>
													</div>
												</div>

												<?php $usuario_setor = count(usuario_setor_desativado($conexao, $usuarios_setor_id)) ?>
												<!-- Quantidade de chamados  -->
												<a class="pull-right label label-primary lista-n cursor-default" data-toggle="tooltip" data-placement="left" title="Quantidade de usuários desativados">
													Nº <?= $usuario_setor ?>
												</a>

												<!-- Título da tabela -->
												<table class="tabela lista-item-fixo-margem">
													<thead class="lista-item-fixo">
														<tr class="tr">
															<th class="th" width=33><i class="glyphicon glyphicon-picture chamado-historico-img-icone"></i></th>
															<th class="th">Usuário</th>
															<th class="th hidden-xs">Nome</th>
															<th class="th hidden-xs hidden-sm">Matrícula</th>
															<th class="th hidden-xs">Telefone</th>
															<th class="th">Permissão</th>
														</tr>
													</thead>
												</table>
												<!-- Lista de dados -->
												<div class="tabela-scroll">
													<table id="pesquisar-usuario-setor-desativado" class="tabela">
														<tbody class="lista-item">
															<?php $usuario_setor = usuario_setor_desativado($conexao, $usuarios_setor_id); ?>
															<?php foreach ($usuario_setor as $usuario_setor): ?>
																<tr onclick="location.href = 'usuario-visualizar?usuario=<?= $usuario_setor['usuarios_id'] ?>';">
																	<td class="td afastado-margem" width=33>
																		<img class="chamado-historico-img2" src="../../../assets/img/perfil/<?= $usuario_setor["usuarios_imagem"] ?>" data-toggle="tooltip-img" title="<img class='tooltip-img' src='../../../assets/img/perfil/<?= $usuario_setor['usuarios_imagem'] ?>'>">
																	</td>
																	<td class="td afastado-margem">
																		<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $usuario_setor['usuarios_usuario'] ?>">
																			<?= $usuario_setor['usuarios_usuario'] ?>
																		</div>
																	</td>
																	<td class="td afastado-margem hidden-xs">
																		<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $usuario_setor['usuarios_nome'] ?> <?= $usuario_setor['usuarios_sobrenome'] ?>">
																			<?= $usuario_setor['usuarios_nome'] ?> <?= $usuario_setor['usuarios_sobrenome'] ?>
																		</div>
																	</td>
																	<td class="td afastado-margem hidden-xs hidden-sm">
																		<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $usuario_setor['usuarios_matricula'] ?>">
																			<?= $usuario_setor['usuarios_matricula'] ?>
																		</div>
																	</td>
																	<td class="td afastado-margem hidden-xs">
																		<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $usuario_setor['usuarios_telefone'] ?>">
																			<?= $usuario_setor['usuarios_telefone'] ?>
																		</div>
																	</td>
																	<td class="td afastado-margem">
																		<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $usuario_setor['usuarios_permissao'] ?>">
																			<?= $usuario_setor['usuarios_permissao'] ?>
																		</div>
																	</td>
																</tr>
															<?php endforeach; ?>
														</tbody>
													</table> 
												</div>
											</div>
										<!-- /Usuários criados -->
									</div>
								</div>

								<!-- Chamado -->
								<div class="tab-pane" id="chamados">
									<!-- Informações de chamados -->
										<!-- Título -->
										<a class="btn disabled chamado-ponteiro btn-block"><center><i class="glyphicon glyphicon-signal"></i>&ensp;Informações sobre chamados</center></a>
										<hr class="lista-hr-espaco">
										<br>

										<?php $resolvidos = listar_chamados_resolvidos($conexao, $usuarios_setor_id); ?>
										<?php $cancelados = listar_chamados_cancelados($conexao, $usuarios_setor_id); ?>
										<?php $pendentes = listar_chamados_pendentes($conexao, $usuarios_setor_id); ?>
										<?php $enviados = listar_chamados_enviados($conexao, $usuarios_setor_id); ?>
										<?php $abertos = listar_chamados_abertos_ok($conexao, $usuarios_setor_id); ?>
										<?php $reabertos = listar_chamados_reabertos($conexao, $usuarios_setor_id); ?>
										<?php $todos = listar_chamados_todos($conexao, $usuarios_setor_id); ?>

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="card card-stats">
												<div class="card-header f-btn-success f-dash-verde">
													<i class="material-icons">check</i>
												</div>
												<div class="card-content">
													<p class="f-dash-category">Resolvidos</p>
													<h3 class="f-dash-title"><?= $resolvidos["quantidade"] ?></h3>
												</div>
												<div class="card-footer">
													<div class="stats">
														<hr>
														<h5 class="f-dash-text">Chamados</h5>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="card card-stats">
												<div class="card-header f-btn-danger f-dash-vermelho">
													<i class="material-icons">do_not_disturb_alt</i>
												</div>
												<div class="card-content">
													<p class="f-dash-category">Cancelados</p>
													<h3 class="f-dash-title"><?= $cancelados["quantidade"] ?></h3>
												</div>
												<div class="card-footer">
													<div class="stats">
														<hr>
														<h5 class="f-dash-text">Chamados</h5>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="card card-stats">
												<div class="card-header f-btn-warning f-dash-amarelo">
													<i class="material-icons">info_outline</i>
												</div>
												<div class="card-content">
													<p class="f-dash-category">Pendentes</p>
													<h3 class="f-dash-title"><?= $pendentes["quantidade"] ?></h3>
												</div>
												<div class="card-footer">
													<div class="stats">
														<hr>
														<h5 class="f-dash-text">Chamados</h5>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="card card-stats">
												<div class="card-header f-btn-info f-dash-azul">
													<i class="material-icons">send</i>
												</div>
												<div class="card-content">
													<p class="f-dash-category">Enviados</p>
													<h3 class="f-dash-title"><?= $enviados["quantidade"] ?></h3>
												</div>
												<div class="card-footer">
													<div class="stats">
														<hr>
														<h5 class="f-dash-text">Chamados</h5>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="card card-stats">
												<div class="card-header f-btn-default f-dash-default">
													<i class="material-icons">description</i>
												</div>
												<div class="card-content">
													<p class="f-dash-category">Abertos</p>
													<h3 class="f-dash-title"><?= $abertos["quantidade"] ?></h3>
												</div>
												<div class="card-footer">
													<div class="stats">
														<hr>
														<h5 class="f-dash-text">Chamados</h5>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="card card-stats">
												<div class="card-header f-btn-primary f-dash-primary">
													<i class="material-icons">autorenew</i>
												</div>
												<div class="card-content">
													<p class="f-dash-category">Reabertos</p>
													<h3 class="f-dash-title"><?= $reabertos["quantidade"] ?></h3>
												</div>
												<div class="card-footer">
													<div class="stats">
														<hr>
														<h5 class="f-dash-text">Chamados</h5>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="card card-stats">
												<div class="card-header f-btn-laranja f-dash-laranja">
													<i class="material-icons">build</i>
												</div>
												<div class="card-content">
													<p class="f-dash-category">Todos</p>
													<h3 class="f-dash-title"><?= $todos["quantidade"] ?></h3>
												</div>
												<div class="card-footer">
													<div class="stats">
														<hr>
														<h5 class="f-dash-text">Chamados</h5>
													</div>
												</div>
											</div>
										</div>
									<!-- /Informações de chamados -->
								</div>
								
								<!-- Setor -->
								<div class="tab-pane" id="setor">
									<!-- Ocorrências -->
										<!-- Adicionar ocorrência -->
											<!-- Título -->
											<a class="btn disabled chamado-ponteiro btn-block"><center><i class="glyphicon glyphicon-wrench"></i>&ensp; Ocorrência</center></a>
											<hr class="lista-hr-demanda">
										
											<form id="validador" class="form" method="POST" action="../../controllers/supervisor/adicionar-ocorrencia.php">
												<div class="col-md-4 f-adicionar-ocorrencia">
													<i id="login-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Adicione uma nova ocorrência ao setor para ser selecionado no chamado"></i>
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
															<input required tabindex="1" id="ocorrencias-ocorrencia" name="ocorrencias_ocorrencia" placeholder="Adicionar ocorrência" class="form-control" type="text" onkeyup="primeira_letra_maiscula(this);">
														</div>
													</div>
												</div>
												<!-- Adicionar -->
												<button id="enter" class="btn btn-success btn-sm f-btn-adicionar-ocorrencia" type="submit" tabindex="2"><i class="material-icons f-icon-ocorrencia">add</i>&ensp;Adicionar</button>
											</form>
											<br>
										<!-- /Adicionar ocorrência -->

										<!-- Lista de ocorrência -->
											<!-- Título -->
											<a class="btn disabled chamado-ponteiro btn-block"><center><i class="glyphicon glyphicon-list-alt"></i>&ensp;Lista de ocorrências</center></a>
											<hr class="lista-hr-espaco">

											<!-- Menu para visualização entre usuários ativos e desativados -->
											<div class="radio pesquisar-ocorrencia-tipo">
												<label>
													<input type="radio" name="pesquisar-ocorrencia" onclick="pesquisar_ocorrencia();" id="ocorrencia-aberto" checked>
													<span class="label label-info f-btn-info tecnico-label-chamado-tipo">Ativo</span>
												</label>
												<span class="tecnico-label-chamado-espaco"></span>
												<label>
													<input type="radio" name="pesquisar-ocorrencia" onclick="pesquisar_ocorrencia();">
													<span class="label label-danger f-btn-danger tecnico-label-chamado-tipo">Desativado</span>
												</label>
											</div>

											<div id="ocorrencia-ativo">
												<!-- Barra de pesquisa -->
												<div class="col-xs-9 col-sm-5 col-md-3 lista-pesquisar">
													<i id="lista-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Olá <?= $usuarios_nome ?> você pode pesquisar pela descrição da ocorrência"></i>
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
															<input tabindex="1" class="form-control" type="text" data-action="pesquisar" data-pesquisar="#pesquisar-ocorrencia-setor" placeholder="Pesquisar" onKeyUp="primeira_letra_maiscula(this);">
														</div>
													</div>
												</div>

												<?php $listar_ocorrencias = count(listar_ocorrencias($conexao, $usuarios_setor_id)) ?>
												<!-- Quantidade de chamados  -->
												<a class="pull-right label label-primary lista-n cursor-default" data-toggle="tooltip" data-placement="left" title="Quantidade de ocorrências do setor">
													Nº <?= $listar_ocorrencias ?>
												</a>

												<!-- Título da tabela -->
												<table class="tabela lista-item-fixo-margem">
													<thead class="lista-item-fixo">
														<tr class="tr">
															<th class="th">Ocorrência</th>
															<th class="th" width=105><center><i class="fas fa-power-off chamado-analista-envia2"></i></center></th>
														</tr>
													</thead>
												</table>
												<!-- Lista de dados -->
												<div class="tabela-scroll">
													<table id="pesquisar-ocorrencia-setor" class="tabela">
														<tbody>
															<?php $listar_ocorrencias = listar_ocorrencias($conexao, $usuarios_setor_id); ?>
															<?php foreach ($listar_ocorrencias as $listar_ocorrencias): ?>
																<tr>
																	<td class="td afastado-margem">
																		<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $listar_ocorrencias['ocorrencias_ocorrencia'] ?>">
																			<?= $listar_ocorrencias['ocorrencias_ocorrencia'] ?>
																		</div>
																	</td>
																	<td class="td" width=105>
																		<center>
																			<button class='btn btn-sm f-btn-danger btn-ocorrencia' data-toggle="modal" data-target="#modal-desativar-ocorrencia" data-id="<?= $listar_ocorrencias['ocorrencias_id'] ?>">
																				Desativar
																			</button>
																		</center>
																	</td>
																</tr>
															<?php endforeach; ?>
														</tbody>
													</table> 
												</div>
											</div>

											<!-- ############################################ Outra lista ############################################ -->

											<div id="ocorrencia-desativado">
												<!-- Barra de pesquisa -->
												<div class="col-xs-9 col-sm-5 col-md-3 lista-pesquisar">
													<i id="lista-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Olá <?= $usuarios_nome ?> você pode pesquisar pela descrição da ocorrência"></i>
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
															<input tabindex="1" class="form-control" type="text" data-action="pesquisar" data-pesquisar="#pesquisar-ocorrencia-setor-desativado" placeholder="Pesquisar" onKeyUp="primeira_letra_maiscula(this);">
														</div>
													</div>
												</div>

												<?php $listar_ocorrencias_desativada = count(listar_ocorrencias_desativada($conexao, $usuarios_setor_id)) ?>
												<!-- Quantidade de chamados  -->
												<a class="pull-right label label-primary lista-n cursor-default" data-toggle="tooltip" data-placement="left" title="Quantidade de ocorrências desativadas do setor">
													Nº <?= $listar_ocorrencias_desativada ?>
												</a>

												<!-- Título da tabela -->
												<table class="tabela lista-item-fixo-margem">
													<thead class="lista-item-fixo">
														<tr class="tr">
															<th class="th">Ocorrência</th>
															<th class="th" width=105><center><i class="fas fa-power-off chamado-analista-envia2"></i></center></th>
														</tr>
													</thead>
												</table>
												<!-- Lista de dados -->
												<div class="tabela-scroll">
													<table id="pesquisar-ocorrencia-setor-desativado" class="tabela">
														<tbody>
															<?php $listar_ocorrencias_desativada = listar_ocorrencias_desativada($conexao, $usuarios_setor_id); ?>
															<?php foreach ($listar_ocorrencias_desativada as $listar_ocorrencias_desativada): ?>
																<tr>
																	<td class="td afastado-margem">
																		<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $listar_ocorrencias_desativada['ocorrencias_ocorrencia'] ?>">
																			<?= $listar_ocorrencias_desativada['ocorrencias_ocorrencia'] ?>
																		</div>
																	</td>
																	<td class="td" width=105>
																		<center>
																			<button class='btn btn-sm f-btn-success btn-ocorrencia' data-toggle="modal" data-target="#modal-ativar-ocorrencia" data-id="<?= $listar_ocorrencias_desativada['ocorrencias_id'] ?>">
																				Ativar
																			</button>
																		</center>
																	</td>
																</tr>
															<?php endforeach; ?>
														</tbody>
													</table> 
												</div>
											</div>
										<!-- /Lista de ocorrência -->
									<!-- /Ocorrências -->
								</div>
							</div>
						</div>
					</div>
				<!-- /Dashboard -->
			</div>
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