<?php 
	require_once("../../controller/chamado/logica_usuario.php");
?>  

<html>
    <head>
        <title>Chamado | Perfil</title>
        <?php require_once("cabecalho.php"); ?>
    </head>
	<body>
		<?php include_once("../../controller/curriculo/analyticstracking.php") ?>		
		<section class="wrapper">
			<!-- BARRA LATERAL -->
				<aside class="sidebar">
					<ul class="sidebar-nav">
						<hr>
						<li><a href="chamado_novo" title="Novo"><i class="fa fa-user-plus fa-2x"><span id="menu-lateral"><b> Novo</b></span></i></a></li>
						<hr>
						<li><a href="lista_pendentes" title="Lista"><i class="fa fa-list-alt fa-2x"><span id="menu-lateral"><b> Lista</b></span></i></a></li>
						<hr>
						<li class="active"><a title="Novo"><i class="fa fa-user fa-2x"><span id="menu-lateral"><b> Perfil</b></span></i></a></li>
						<hr>
					</ul>
				</aside>
			<!-- /BARRA LATERAL -->
				
			<!-- CENTRO -->
				<section class="main">
					<section class="tab-content">	
						<section class="tab-pane active fade in content">
							<div class="row">
								<!-- CORPO -->
									<form class="well form-horizontal" action="#" method="POST" autocomplete="off">
										<fieldset>
											<!-- DADOS -->
												<div class="container" id="user">
													<div class="row">
														<div class="col-xs-12">
															<div class="panel panel-info">
																<div class="panel-heading c-list">
																	<span class="title">Informações</span>
																</div>
																<ul class="list-group" id="contact-list">
																	<li class="list-group-item">
																		<div class="col-xs-12 col-sm-3" id="bar-user">
																			<center><img src="recursos/img/usuario.jpg" width="125px" class="img-responsive img-circle"></center>
																		</div>
																		<!-- TELA CHEIA -->
																			<div class="col-xs-12 col-sm-9">
																				<legend><span class="name"><?= usuarioLogin() ?></span></legend>

																				<!-- NOME INPUT -->
																					<div class="form-group">
																						<label for="nome_useruario" class="col-md-1 control-label">Nome</label>  
																						<div class="col-md-7 inputGroupContainer">
																							<div class="input-group">
																								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
																								<input disabled id="nome_useruario" name="nome_useruario" value="<?= usuarioLogin() ?>" class="form-control" type="text">
																							</div>
																						</div>
																					</div>
																				<!-- /NOME INPUT -->

																				<!-- SETOR INPUT -->
																					<div class="form-group">
																						<label for="setor" class="col-md-1 control-label">Setor</label> 
																						<div class="col-md-7 inputGroupContainer">
																							<div class="input-group">
																								<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
																								<input disabled id="setor" name="setor" value="" class="form-control" type="text">
																							</div>
																						</div>
																					</div>
																				<!-- /SETOR INPUT -->

																				<!-- RAMAL INPUT -->
																					<div class="form-group">
																						<label for="ramal" class="col-md-1 control-label">Ramal</label>  
																						<div class="col-md-4 inputGroupContainer">
																							<div class="input-group">
																								<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
																								<input id="ramal" name="ramal" value="" onKeypress="return numeroR(event)" class="form-control" type="number">
																							</div>
																						</div>
																					</div>
																				<!-- /RAMAL INPUT -->

																				<br>

																				<!-- SENHA ATUAL INPUT -->
																					<div class="form-group">
																						<label for="senha" class="col-md-1 control-label">Senha</label>  
																						<div class="col-md-4 inputGroupContainer">
																							<div class="input-group">
																								<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
																								<input required id="senha" name="senha" placeholder="Digite sua senha atual" class="form-control" type="password">
																							</div>
																						</div>
																					</div>
																				<!-- /SENHA ATUAL INPUT -->	

																				<!-- SENHA NOVA INPUT -->
																					<div class="form-group">
																						<label for="nova-senha" class="col-md-1 control-label">Senha</label>  
																						<div class="col-md-4 inputGroupContainer">
																							<div class="input-group">
																								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
																								<input id="nova-senha" name="nova-senha" placeholder="Digite a nova senha" class="form-control" type="password">
																							</div>
																						</div>
																					</div>
																				<!-- /SENHA NOVA INPUT -->	

																				<!-- SENHA NOVA REPETE INPUT -->
																					<div class="form-group">
																						<label for="r-nova-senha" class="col-md-1 control-label">Senha</label>  
																						<div class="col-md-4 inputGroupContainer">
																							<div class="input-group">
																								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
																								<input id="r-nova-senha" name="r-nova-senha" placeholder="Repita a nova senha" class="form-control" type="password">
																							</div>
																						</div>
																					</div>
																				<!-- /SENHA NOVA REPETE INPUT -->	

																				<!-- BOTÃO -->
																					<center>
																						<br>
																						<div class="form-group">
																							<label class="col-md-1 control-label"></label>
																							<div class="col-md-4">
																								<a id="enter" type="submit" class="btn btn-primary button btn-block" data-toggle="modal" data-target="#exampleModal" data-whatever="<?= $lista['id'] ?>" data-nome="<?= $lista['nome'] ?>"><b>Alterar </b><i class="glyphicon glyphicon-send"></i></a>
																								<?php include("confirmar_editar_usuario.php"); ?>
																							</div>
																						</div>
																					</center>
																				<!-- /BOTÃO -->														
																			</div>
																		<!-- /TELA CHEIA -->
																		<div class="clearfix"></div>
																	</li>
																</ul>
															</div>
														</div>
													</div>                
												</div>
											<!-- /DADOS -->
										</fieldset>
									</form>
								<!-- /CORPO -->
							</div>
						</section>
					</section>
				</section>
			<!-- /CENTRO -->
		</section>
		<?php include("../../controller/chamado/script.php"); ?>
	</body>
</html>