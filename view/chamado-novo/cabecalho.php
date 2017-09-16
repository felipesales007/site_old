<?php
	error_reporting(E_ALL ^ E_NOTICE);
	require_once("../../controller/chamado/logica_usuario.php");
	require_once("../../controller/chamado/mostra_alerta.php"); 
	verificaUsuario();
?>

<html>
	<head>
		<?php include("../../controller/chamado/importacao.php"); ?>
	</head>
	<body>
		<!-- BARRA -->
			<nav class="navbar navbar-default navbar-fixed-top topbar">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="sidebar-toggle navbar-brand">
							<nav title="Menu completo" class="navbar navbar-fixed-left navbar-minimal animate">
								<div class="navbar-toggler animate">
									<span class="menu-icon"></span>
								</div>
							</nav>
						</a>
						<span class="form-inline">
							<span style="color:#ffffff;margin-left:25px;"><b>Chamado</b></span>
						</span>

						<!-- MENU EM TELA MOBILE -->
							<a id="menu-toggle">
								<button class="navbar-btn visible-xs" id="btn-user" title="<?= usuarioLogin() ?>" data-toggle="dropdown">
									<img src="recursos/img/usuario.jpg" id="icon-user">
									<span id="ic" class="fa fa-caret-down"></span>
								</button>
							</a>
							<div id="msidebar-wrapper">
								<ul class="msidebar-nav">
									<a id="menu-close" href="#" class="btn btn-danger pull-right toggle" title="Fechar"><i class="fa fa-remove"></i></a>
									<li class="sidebar-brand">
										<img src="recursos/img/usuario.jpg" id="icon-user">
										<span id="mlogin-view"><b><?= usuarioLogin() ?></b></span>
									</li>
									<li><a href="alterar_senha"><i class="fa fa-pencil"></i> Alterar senha</a></li>
									<li><a href="#"><i class="fa fa-cog"></i> Administrador</a></li>
									<li><a href="contato"><i class="fa fa-envelope-o"></i> Contato</a></li>
									<li><a href="sobre"><i class="fa fa-code-fork"></i> Sobre</a></li>
									<hr>
									<li><a href="../../controller/chamado/logout.php" title="Logout" id="sair" style="color:red;"><i class="fa fa-power-off"></i> Sair</a></li>
								</ul>
							</div>
						</div>
					<!-- /MENU EM TELA MOBILE -->
					
					<!-- MENU EM TELA CHEIA -->
						<div class="navbar-collapse collapse" id="navbar-collapse-main">
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<button disabled class="navbar-btn" id="btn-user" data-toggle="dropdown">
										<img src="recursos/img/usuario.jpg" id="icon-user">
										<a id="login-view"><b><?= usuarioLogin() ?></b></a>
										<span id="ic" class="fa fa-caret-down"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="alterar_senha"><i class="fa fa-pencil"></i> Alterar senha</a></li>
										<li><a href="#"><i class="fa fa-cog"></i> Administrador</a></li>
										<li><a href="contato"><i class="fa fa-envelope-o"></i> Contato</a></li>
										<li><a href="sobre"><i class="fa fa-code-fork"></i> Sobre</a></li>
										<li class="nav-divider">
										<li><a href="../../controller/chamado/logout.php" title="Logout" id="sair" style="color:red;"><i class="fa fa-power-off"></i> Sair</a></li>
									</ul>
								</li>
							</ul>
						</div>
					<!-- /MENU EM TELA CHEIA -->
				</div>
			</nav>
		<!-- /BARRA -->