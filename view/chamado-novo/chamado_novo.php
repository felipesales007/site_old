<?php 
	require_once("../../model/chamado/categorias.php");

	$categorias = listaCategrias($conexao);
?>

<html>
    <head>
        <title>Chamado | Novo</title>
        <?php require_once("cabecalho.php"); ?>
	</head>
	<body>
		<?php include_once("../../controller/curriculo/analyticstracking.php") ?>
		<section class="wrapper">
			<!-- MENU LATERAL -->
				<aside class="sidebar">
					<ul class="sidebar-nav">
						<hr>
						<li class="active"><a title="Novo"><i class="fa fa-user-plus fa-2x"><span id="menu-lateral"><b> Novo</b></span></i></a></li>
						<hr>
						<li><a href="lista_pendentes" title="Lista"><i class="fa fa-list-alt fa-2x"><span id="menu-lateral"><b> Lista</b></span></i></a></li>
						<hr>
					</ul>
				</aside>
			<!-- /MENU LATERAL -->
			
			<!-- CENTRO -->
				<section class="main">
					<section class="tab-content">	
						<section class="tab-pane active fade in content">
							<div class="row">
								<!-- FORMULÁRIO -->
									<form class="well form-horizontal" action="../../controller/chamado/chamado_novo.php" method="POST" id="contact_form">
										<fieldset>
											<!-- TÍTULO -->
												<legend><center><i class="fa fa-user-plus fa-2x"></i><b> Novo Chamado</b><br><br></center></legend>
											<!-- /TÍTULO -->
												
											<!-- NOME INPUT -->
												<div class="form-group">
													<label for="nome" class="col-md-4 control-label">Nome</label>  
													<div class="col-md-4 inputGroupContainer">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
															<input tabindex="1" id="nome" name="nome" placeholder="Digite o nome" class="form-control" type="text">
														</div>
													</div>
												</div>
											<!-- /NOME INPUT -->

											<!-- SETOR INPUT -->
												<div class="form-group">
													<label for="setor" class="col-md-4 control-label">Setor</label> 
													<div class="col-md-4 inputGroupContainer">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
															<input tabindex="2" id="setor" name="setor" placeholder="Digite o setor" class="form-control" type="text">
														</div>
													</div>
												</div>
											<!-- /SETOR INPUT -->

											<!-- RAMAL INPUT -->
												<div class="form-group">
													<label for="ramal" class="col-md-4 control-label">Ramal</label>  
													<div class="col-md-4 inputGroupContainer">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
															<input tabindex="3" id="ramal" name="ramal" placeholder="3512" onKeypress="return numeroR(event)" class="form-control" type="number">
														</div>
													</div>
												</div>
											<!-- /RAMAL INPUT -->

											<!-- IP INPUT -->  
												<div class="form-group">
													<label for="copia" class="col-md-4 control-label">IP</label>  
													<div class="col-md-4 inputGroupContainer">
														<div class="input-group button copiar" title="Clique para copiar o IP" data-mensager="tooltip">
															<span class="input-group-addon"><img src="recursos/img/vnc.png" width=15></span>
															<input tabindex="4" name="ip" placeholder="172.16.1.1" onKeypress="return numero(event)" class="form-control" id="copia" type="text" value="172.16.">
														</div>
													</div>
												</div>
											<!-- /IP INPUT -->

											<!-- PROBLEMA ÁREA -->
												<div class="form-group">
													<label for="problema" class="col-md-4 control-label">Problema</label>
													<div class="col-md-4 inputGroupContainer">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
															<textarea tabindex="5" class="form-control" id="problema" name="problema" placeholder="Descrição do problema" rows="3" style="resize:none;"></textarea>
														</div>
													</div>
												</div>
											<!-- /PROBLEMA ÁREA -->

											<!-- SELEÇÃO DE SOLUÇÃO -->
												<div class="form-group"> 
													<label for="solucao" class="col-md-4 control-label">Resolvido</label>
													<div class="col-md-4 selectContainer">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
															<select tabindex="6" id="solucao" name="categoria_id" class="form-control selectpicker">
																<?php foreach($categorias as $categoria) : 
																	$selecionado = $lista['categoria_id'] == $categoria['id'];
																	$selecao = $selecionado ? "selected='selected'" : "";
																?>
																<option value="<?= $categoria['id'] ?>" <?= $selecao ?>>
																	<?= utf8_encode($categoria['nome']) ?>
																</option>
																<?php endforeach ?>
															</select>
														</div>
													</div>
												</div>
											<!-- /SELEÇÃO DE SOLUÇÃO -->

											<!-- BOTÃO -->
												<center>
													<br>
													<div class="form-group">
														<label class="col-md-4 control-label"></label>
														<div class="col-md-4">
															<button tabindex="7" id="enter" type="submit" class="btn btn-success button btn-block"><b>Salvar </b><span class="glyphicon glyphicon-send"></span></button>
														</div>
													</div>
												</center>
											<!-- /BOTÃO -->
										</fieldset>
									</form>
								<!-- /FORMULÁRIO -->
							</div>
						</section>
					</section>
				</section>
			<!-- /CENTRO -->
		</section>
		<?php include("../../controller/chamado/script.php"); ?>
	</body>
</html>