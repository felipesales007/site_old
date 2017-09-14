<?php include("../../controller/dev/importacao.php"); ?>
</head>
<style>
	body {
		background-image: url(recursos/img/fundo.jpg);
		background-repeat: no-repeat;
		background-repeat: repeat-y;
		background-repeat: repeat-x;
		background-attachment:fixed;
		margin-top: 0px;
	}
</style>
<body>
	<!-- BARRA -->
		<nav class="navbar navbar-fixed-top">
			<span class="barra-logo">
				<img id="barra-img" src="recursos/img/icone.png">&nbsp;&nbsp;<span id="barra-titulo"> DEV</span>
			</span>
			
			<!-- MENU TELA CHEIA -->
				<div class="navbar-collapse collapse">
					<ul class="navbar-right">
						<li><a id="menu" href="">Sobre</a></li>
					</ul>
					<ul class="navbar-right">
						<li><a id="menu" href="">Contato</a></li>
					</ul>
					<ul class="navbar-right">
						<li>
							<a id="menu">
								<label for="clique-dropdown" id="clique-texto-cursos-dropdown" class="cursos-cor-padrao" style="background-color: transparent !important;">
									Cursos <i class="fa fa-caret-down"></i>
								</label>
							</a>
						</li>
					</ul>
					<ul class="navbar-right">
						<li><a id="menu" href="">Home</a></li>
					</ul>
				</div>
			<!-- /MENU TELA CHEIA -->
					
			<!-- MENU EM TELA MOBILE -->
				<!-- BOTÃO -->
					<a id="menu-mobile">
						<nav class="barra-mobile visible-xs">
							<div class="barra-botao">
								<span></span>
							</div>
						</nav>
					</a>
				<!-- /BOTÃO -->

				<!-- LISTA DO MENU EM TELA MOBILE -->
					<div id="menu-mobile-itens" class="visible-xs">
						<b>
							<ul class="menu-mobile-lista">
								<li><a href="">Home</a></li>
								<li class="botao-menu-selecao">
									<a class="menu-selecao cursos-cor-padrao" id="clique-texto-cursos-dropdown">Cursos <i class="fa fa-caret-down"></i></a>
									<ul id="menu-selecao-itens">
										<li><a href="">Linguagem C</a></li>
										<li><a href="">Java</a></li>
										<li><a href="">HTML</a></li>
										<li><a href="">CSS</a></li>
									</ul>
								</li>
								<li><a href="">Contato</a></li>
								<li><a href="">Sobre</a></li>
							</ul>
						</b>
					</div>
				<!-- /LISTA DO MENU EM TELA MOBILE -->
			<!-- /MENU EM TELA MOBILE -->
		</nav>
	<!-- /BARRA -->

	<!-- OPÇÕES DO MENU CURSOS -->
		<div class="navbar-right corpo-dropdown hidden-xs">
			<input id="clique-dropdown" type="checkbox" checked>
			<div class="menu-dropdown">
				<center>
					<div class="seta"></div>
						<a href="">Linguagem C</a>
						<a href="">Java</a>
						<a href="">HTML</a>
						<a href="">CSS</a>
					</div>
				</center>
			</div>
		</div>
	<!-- /OPÇÕES DO MENU CURSOS -->