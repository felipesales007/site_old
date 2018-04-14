<!-- Menu top -->
	<!-- Javascript -->
	<?php include("../../controllers/import/script-rodape.php"); ?>
	
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Botão do menu lateral esquerdo -->
				<a id="menu-button-lateral-esquerdo">
					<nav class="navbar-menu navbar-fixed-left navbar-minimal">
						<div class="navbar-toggler">
							<span class="menu-icon"></span>
						</div>
					</nav>
				</a>
				<span class="navbar-brand hidden-xs"><b id="menu-titulo">&emsp;&emsp; Chamado</b></span>
				<span class="navbar-brand hidden-lg hidden-sm hidden-md" id="menu-chamado-texto-correcao"><b id="menu-titulo">&emsp;&ensp; Chamado</b></span>
			<!-- /Botão do menu lateral esquerdo -->
			
			<!-- Menu em tela cheia -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul id="menu-usuario" class="nav navbar-nav pull-right">
						<span class="pull-left menu-top-nome-usuario">
							<!-- Botão de pesquisar chamado -->
								<?php if ($usuarios_permissao_id < 5) { ?>
									<span data-toggle="modal" data-target="#modal-pesquisar-chamados">
										<i class="btn btn-primary btn-fab btn-fab-mini btn-round pesquisar-top" data-toggle="tooltip" data-placement="bottom" title="Pesquisar chamado">
											<i class="glyphicon glyphicon-search glyphicon-f-pointer pesquisar-barra-geral"></i>
										</i>
									</span>
								<?php } ?>
							<!-- /Botão de pesquisar chamado -->
							&ensp;<?= $usuarios_nome ?>
						</span>
						<li>
							<!-- Botão do menu -->
								<span id="menu-botao" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown">
									<img src="../../../assets/img/perfil/<?= $usuarios_imagem ?>" class="img-circle" id="menu-img-usuario">
									<span id="menu-texto"><b>MENU</b></span>
									<b class="caret"></b>
								</span>
							<!-- /Botão do menu -->

							<!-- Menu -->
								<ul class="dropdown-menu">
									<li><a href="../usuario/perfil"><i class="material-icons">face</i> Perfil</a></li>
									<li><a href="../usuario/historico"><i class="material-icons-historico fa fa-book"></i>&emsp;&ensp;&ensp;Histórico</a></li>
									<?php if ($usuarios_permissao_id == 1) { ?>
										<li><a href="../administrador/administrador"><i class="material-icons">settings</i> Administrador</a></li>
									<?php } ?>
									<li><a href="../usuario/contato"><i class="material-icons">mail_outline</i> Contato</a></li>
									<li><a href="../../controllers/login/logout.php" id="menu-button-sair"><i class="material-icons">power_settings_new</i> Sair</a></li>
								</ul>
							<!-- /Menu -->
						</li>
					</ul>
				</div>
			<!-- /Menu em tela cheia -->

			<!-- Menu em tela mobile -->
				

				<!-- Botão do menu-->
					<div id="menu-usuario-mobile" class="pull-right">
						<!-- Botão de pesquisar chamado -->
							<?php if ($usuarios_permissao_id < 5) { ?>
								<span data-toggle="modal" data-target="#modal-pesquisar-chamados">
									<i class="btn btn-primary btn-fab btn-fab-mini btn-round pesquisar-top-mobile visible-xs" data-toggle="tooltip" data-placement="bottom" title="Pesquisar chamado">
										<i class="glyphicon glyphicon-search glyphicon-f-pointer pesquisar-barra-geral"></i>
									</i>
								</span>
							<?php } ?>
						<!-- /Botão de pesquisar chamado -->
						<a id="menu-button-abrir" href="#menu-mobile" rel="modal">
							<span id="menu-botao" class="btn btn-white btn-sm dropdown-toggle visible-xs" data-toggle="dropdown">
								<img src="../../../assets/img/perfil/<?= $usuarios_imagem ?>" class="img-circle" id="menu-img-usuario">
								<b class="caret"></b>
							</span>
						</a>
					</div>
				<!-- /Botão do menu-->

				<!-- Menu mobile -->
					<div id="menu-mobile" class="visible-xs window">
						<ul class="menu-mobile-barra">
							<a id="menu-button-fechar" class="btn btn-danger btn-sm pull-right menu-mobile-fechar"><i class="fas fa-times"></i></a>
							<li class="sidebar-brand">
								<img src="../../../assets/img/perfil/<?= $usuarios_imagem ?>" class="img-circle" id="menu-img-usuario" style="top:-1.5px;">
								<span id="menu-titulo"><b>&ensp; MENU</b></span>
							</li>
							<li><a href="../usuario/perfil"><i class="material-icons">face</i> Perfil</a></li>
							<li><a href="../usuario/historico"><i class="material-icons-historico-mobile fa fa-book"></i>&ensp;Histórico</a></li>
							<?php if ($usuarios_permissao_id == 1) { ?>
								<li><a href="../administrador/administrador"><i class="material-icons">settings</i> Administrador</a></li>
							<?php } ?>
							<li><a href="../usuario/contato"><i class="material-icons">mail_outline</i> Contato</a></li>
							<li><a href="../../controllers/login/logout.php" id="menu-button-sair-mobile"><i class="material-icons">power_settings_new</i> Sair</a></li>
						</ul>
					</div>
				
					<!-- Fundo escuro para cobrir o sistema -->  
					<div id="fundo-escuro"></div>
				<!-- /Menu mobile -->
			<!-- /Menu em tela mobile -->
		</div>
	</nav>
	
<!-- /Menu top -->