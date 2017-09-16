<?php 
  require_once("banco/logica-usuario.php");
  require_once("banco/banco-categoria.php"); 

  $chamado = array("nome" => "", "setor" => "", "ramal" => "", "ip" => "", "prolema" => "", "categoria_id" => "1");
  $categorias = listaCategrias($conexao);
?>  

<html>
    <head>
        <title>Chamado | Novo</title>
        <?php require_once("cabecalho.php");?>
	</head>
	<body>
		<?php include_once("../../controller/curriculo/analyticstracking.php") ?>	

			<!-- Nav lateral-->
				<article class="wrapper">
					<aside class="sidebar">
						<ul class="sidebar-nav">
							<hr>
							<li class="active"><a title="Novo"><i class="fa fa-user-plus fa-2x"><span id="menu-lateral"><b> Novo</b></span></i></a></li>
							<hr>
							<li><a href="lista-pendentes" title="Lista"><i class="fa fa-list-alt fa-2x"><span id="menu-lateral"><b> Lista</b></span></i></a></li>
							<hr>
						</ul>
					</aside>
			<!-- /Nav lateral-->
			
			<!-- Centro -->
				<section class="main">
					<section class="tab-content">	
						<section class="tab-pane active fade in content" id="novo">
							<div class="row">
								<!-- Corpo -->
									<div>
										<form class="well form-horizontal" action="banco/novo-chamado.php" method="POST" id="contact_form">
											<fieldset>
												<!-- Tabela titulo -->
													<legend><center><i class="fa fa-user-plus fa-2x"></i><b> Novo Chamado</b><br><br></center></legend>
												<!-- /Tabela titulo -->
													
													<b>
													<!-- Nome input-->
														<div class="form-group">
															<label for="nome" class="col-md-4 control-label">Nome</label>  
															<div class="col-md-4 inputGroupContainer">
																<div class="input-group">
																	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
																	<input tabindex="1" id="nome" name="nome" placeholder="Digite o nome" class="form-control" type="text">
																</div>
															</div>
														</div>
													<!-- /Nome input-->

													<!-- Setor input-->
														<div class="form-group">
															<label for="setor" class="col-md-4 control-label">Setor</label> 
															<div class="col-md-4 inputGroupContainer">
																<div class="input-group">
																	<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
																	<input tabindex="2" id="setor" name="setor" placeholder="Digite o setor" class="form-control" type="text">
																</div>
															</div>
														</div>
													<!-- /Setor input-->

													<!-- Ramal input-->
														<div class="form-group">
															<label for="ramal" class="col-md-4 control-label">Ramal</label>  
															<div class="col-md-4 inputGroupContainer">
																<div class="input-group">
																	<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
																	<input tabindex="3" id="ramal" name="ramal" placeholder="3512" onKeypress="return numeroR(event)" class="form-control" type="number">
																</div>
															</div>
														</div>
													<!-- /Ramal input-->

													<!-- IP input-->  
														<div class="form-group">
															<label for="copia" class="col-md-4 control-label">IP</label>  
															<div class="col-md-4 inputGroupContainer">
																<div class="input-group button copiar" title="Clique para copiar o IP" data-mensager="tooltip">
																	<span class="input-group-addon"><img src="http://ostermeier.net/wp-content/uploads/2013/03/UltraVNC.png" width=15></span>
																	<input tabindex="4" name="ip" placeholder="172.16.1.1" onKeypress="return numero(event)" class="form-control" id="copia" type="text" value="172.16.">
																</div>
															</div>
														</div>
													<!-- /IP input-->

													<!-- Problema area -->
														<div class="form-group">
															<label for="problema" class="col-md-4 control-label">Problema</label>
															<div class="col-md-4 inputGroupContainer">
																<div class="input-group">
																	<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
																	<textarea tabindex="5" class="form-control" id="problema" name="problema" placeholder="Descrição do problema" rows="3" style="resize:none;"></textarea>
																</div>
															</div>
														</div>
													<!-- /Problema area -->

													<!-- Seleção de solução -->
														<div class="form-group"> 
															<label for="solucao" class="col-md-4 control-label">Resolvido?</label>
															<div class="col-md-4 selectContainer">
																<div class="input-group">
																	<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
																	<select tabindex="6" id="solucao" name="categoria_id" class="form-control selectpicker">
																		<?php foreach($categorias as $categoria) : 
																			$selecionado = $lista['categoria_id'] == $categoria['id'];
																			$selecao = $selecionado ? "selected='selected'" : "";
																		?>
																			<option value="<?=$categoria['id']?>" <?=$selecao?>>
																				<?=utf8_encode($categoria['nome'])?>
																			</option>
																		<?php endforeach ?>
																	</select>
																</div>
															</div>
														</div>
													<!-- Seleção de solução -->
													</b>

													<!-- Botão -->
														<center>
															<br>
															<div class="form-group">
																<label class="col-md-4 control-label"></label>
																<div class="col-md-4">
																	<button tabindex="7" id="enter" type="submit" class="btn btn-success button btn-block"><b>Salvar </b><span class="glyphicon glyphicon-send"></span></button>
																</div>
															</div>
														</center>
													<!-- /Botão -->
											</fieldset>
										</form>
									</div>
								<!-- /Corpo -->
							</div>
						</section>
					</section>
				</article>
			<!-- /Centro -->
			</article>
		<?php include("javascript.php");?>
	</body>
</html>