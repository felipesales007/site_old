<?php 
require_once("banco/banco-categoria.php");
require_once("banco/banco-chamado.php");

    $id = $_GET['id'];
    $lista = buscaChamado($conexao, $id);
    $categorias = listaCategrias($conexao);
?>

<html>
    <head>
        <title>Chamado | Alterar</title>
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
                            <li class="active"><a title="Editar"><i class="fa fa-pencil-square-o fa-2x"><span id="menu-lateral"><b> Editar</b></span></i></a></li>
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
										<form class="well form-horizontal" action="banco/altera-chamado.php" method="POST" id="contact_form">
											<fieldset>
												<!-- Tabela titulo -->
													<legend><center><i class="fa fa-pencil-square-o fa-2x"></i><b> Editar Chamado</b><br><br></center></legend>
												<!-- /Tabela titulo -->
													
													<b>
													<!-- Nome input-->
														<div class="form-group">
															<label for="nome" class="col-md-4 control-label">Nome</label>  
															<div class="col-md-4 inputGroupContainer">
																<div class="input-group">
																	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
																	<input tabindex="1" id="nome" name="nome" placeholder="Digite o nome" class="form-control" type="text" style="text-transform:capitalize;" value="<?=$lista['nome']?>">
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
																	<input tabindex="2" id="setor" name="setor" placeholder="Digite o setor" class="form-control" type="text" style="text-transform:capitalize;" value="<?=$lista['setor']?>">
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
																	<input tabindex="3" id="ramal" name="ramal" placeholder="3512" onKeypress="return numeroR(event)" class="form-control" type="number" value="<?=$lista['ramal']?>">
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
																	<input tabindex="4" name="ip" placeholder="172.16.1.1" onKeypress="return numero(event)" class="form-control" id="copia" type="text" value="<?=$lista['ip']?>">
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
																	<textarea tabindex="5" class="form-control" id="problema" name="problema" placeholder="Descrição do problema" rows="3" style="resize:none;"><?=$lista['problema']?></textarea>
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
																				<?=$categoria['nome']?>
																			</option>
																		<?php endforeach ?>
																	</select>
																</div>
															</div>
														</div>
													<!-- Seleção de solução -->
													</b>

													<!-- Botão -->
														<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
                                                        <center>
                                                        	<br>
                                                            <div class="form-group">
                                                            <label class="col-md-4 control-label"></label>
                                                            <div class="col-md-4">
																<a tabindex="7" id="enter" type="submit" class="btn btn-primary button btn-block" data-toggle="modal" data-target="#exampleModal" data-whatever="<?=$lista['id']?>" data-nome="<?=$lista['nome']?>"><b>Alterar </b><i class="glyphicon glyphicon-send"></i></a>
																<?php include("confirma-edita.php");?>
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
			<!-- /Centro -->
			</article>
		<?php include("javascript.php");?>
	</body>
</html>