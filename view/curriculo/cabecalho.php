<?php require_once("../../controller/curriculo/notificacao.php"); ?>

<html lang="pt">
	<head> 
		<?php include("../../controller/curriculo/importacao.php"); ?>
		<?php include("../../controller/curriculo/script_animate.php"); ?>
	</head>
	<body>
		<!-- Barra -->
			<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
				<div class="container">
					<div class="navbar-header">
						<button type="button" id="btn_menu" class="navbar-toggle btn-lg btn btn-simple" data-toggle="collapse" data-target="#navigation-example">
							<span class="sr-only"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="perfil.php" class="btn btn-simple btn-lg navbar-brand">Felipe Sales</a>
					</div>

					<div class="collapse navbar-collapse" id="navigation-example">
						<ul class="nav navbar-nav navbar-right">
							<li data-toggle="tooltip" data-placement="bottom" title="Visualizar o GitHub">
								<a href="https://github.com/felipesales007" target="_blank" class="btn btn-simple btn-white btn-just-icon">
									<i class="fa fa-github hidden-xs"></i>
									<span class="visible-xs text-left"><i id="git_color" class="fa fa-github"></i> GitHub</span>
								</a>
							</li>
							<li data-toggle="tooltip" data-placement="bottom" title="Visualizar o Facebook">
								<a href="https://www.facebook.com/felipesales007" target="_blank" class="btn btn-simple btn-white btn-just-icon">
									<i class="fa fa-facebook-square hidden-xs"></i>
									<span class="visible-xs text-left"><i id="facebook_color" class="fa fa-facebook-square"></i> Facebook</span>
								</a>
							</li>
							<li data-toggle="tooltip" data-placement="bottom" title="Visualizar o LinkedIn">
								<a href="https://www.linkedin.com/in/felipesales007/" target="_blank" class="btn btn-simple btn-white btn-just-icon">
									<i class="fa fa-linkedin hidden-xs"></i>
									<span class="visible-xs text-left"><i id="linkedin_color" class="fa fa-linkedin"></i> LinkedIn</span>
								</a>
							</li>
							<li data-toggle="tooltip" data-placement="bottom" title="Visualizar o Instagran">
								<a href="https://www.instagram.com/felipesales007/" target="_blank" class="btn btn-simple btn-white btn-just-icon">
									<i class="fa fa-instagram hidden-xs"></i>
									<span class="visible-xs text-left"><i id="instagram_color" class="fa fa-instagram"></i> Instagram</span>
								</a>
							</li>
							<li data-toggle="tooltip" data-placement="bottom" title="Visualizar o YouTube">
								<a href="https://www.youtube.com/user/FelipeSales007/videos" target="_blank" class="btn btn-simple btn-white btn-just-icon">
									<i class="fa fa-youtube-play hidden-xs"></i>
									<span class="visible-xs text-left"><i id="youtube_color" class="fa fa-youtube-play"></i> YouTube</span>
								</a>
							</li>
							<li data-toggle="tooltip" data-placement="bottom" title="Visualizar o WhatsApp">
								<a  data-toggle="modal" data-target="#numero" class="btn btn-simple btn-white btn-just-icon">
									<i class="fa fa-whatsapp hidden-xs"></i>
									<span class="visible-xs text-left"><i id="whatsapp_color" class="fa fa-whatsapp"></i> (71) 9 9140-2371</span>
								</a>
							</li>
							<li data-toggle="tooltip" data-placement="bottom" title="Enviar um e-mail">
								<a data-toggle="modal" data-target="#contato" class="btn btn-simple btn-white btn-just-icon">
									<i class="fa fa-envelope-o hidden-xs"></i>
									<span class="visible-xs text-left"><i id="envelope_color" class="fa fa-envelope-o"></i> Enviar E-mail</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		<!-- /Barra -->

		<?php include("mensagem.php"); ?>