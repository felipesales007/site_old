<html>
	<head>
		<?php require_once("../controller/head.php"); ?>
		<title>Portal do Estudante</title>
	</head>
	<body class="signup-page">
		<div class="wrapper">
			<div class="header header-filter" style="background-image: url('assets/img/login_background.jpg'); background-size: cover; background-position: top center;">
				<!-- Login -->
					<main class="container">
						<center>
							<img src="assets/img/viva.png" class="card wow fadeInDown" data-wow-duration="1s" data-wow-delay=".3s" style="width: 290px;">
						</center>
						<div class="row wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
							<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
								<div class="card card-signup">
									<form class="form" method="POST" action="login.php" onsubmit="return login_valida(this)">
										<div class="header header-primary text-center">
											<a href="login.php"><img src="assets/img/portal_estudante.png" width="250"></a>
										</div>
										<p class="text-divider">Acesso para o sistema</p>
										<div class="content">
											<i id="i" class="pull-right material-icons wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".6s" data-toggle="tooltip" data-placement="top" title="Pode ser encontrado no verso do seu Cartão de Estudante fornecido pela UNIFACS.">error_outline</i>
											<div class="input-group wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".6s">
												<span class="input-group-addon">
													<i class="material-icons">face</i>
												</span>
												<input required class="form-control" type="number" name="login_nome" tabindex="1" placeholder="Matrícula">												
											</div>
										</div>
										<div class="footer text-center wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".9s">
											<button id="enter" class="btn btn-simple btn-primary btn-lg" type="submit" tabindex="2"><i id="carregando"></i>Recuperar</button>
                                            <a href="login.php" class="btn btn-simple btn-primary btn-lg" tabindex="3"><i id="carregando"></i>Voltar</a>
										</div>
                                        <p class="text-divider">Este recurso só esta disponível para os alunos que cadastraram algum e-mail alternativo.</p>
                                    </form>
								</div>
							</div>
						</div>
					</main>
				<!-- /Login -->

				<!-- Rodapé -->
					<footer class="footer">
						<div class="container">
							<nav id="login_itens" class="pull-left">
								<ul>
									<li class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".6s">
										<a href="http://www.unifacs.br/" target="_blank">
										Site UNIFACS
										</a>
									</li>
									<li class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".9s">
										<a href="https://unifacs.blackboard.com/" target="_blank">
										BlackBoard
										</a>
									</li>
									<li class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="1.2s">
										<a id="dedo" data-toggle="modal" data-target="#sobre">
										Contato
										</a>
									</li>
								</ul>
							</nav>
							<div class="copyright pull-right wow fadeInRight" data-wow-duration="1s" data-wow-delay=".6s">
								&copy; 2017, desenvolvido por <a id="login_nome" href="https://www.felipesales.com.br" target="_blank"  data-toggle="tooltip" data-placement="top" title="Portfólio">Felipe Sales</a>
							</div>
						</div>
					</footer>
				<!-- /Rodapé -->
			</div>
		</div>

		<!-- Tela de sobre -->
			<div class="modal fade wow fadeInDown" data-wow-duration="1s" data-wow-delay=".0s" id="sobre">
				<div class="modal-dialog">
					<div class="col-md-8 col-md-offset-2">
						<div class="carta-rodape">
							<div id="dedo" class="pull-right">
								<center>
									<span id="login_sobre_fechar" data-dismiss="modal" aria-hidden="true" class="label label-danger">&times;</span>
								</center>
							</div>
						</div>
						<div class="card">   
							<img id="login_sobre_img" src="assets/img/login_contato_background.jpg">
							<div class="content">
								<h6 class="category">Contato</h6>
								<h4 class="title">Central de Atendimento ao Estudante</h4>
								<p class="description">Salvador (71) 3021-2800</p>
								<p class="description">Feira de Santana (75) 4009-9199</p>
								<p class="description">Demais Localidades 0800 284 0212</p>
								<br>
								<p class="description pull-left">Conheça a UNIFACS<a id="login_link_youtube" href="https://www.youtube.com/watch?v=rel2FqNtQNI" target="_blank">&ensp;<i class="fa fa-youtube-play"></i> YouTube</a></p>
								<p class="description pull-right">Versão 1.0</p>
							</div>  
						</div>
					</div>
				</div>
			</div>
		<!-- /Tela de sobre -->
	</body>
</html>