<?php 
  require_once("banco/logica-usuario.php");
?>  

<html>
    <head>
        <title>Chamado | Perfil</title>
        <?php require_once("cabecalho.php");?>
	</head>
	<body>
		<?php include_once("../../controller/curriculo/analyticstracking.php") ?>

			<!-- Nav lateral-->
				<article class="wrapper">
					<aside class="sidebar">
						<ul class="sidebar-nav">
							<hr>
							<li><a href="formulario-novo" title="Novo"><i class="fa fa-user-plus fa-2x"><span id="menu-lateral"><b> Novo</b></span></i></a></li>
							<hr>
							<li><a href="lista-pendentes" title="Lista"><i class="fa fa-list-alt fa-2x"><span id="menu-lateral"><b> Lista</b></span></i></a></li>
							<hr>
							<li class="active"><a title="Novo"><i class="fa fa-user fa-2x"><span id="menu-lateral"><b> Perfil</b></span></i></a></li>
                            <hr>
						</ul>
					</aside>
			<!-- /Nav lateral-->
			
			<!-- Centro -->
				<section class="main">
					<section class="tab-content">	
						<section class="tab-pane active fade in content" id="">
							<div class="row">
								<!-- Corpo -->
									<div>
										<form class="well form-horizontal" action="#" method="POST" autocomplete="off">
											<fieldset>



												<!-- Dados -->
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
																				<center><img src="http://www4.csudh.edu/Assets/CSUDH-Sites/History/images/Faculty-Profile-Pictures/Faculty%20Male%20Default%20Profile%20Picture.jpg" width="125px" class="img-responsive img-circle"></center>
																			</div>
																			<!-- Tela cheia -->
																				<div class="col-xs-12 col-sm-9">
																					<legend><span class="name"><?= usuarioLogin() ?></span></legend>

																					<!-- Nome input-->
																						<div class="form-group">
																							<label for="nome_useruario" class="col-md-1 control-label">Nome</label>  
																							<div class="col-md-7 inputGroupContainer">
																								<div class="input-group">
																									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
																									<input disabled id="nome_useruario" name="nome_useruario" value="<?= usuarioLogin() ?>" class="form-control" type="text">
																								</div>
																							</div>
																						</div>
																					<!-- /Nome input-->

																					<!-- Setor input-->
																						<div class="form-group">
																							<label for="setor" class="col-md-1 control-label">Setor</label> 
																							<div class="col-md-7 inputGroupContainer">
																								<div class="input-group">
																									<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
																									<input disabled id="setor" name="setor" value="" class="form-control" type="text">
																								</div>
																							</div>
																						</div>
																					<!-- /Setor input-->

																					<!-- Ramal input-->
																						<div class="form-group">
																							<label for="ramal" class="col-md-1 control-label">Ramal</label>  
																							<div class="col-md-4 inputGroupContainer">
																								<div class="input-group">
																									<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
																									<input id="ramal" name="ramal" value="" onKeypress="return numeroR(event)" class="form-control" type="number">
																								</div>
																							</div>
																						</div>
																					<!-- /Ramal input-->

																					<br>

																					<!-- Senha input-->
																						<div class="form-group">
																							<label for="senha" class="col-md-1 control-label">Senha</label>  
																							<div class="col-md-4 inputGroupContainer">
																								<div class="input-group">
																									<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
																									<input required id="senha" name="senha" placeholder="Digite sua senha atual" class="form-control" type="password">
																								</div>
																							</div>
																						</div>
																					<!-- /Senha input-->	

																					<!-- Senha input-->
																						<div class="form-group">
																							<label for="nova-senha" class="col-md-1 control-label">Senha</label>  
																							<div class="col-md-4 inputGroupContainer">
																								<div class="input-group">
																									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
																									<input id="nova-senha" name="nova-senha" placeholder="Digite a nova senha" class="form-control" type="password">
																								</div>
																							</div>
																						</div>
																					<!-- /Senha input-->	

																					<!-- Senha input-->
																						<div class="form-group">
																							<label for="r-nova-senha" class="col-md-1 control-label">Senha</label>  
																							<div class="col-md-4 inputGroupContainer">
																								<div class="input-group">
																									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
																									<input id="r-nova-senha" name="r-nova-senha" placeholder="Repita a nova senha" class="form-control" type="password">
																								</div>
																							</div>
																						</div>
																					<!-- /Senha input-->	

																					<!-- Botão -->
																						<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
																						<center>
																							<br>
																							<div class="form-group">
																								<label class="col-md-1 control-label"></label>
																								<div class="col-md-4">
																									<a tabindex="7" id="enter" type="submit" class="btn btn-primary button btn-block" data-toggle="modal" data-target="#exampleModal" data-whatever="<?=$lista['id']?>" data-nome="<?=$lista['nome']?>"><b>Alterar </b><i class="glyphicon glyphicon-send"></i></a>
																									<?php include("confirma-edita-usuario.php");?>
																								</div>
																							</div>
																						</center>
																					<!-- /Botão -->														
																				</div>
																			<!-- /Tela cheia -->
																			<div class="clearfix"></div>
																		</li>
																	</ul>
																</div>
															</div>
														</div>                
													</div>
												<!-- /Dados -->

														
												
											</fieldset>
										</form>
									</div>
								<!-- /Corpo -->
							</div>
						</section>
					</section>
			<!-- /Centro -->
			</article>
		<?php include("javascript.php");?>
	</body>
</html>