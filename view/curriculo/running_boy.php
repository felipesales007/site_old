<html>
<head>
	<title>Running Boy | Felipe</title>
	<link rel="stylesheet" href="recursos/css/default/w3.css">
	<?php require_once("cabecalho.php"); ?>
</head>
<body class="landing-page" id="rolagem_lateral">
	<?php include_once("../../controller/curriculo/analyticstracking.php") ?>
	<div class="wrapper">
		<!-- Capa -->
			<div id="running_boy_fundo" class="header header-filter">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<h1 id="intro_dev" class="title wow fadeInRight" data-wow-duration="1s" data-wow-delay=".0s">Busque o maior número de uvas nesse fantástico e desafiador jogo.</h1>
							<h5 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".2s">Correndo, pulando, e se esquivando dos obstáculos alcance o maior número de uvas nesse jogo onde qualquer distração será fim de jogo.
								<br>
								Cactos, flechas e buracos não devem lhe parar.
								<br><br>
							</h5>
							<a href="https://www.youtube.com/watch?v=PGdCUBkFMzg" target="_blank" class="btn btn-danger btn-raised btn-lg wow fadeInRight" data-wow-duration="1s" data-wow-delay=".5s">
								<i class="fa fa-youtube-play"></i>&ensp;Video
							</a>
							<a href="https://play.google.com/store/apps/details?id=com.felipesales007&hl=pt-BR" target="_blank" class="btn btn-info btn-raised btn-lg wow fadeInRight" data-wow-duration="1s" data-wow-delay=".8s">
								<i class="fa fa-android"></i>&ensp;Download
							</a>
						</div>
					</div>
					<!-- Animação do mouse com Scroll -->
						<?php include("../../controller/curriculo/navegador.php"); ?>
					<!-- Animação do mouse com Scroll -->		
				</div>
			</div>
		<!-- /Capa -->
		
		<!-- Imagens -->
			<div class="main main-raised">
				<div class="container">
					<div class="section text-center section-landing">
						<!-- Descrição -->
							<h3 class="title wow fadeInUp" data-wow-duration="1s" data-wow-delay=".0s">RUNNING BOY</h3>
							<h5 class="description wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">SOBRE</h5>
							<div class="col-md-6 col-md-offset-3 description">
								<h4 class="text-justify wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".0s">Jogo desenvolvido para por em prática conhecimentos adquiridos por meios de estudos, estudos esse que foram divulgado 
									e apresentado na Universidade Salvador, para os alunos de Sistemas de Informação e Ciência da Computação na aula de Desenvolvimento Android.</h4>
								<br>
								<div class="col-md-9 col-md-offset-10 text-right wow fadeInRight" data-wow-duration="1s" data-wow-delay=".0s">
									<a href="https://github.com/felipesales007/running_boy" target="_blank" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Visualizar no GitHub">
										<i class="fa fa-code-fork fa-2x"></i> <i class="fa fa-git fa-2x"></i>
									</a>
									<span class="label label-success">Pronto</span><br><br>
								</div>
								<div class="col-md-9 col-md-offset-10 text-right wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
									<p class="description">Aprenda a desenvolver seu próprio jogo.</p>
									<p class="description">Faça o <a href="recursos/arquivo/Desenvolvendo_Jogos.rar" target="_blank">download</a> da apresentação.</p>
								</div>
							</div>
						<!-- /Descrição -->

						<!-- Android -->
							<button id="titulo_foto" class="disabled btn btn-default btn-round">
								<i class="material-icons">android</i>&ensp;Android
							</button>
							<br><br>
						
							<div class="w3-third">
								<img id="img_foto" class="card-raised w3-hover-shadow wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s" src="recursos/img/running_boy/1.jpg" onclick="onClick(this)" title="Clique para ampliar">						
								<img id="img_foto" class="card-raised w3-hover-shadow wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s" src="recursos/img/running_boy/2.jpg" onclick="onClick(this)" title="Clique para ampliar">
							</div>
							
							<div class="w3-third">
								<img id="img_foto" class="card-raised w3-hover-shadow wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s" src="recursos/img/running_boy/3.jpg" onclick="onClick(this)" title="Clique para ampliar">								
								<img id="img_foto" class="card-raised w3-hover-shadow wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s" src="recursos/img/running_boy/4.jpg" onclick="onClick(this)" title="Clique para ampliar">
							</div>
								
							<div class="w3-third">
								<img id="img_foto" class="card-raised w3-hover-shadow wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".8s" src="recursos/img/running_boy/5.jpg" onclick="onClick(this)" title="Clique para ampliar">								
								<img id="img_foto" class="card-raised w3-hover-shadow wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".8s" src="recursos/img/running_boy/6.jpg" onclick="onClick(this)" title="Clique para ampliar">								
							</div>
						<!-- /Android -->

						<!-- Vídeo -->
							<button id="titulo_foto" class="disabled btn btn-default btn-round">
								<i class="fa fa-youtube-play"></i>&ensp;Vídeo
							</button>
							<br><br>					
							<iframe id="running_boy_video" class="card-raised wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s" width="853" height="480" src="https://www.youtube.com/embed/PGdCUBkFMzg?rel=0" frameborder="0" allowfullscreen></iframe>
						<!-- /Vídeo -->

						<!-- Clique para zoom -->
							<div id="escurecer" class="w3-modal w3-black-transparent" onclick="this.style.display='none'">
								<br>
								<span id="fechar_foto" class="w3-closebtn w3-text-red w3-opacity w3-hover-opacity-off w3-xxlarge w3-container w3-display-topright hidden-xs" title="Fechar"><i class="fa fa-remove"></i></span>
								<div class="w3-modal-content w3-animate-zoom w3-center w3-transparent">
									<img id="imagem" class="w3-image">
									<p id="zoom" class="w3-opacity w3-large"></p>
								</div>
								<div class="visible-xs">
									<span id="fechar_foto" class="w3-closebtn w3-text-red w3-opacity w3-hover-opacity-off w3-xxlarge w3-container w3-display-topright" title="Fechar"><i class="fa fa-remove"></i></span>
								</div>
							</div>
						<!-- /Clique para zoom -->
					</div>
				</div>
			</div>
		<!-- /Imagens -->

		<!-- Voltar fixo -->
			<a id="voltar" class="btn btn-primary btn-fab btn-round" href="perfil#desenvolvimento">
				<i class="material-icons">reply</i>
				<h6 id="voltar_tamanho">Voltar</h6>
			</a>
		<!-- /Voltar fixo -->
		</div>
	</div>
	<?php include("rodape.php"); ?>
</body>
</html>