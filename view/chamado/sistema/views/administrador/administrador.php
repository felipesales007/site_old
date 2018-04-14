<?php
	// Controle de acesso do usuário
	include_once("../../controllers/login/login-acesso.php");
	verificar_acesso();
	// Se for administrador entra na tela
	if ($usuarios_permissao_id == 1 && $usuarios_status_id == 1) {
?>
<html>
	<head>
		<!-- Importação completa do head -->
		<?php include_once("../../controllers/import/head.php"); ?>
		<title>Chamado | Administrador</title>
	</head>
	<body>
		<?php $tela = 'adm' ?>
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
										<li class="active"><a href="#usuarios" data-toggle="tab"><i class="material-icons">group</i>&ensp;Usuários</a></li>
										<li><a href="#setores" data-toggle="tab"><i class="material-icons">card_travel</i>&ensp;Setores</a></li>
										<li><a href="#setores_servicos" data-toggle="tab"><i class="material-icons">build</i>&ensp;Setores de serviços</a></li>
									</ul>
								</div>
							</div>
						</div>
						
						<div class="content">
							<div class="tab-content">
								<!-- Usuários -->
								<div class="tab-pane active" id="usuarios">
									<!-- Informações de usuários ativos -->
										<!-- Título -->
										<a class="btn disabled chamado-ponteiro btn-block"><center><i class="glyphicon glyphicon-briefcase"></i>&ensp;Usuários ativos</center></a>
										<hr class="lista-hr-espaco">
										<br>

										<?php $masculino = listar_usuarios_masculino($conexao); ?>
										<?php $feminino  = listar_usuarios_feminino($conexao); ?>
										<?php $outro 	 = listar_usuarios_outro($conexao); ?>
										<?php $total 	 = listar_usuarios_total($conexao); ?>

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="card card-stats">
												<div class="card-header f-btn-info f-dash-azul">
													<img src="../../../assets/img/perfil/masculino.png" class="img-circle f-usuario-ativado" id="dash-img-usuario">
												</div>
												<div class="card-content">
													<p class="f-dash-category">Usuários</p>
													<h3 class="f-dash-title"><?= $masculino["quantidade"] ?></h3>
												</div>
												<div class="card-footer">
													<div class="stats">
														<hr>
														<h5 class="f-dash-text">Masculino</h5>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="card card-stats">
												<div class="card-header f-btn-rosa f-dash-rosa">
													<img src="../../../assets/img/perfil/feminino.png" class="img-circle f-usuario-ativado" id="dash-img-usuario">
												</div>
												<div class="card-content">
													<p class="f-dash-category">Usuários</p>
													<h3 class="f-dash-title"><?= $feminino["quantidade"] ?></h3>
												</div>
												<div class="card-footer">
													<div class="stats">
														<hr>
														<h5 class="f-dash-text">Feminino</h5>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="card card-stats">
												<div class="card-header f-btn-warning f-dash-amarelo">
													<img src="../../../assets/img/perfil/outro.png" class="img-circle f-usuario-ativado" id="dash-img-usuario">
												</div>
												<div class="card-content">
													<p class="f-dash-category">Usuários</p>
													<h3 class="f-dash-title"><?= $outro["quantidade"] ?></h3>
												</div>
												<div class="card-footer">
													<div class="stats">
														<hr>
														<h5 class="f-dash-text">Outro</h5>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="card card-stats">
												<div class="card-header f-btn-laranja f-dash-laranja">
													<img src="../../../assets/img/perfil/grupo.png" class="img-circle f-usuario-ativado" id="dash-img-usuario">
												</div>
												<div class="card-content">
													<p class="f-dash-category">Usuários</p>
													<h3 class="f-dash-title"><?= $total["quantidade"] ?></h3>
												</div>
												<div class="card-footer">
													<div class="stats">
														<hr>
														<h5 class="f-dash-text">Todos</h5>
													</div>
												</div>
											</div>
										</div>
									<!-- /Informações de usuários ativos -->

									<!-- Informações de usuários desativados -->
										<!-- Título -->
										<div class="radio"><label></label></div>
										<a class="btn disabled chamado-ponteiro btn-block"><center><i class="glyphicon glyphicon-briefcase"></i>&ensp;Usuários desativados</center></a>
										<hr class="lista-hr-espaco">
										<br>

										<?php $masculino_desativados = listar_usuarios_masculino_desativados($conexao); ?>
										<?php $feminino_desativados  = listar_usuarios_feminino_desativados($conexao); ?>
										<?php $outro_desativados 	 = listar_usuarios_outro_desativados($conexao); ?>
										<?php $total_desativados 	 = listar_usuarios_total_desativados($conexao); ?>

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="card card-stats">
												<div class="card-header f-btn-info f-dash-azul">
													<img src="../../../assets/img/perfil/masculino.png" class="img-circle f-usuario-desativado" id="dash-img-usuario">
												</div>
												<div class="card-content">
													<p class="f-dash-category">Usuários</p>
													<h3 class="f-dash-title"><?= $masculino_desativados["quantidade"] ?></h3>
												</div>
												<div class="card-footer">
													<div class="stats">
														<hr>
														<h5 class="f-dash-text">Masculino</h5>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="card card-stats">
												<div class="card-header f-btn-rosa f-dash-rosa">
													<img src="../../../assets/img/perfil/feminino.png" class="img-circle f-usuario-desativado" id="dash-img-usuario">
												</div>
												<div class="card-content">
													<p class="f-dash-category">Usuários</p>
													<h3 class="f-dash-title"><?= $feminino_desativados["quantidade"] ?></h3>
												</div>
												<div class="card-footer">
													<div class="stats">
														<hr>
														<h5 class="f-dash-text">Feminino</h5>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="card card-stats">
												<div class="card-header f-btn-warning f-dash-amarelo">
													<img src="../../../assets/img/perfil/outro.png" class="img-circle f-usuario-desativado" id="dash-img-usuario">
												</div>
												<div class="card-content">
													<p class="f-dash-category">Usuários</p>
													<h3 class="f-dash-title"><?= $outro_desativados["quantidade"] ?></h3>
												</div>
												<div class="card-footer">
													<div class="stats">
														<hr>
														<h5 class="f-dash-text">Outro</h5>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="card card-stats">
												<div class="card-header f-btn-laranja f-dash-laranja">
													<img src="../../../assets/img/perfil/grupo.png" class="img-circle f-usuario-desativado" id="dash-img-usuario">
												</div>
												<div class="card-content">
													<p class="f-dash-category">Usuários</p>
													<h3 class="f-dash-title"><?= $total_desativados["quantidade"] ?></h3>
												</div>
												<div class="card-footer">
													<div class="stats">
														<hr>
														<h5 class="f-dash-text">Todos</h5>
													</div>
												</div>
											</div>
										</div>
									<!-- /Informações de usuários desativados -->
									
									<!-- Usuários criados -->
										<!-- Título -->
										<div class="radio"><label></label></div>
										<a class="btn disabled chamado-ponteiro btn-block"><center><i class="glyphicon glyphicon-user"></i>&ensp;Usuários</center></a>
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
												<i id="lista-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Olá <?= $usuarios_nome ?> você pode realizar pesquisas por usuário, nome, matrícula, setor, telefone, ou permissão"></i>
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
														<input tabindex="1" class="form-control" type="text" data-action="pesquisar" data-pesquisar="#pesquisar-usuario-setor" placeholder="Pesquisar" onKeyUp="primeira_letra_maiscula(this);">
													</div>
												</div>
											</div>

											<?php $usuario_setor = count(usuarios_todos($conexao)) ?>
											<!-- Quantidade de chamados  -->
											<a class="pull-right label label-primary lista-n cursor-default" data-toggle="tooltip" data-placement="left" title="Quantidade de usuários cadastrados">
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
														<th class="th hidden-xs hidden-sm">Setor</th>
														<th class="th hidden-xs">Telefone</th>
														<th class="th">Permissão</th>
													</tr>
												</thead>
											</table>
											<!-- Lista de dados -->
											<div class="tabela-scroll">
												<table id="pesquisar-usuario-setor" class="tabela">
													<tbody class="lista-item">
														<?php $usuario_setor = usuarios_todos($conexao); ?>
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
																<td class="td afastado-margem hidden-xs hidden-sm">
																	<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $usuario_setor['usuarios_setor'] ?>">
																		<?= $usuario_setor['usuarios_setor'] ?>
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
												<i id="lista-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Olá <?= $usuarios_nome ?> você pode realizar pesquisas por usuário, nome, matrícula, setor, telefone, ou permissão"></i>
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
														<input tabindex="1" class="form-control" type="text" data-action="pesquisar" data-pesquisar="#pesquisar-usuario-setor-desativado" placeholder="Pesquisar" onKeyUp="primeira_letra_maiscula(this);">
													</div>
												</div>
											</div>

											<?php $usuario_setor = count(usuarios_todos_desativado($conexao)) ?>
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
														<th class="th hidden-xs hidden-sm">Setor</th>
														<th class="th hidden-xs">Telefone</th>
														<th class="th">Permissão</th>
													</tr>
												</thead>
											</table>
											<!-- Lista de dados -->
											<div class="tabela-scroll">
												<table id="pesquisar-usuario-setor-desativado" class="tabela">
													<tbody class="lista-item">
														<?php $usuario_setor = usuarios_todos_desativado($conexao); ?>
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
																<td class="td afastado-margem hidden-xs hidden-sm">
																	<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $usuario_setor['usuarios_setor'] ?>">
																		<?= $usuario_setor['usuarios_setor'] ?>
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

								<!-- Setores -->
								<div class="tab-pane" id="setores">
									<!-- Adicionar setor -->
										<!-- Título -->
										<a class="btn disabled chamado-ponteiro btn-block"><center><i class="glyphicon glyphicon-briefcase"></i>&ensp; Adicionar setor</center></a>
										<hr class="lista-hr-demanda">
									
										<form id="validador" class="form" method="POST" action="../../controllers/administrador/adicionar-setor.php">
											<div class="col-md-4 f-adicionar-ocorrencia">
												<i id="login-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Adicione um novo setor ao sistema"></i>
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
														<input required tabindex="1" id="setores-setor" name="setores_setor" placeholder="Adicionar setor" class="form-control" type="text" onkeyup="primeira_letra_maiscula(this);">
													</div>
												</div>
											</div>
											<!-- Adicionar -->
											<button class="btn btn-success btn-sm f-btn-adicionar-ocorrencia" type="submit"><i class="material-icons f-icon-ocorrencia">add</i>&ensp;Adicionar</button>
										</form>
										<br>
									<!-- /Adicionar setor -->								
								
									<!-- Setores -->
										<!-- Título -->
										<a class="btn disabled chamado-ponteiro btn-block"><center><i class="glyphicon glyphicon-list-alt"></i>&ensp;Lista de setores</center></a>
										<hr class="lista-hr-espaco">

										<!-- Menu para visualização entre setores ativos e desativados -->
										<div class="radio pesquisar-setor-tipo">
											<label>
												<input type="radio" name="pesquisar-setor" onclick="pesquisar_setor();" id="setor-aberto" checked>
												<span class="label label-info f-btn-info tecnico-label-chamado-tipo">Ativo</span>
											</label>
											<span class="tecnico-label-chamado-espaco"></span>
											<label>
												<input type="radio" name="pesquisar-setor" onclick="pesquisar_setor();">
												<span class="label label-danger f-btn-danger tecnico-label-chamado-tipo">Desativado</span>
											</label>
										</div>

										<div id="setor-ativo">
											<!-- Barra de pesquisa -->
											<div class="col-xs-9 col-sm-5 col-md-3 lista-pesquisar">
												<i id="lista-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Olá <?= $usuarios_nome ?> você pode pesquisar pelo nome do setor"></i>
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
														<input tabindex="1" class="form-control" type="text" data-action="pesquisar" data-pesquisar="#pesquisar-setores-ativos" placeholder="Pesquisar" onKeyUp="primeira_letra_maiscula(this);">
													</div>
												</div>
											</div>

											<?php $listar_ocorrencias = count(setores_todos($conexao)) ?>
											<!-- Quantidade de chamados  -->
											<a class="pull-right label label-primary lista-n cursor-default" data-toggle="tooltip" data-placement="left" title="Quantidade de setores">
												Nº <?= $listar_ocorrencias ?>
											</a>

											<!-- Título da tabela -->
											<table class="tabela lista-item-fixo-margem">
												<thead class="lista-item-fixo">
													<tr class="tr">
														<th class="th">Setor</th>
														<th class="th" width=105><center><i class="fas fa-power-off chamado-analista-envia2"></i></center></th>
													</tr>
												</thead>
											</table>
											<!-- Lista de dados -->
											<div class="tabela-scroll">
												<table id="pesquisar-setores-ativos" class="tabela">
													<tbody>
														<?php $setores_todos = setores_todos($conexao); ?>
														<?php foreach ($setores_todos as $setores_todos): ?>
															<tr>
																<td class="td afastado-margem">
																	<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $setores_todos['setores_setor'] ?>">
																		<?= $setores_todos['setores_setor'] ?>
																	</div>
																</td>
																<td class="td" width=105>
																	<center>
																		<button class='btn btn-sm f-btn-danger btn-ocorrencia' data-toggle="modal" data-target="#modal-desativar-setor" data-id="<?= $setores_todos['setores_id'] ?>">
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

										<div id="setor-desativado">
											<!-- Barra de pesquisa -->
											<div class="col-xs-9 col-sm-5 col-md-3 lista-pesquisar">
												<i id="lista-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Olá <?= $usuarios_nome ?> você pode pesquisar pelo nome do setor"></i>
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
														<input tabindex="1" class="form-control" type="text" data-action="pesquisar" data-pesquisar="#pesquisar-setores-desativado" placeholder="Pesquisar" onKeyUp="primeira_letra_maiscula(this);">
													</div>
												</div>
											</div>

											<?php $setores_todos_desativado = count(setores_todos_desativado($conexao)) ?>
											<!-- Quantidade de chamados  -->
											<a class="pull-right label label-primary lista-n cursor-default" data-toggle="tooltip" data-placement="left" title="Quantidade de setores desativados">
												Nº <?= $setores_todos_desativado ?>
											</a>

											<!-- Título da tabela -->
											<table class="tabela lista-item-fixo-margem">
												<thead class="lista-item-fixo">
													<tr class="tr">
														<th class="th">Setor</th>
														<th class="th" width=105><center><i class="fas fa-power-off chamado-analista-envia2"></i></center></th>
													</tr>
												</thead>
											</table>
											<!-- Lista de dados -->
											<div class="tabela-scroll">
												<table id="pesquisar-setores-desativado" class="tabela">
													<tbody>
														<?php $setores_todos_desativado = setores_todos_desativado($conexao); ?>
														<?php foreach ($setores_todos_desativado as $setores_todos_desativado): ?>
															<tr>
																<td class="td afastado-margem">
																	<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $setores_todos_desativado['setores_setor'] ?>">
																		<?= $setores_todos_desativado['setores_setor'] ?>
																	</div>
																</td>
																<td class="td" width=105>
																	<center>
																		<button class='btn btn-sm f-btn-success btn-ocorrencia' data-toggle="modal" data-target="#modal-ativar-setor" data-id="<?= $setores_todos_desativado['setores_id'] ?>">
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
									<!-- /Setores -->
								</div>

								<!-- Setores de serviços -->
								<div class="tab-pane" id="setores_servicos">
									<!-- Setores -->
										<!-- Adicionar setor de serviço -->
											<!-- Título -->
											<a class="btn disabled chamado-ponteiro btn-block"><center><i class="glyphicon glyphicon-briefcase"></i>&ensp; Setores</center></a>
											<hr class="lista-hr-demanda">
										
											<form id="validador-7" class="form" method="POST" action="../../controllers/administrador/adicionar-setor-servico.php">
												<div class="col-md-4 f-adicionar-ocorrencia">
													<i id="login-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Adicione um novo setor de serviço ao sistema"></i>
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
															<select required tabindex="6" id="setores-servicos-nome" name="setores_servicos_nome" class="form-control selectpicker">
																<option value="" disabled selected>Novo setor de serviço</option>
																<?php $listar_setores = listar_setores($conexao); ?>
																<?php foreach ($listar_setores as $registro): ?>
																	<option value="<?= $registro['setores_id'] ?>"><?= $registro["setores_setor"] ?></option>
																<?php endforeach; ?>
															</select>
														</div>
													</div>
												</div>
												<!-- Adicionar -->
												<button id="enter" class="btn btn-success btn-sm f-btn-adicionar-ocorrencia" type="submit" tabindex="2"><i class="material-icons f-icon-ocorrencia">add</i>&ensp;Adicionar</button>
											</form>
											<br>
										<!-- /Adicionar setor de serviço -->

										<!-- Lista de ocorrência -->
											<!-- Título -->
											<a class="btn disabled chamado-ponteiro btn-block"><center><i class="glyphicon glyphicon-wrench"></i>&ensp;Lista de setores de serviços</center></a>
											<hr class="lista-hr-espaco">

											<!-- Menu para visualização entre setores de serviços ativos e desativados -->
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
													<i id="lista-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Olá <?= $usuarios_nome ?> você pode pesquisar pelo nome do setor"></i>
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
															<input tabindex="1" class="form-control" type="text" data-action="pesquisar" data-pesquisar="#pesquisar-ocorrencia-setor" placeholder="Pesquisar" onKeyUp="primeira_letra_maiscula(this);">
														</div>
													</div>
												</div>

												<?php $setores_servicos_todos = count(setores_servicos_todos($conexao)) ?>
												<!-- Quantidade de chamados  -->
												<a class="pull-right label label-primary lista-n cursor-default" data-toggle="tooltip" data-placement="left" title="Quantidade de setores de serviços">
													Nº <?= $setores_servicos_todos ?>
												</a>

												<!-- Título da tabela -->
												<table class="tabela lista-item-fixo-margem">
													<thead class="lista-item-fixo">
														<tr class="tr">
															<th class="th">Setor</th>
															<th class="th" width=105><center><i class="fas fa-power-off chamado-analista-envia2"></i></center></th>
														</tr>
													</thead>
												</table>
												<!-- Lista de dados -->
												<div class="tabela-scroll">
													<table id="pesquisar-ocorrencia-setor" class="tabela">
														<tbody>
															<?php $setores_servicos_todos = setores_servicos_todos($conexao); ?>
															<?php foreach ($setores_servicos_todos as $setores_servicos_todos): ?>
																<tr>
																	<td class="td afastado-margem">
																		<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $setores_servicos_todos['setores_servicos_nome'] ?>">
																			<?= $setores_servicos_todos['setores_servicos_nome'] ?>
																		</div>
																	</td>
																	<td class="td" width=105>
																		<center>
																			<button class='btn btn-sm f-btn-danger btn-ocorrencia' data-toggle="modal" data-target="#modal-desativar-setor-servicos" data-id="<?= $setores_servicos_todos['setores_servicos_id'] ?>">
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
													<i id="lista-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Olá <?= $usuarios_nome ?> você pode pesquisar pelo nome do setor"></i>
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
															<input tabindex="1" class="form-control" type="text" data-action="pesquisar" data-pesquisar="#pesquisar-ocorrencia-setor-desativado" placeholder="Pesquisar" onKeyUp="primeira_letra_maiscula(this);">
														</div>
													</div>
												</div>

												<?php $setores_servicos_todos_desativados = count(setores_servicos_todos_desativados($conexao)) ?>
												<!-- Quantidade de chamados  -->
												<a class="pull-right label label-primary lista-n cursor-default" data-toggle="tooltip" data-placement="left" title="Quantidade de setores de serviços desativados">
													Nº <?= $setores_servicos_todos_desativados ?>
												</a>

												<!-- Título da tabela -->
												<table class="tabela lista-item-fixo-margem">
													<thead class="lista-item-fixo">
														<tr class="tr">
															<th class="th">Setor</th>
															<th class="th" width=105><center><i class="fas fa-power-off chamado-analista-envia2"></i></center></th>
														</tr>
													</thead>
												</table>
												<!-- Lista de dados -->
												<div class="tabela-scroll">
													<table id="pesquisar-ocorrencia-setor-desativado" class="tabela">
														<tbody>
															<?php $setores_servicos_todos_desativados = setores_servicos_todos_desativados($conexao); ?>
															<?php foreach ($setores_servicos_todos_desativados as $setores_servicos_todos_desativados): ?>
																<tr>
																	<td class="td afastado-margem">
																		<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $setores_servicos_todos_desativados['setores_servicos_nome'] ?>">
																			<?= $setores_servicos_todos_desativados['setores_servicos_nome'] ?>
																		</div>
																	</td>
																	<td class="td" width=105>
																		<center>
																			<button class='btn btn-sm f-btn-success btn-ocorrencia' data-toggle="modal" data-target="#modal-ativar-setor-servicos" data-id="<?= $setores_servicos_todos_desativados['setores_servicos_id'] ?>">
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
									<!-- /Setores -->
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