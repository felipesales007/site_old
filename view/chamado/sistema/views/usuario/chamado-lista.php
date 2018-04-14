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
		<title>Chamado | Lista</title>
	</head>
	<body>
		<?php $tela = 'chamado_lista' ?>
		<?php include_once("../usuario/menu-top.php"); ?>
		<section class="wrapper">
			<?php include_once("../usuario/menu-lateral.php"); ?>
			<br><br><br>
			<!-- Lista -->
				<div class="well">
					<!-- Título -->
					<a class="btn disabled chamado-ponteiro btn-block"><center><i class="fa fa-tasks"></i>&ensp; Lista de chamados</center></a>
					<hr class="lista-hr-espaco">
					<!-- Barra de pesquisa -->
					<div class="col-xs-9 col-sm-5 col-md-3 lista-pesquisar">
						<i id="lista-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Olá <?= $usuarios_nome ?> você pode realizar pesquisas por nº do chamado, setor, ocorrência, prioridade, data, hora, ou status"></i>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
								<input tabindex="1" class="form-control" type="text" data-action="pesquisar" data-pesquisar="#pesquisar-registro" placeholder="Pesquisar" onKeyUp="primeira_letra_maiscula(this);">
							</div>
						</div>
					</div>

					<?php $quantidade_chamados_abertos = count(listar_chamados_abertos($conexao)) ?>
					<!-- Quantidade de chamados  -->
					<a class="pull-right label label-primary lista-n cursor-default" data-toggle="tooltip" data-placement="left" title="Quantidade de chamados abertos">
						Nº <?= $quantidade_chamados_abertos ?>
					</a>
					
					<!-- Título da tabela -->
					<table class="tabela lista-item-fixo-margem">
						<thead class="lista-item-fixo">
							<tr class="tr">
								<th class="th" width=100>Nº</th>
								<th class="th">Setor</th> 
								<th class="th hidden-xs">Ocorrência</th>
								<th class="th hidden-sm hidden-xs" width=127>Data</th> 
								<th class="th hidden-sm hidden-xs" width=67>Hora</th>
								<th class="th hidden-sm hidden-xs" width=112>Prioridade</th>
								<th class="th hidden-xs" width=155><center>Status</center></th>
							</tr>
						</thead>
					</table>
					<!-- Lista de dados -->
					<div class="tabela-scroll">
						<table id="pesquisar-registro" class="tabela">
							<tbody class="lista-item">
								<?php $listar_chamados_abertos = listar_chamados_abertos($conexao); ?>
								<?php foreach ($listar_chamados_abertos as $registro): ?>
								<?php 
									$prioridade 	 = $registro['chamados_prioridade_id'];
									$prioridade_nome = mb_strtolower($registro['prioridades_nome']);
									$situacao_nome 	 = mb_strtolower($registro['situacoes_nome']);
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
								<tr onclick="location.href = 'chamado-visualizar?chamado=<?= $registro['chamados_id'] ?>';">
									<td class="td afastado-margem" width=100>
										<div data-toggle="tooltip" data-placement="top" title="Chamado de nº <?= $registro['chamados_id'] ?> para o setor de <?= mb_strtolower($registro['setores_servicos_nome']) ?> com o problema de <?= mb_strtolower($registro['ocorrencias_ocorrencia']) ?> realizado no dia <?= $registro['chamados_data_abertura_data'] ?> às <?= $registro['chamados_data_abertura_hora'] ?> com prioridade <?= $prioridade_nome ?> <?= $situacao_nome ?>">
											<?= $registro['chamados_id'] ?>
										</div>
									</td>
									<td class="td afastado-margem">
										<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $registro['setores_servicos_nome'] ?>">
											<?= $registro['setores_servicos_nome'] ?>
										</div>
									</td>
									<td class="td afastado-margem hidden-xs">
										<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $registro['ocorrencias_ocorrencia'] ?>">
											<?= $registro['ocorrencias_ocorrencia'] ?>
										</div>
									</td>
									<td class="td afastado-margem hidden-sm hidden-xs" width=127><?= $registro['chamados_data_abertura_data'] ?></td>
									<td class="td afastado-margem hidden-sm hidden-xs" width=67><?= $registro['chamados_data_abertura_hora'] ?></td>
									<td class="td hidden-sm hidden-xs" width=112><center><?= $prioridade ?></center></td>
									<td class="td hidden-xs" width=155><center><?= $situacao ?></center></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table> 
					</div>
				</div>
			<!-- /Lista -->

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