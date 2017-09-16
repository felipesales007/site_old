<html>
    <head>
        <title>Mundo DEV</title>
        <?php require_once("cabecalho.php");?>
    </head>
    <body>
        <?php include_once("../../controller/curriculo/analyticstracking.php") ?>
        
        <!-- VIDEO TOPO -->
            <div class="index-video">
                <video autoplay="autoplay" loop="loop" muted="muted">
                    <source src="recursos/video/home.mp4" type="video/mp4">
                </video> 
                <div class="index-video-corpo">
                    <div class="carousel-caption">
                        <div class="index-texto-animacao">
                            <img id="img-luz" class="hidden-xs" src="recursos/img/luz.png">
                            <h1 class="hidden-xs">Traga suas ideias para a realidade</h1>
                            <p class="hidden-xs">Transformando ideias em objetivos bem-sucedidos</p>
                            <a href="#" class="btn btn-info hidden-xs">Saiba mais</a>
                        </div>
                    </div>
                </div>  
            </div>
        <!-- /VIDEO TOPO -->
        
        <!-- CORPO -->
            <div class="index-corpo">
                <!-- TEXTO -->
                    <h1 class="titulo-cartas">
                        Conheça alguns cursos
                    </h1>
                    <h1 class="sub-titulo-cartas">
                        E seja capaz de por suas ideias no mundo
                    </h1>
                <!-- /TEXTO -->

                <!-- MOUSE ANIMADO -->
                    <div class="mouse-corpo hidden">
                        <div class="mouse">
                            <div class="bolinha">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 54.9 91" style="enable-background:new 0 0 54.9 91;" xml:space="preserve">
                                    <path linejoin="round" stroke-linecap="round" stroke-miterlimit="10" d="M27.4,3.6L27.4,3.6C14.2,3.6,3.5,14.3,3.5,27.5v36c0,13.2,10.7,23.9,23.9,23.9h0c13.2,0,23.9-10.7,23.9-23.9v-36C51.4,14.3,40.7,3.6,27.4,3.6z"/>
                                </svg>
                            </div>
                            <div class="mouse-esquerdo">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 27.4 91" style="enable-background:new 0 0 27.4 91;" xml:space="preserve">
                                    <path linejoin="round" stroke-linecap="round" stroke-miterlimit="10" class="animacao" d="M27.4,87.5L27.4,87.5c-13.2,0-23.9-10.7-23.9-23.9v-36c0-13.2,10.7-23.9,23.9-23.9h0"/>
                                </svg>
                            </div>
                            <div class="mouse-direito">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 27.4 91" style="enable-background:new 0 0 27.4 91;" xml:space="preserve">
                                    <path linejoin="round" stroke-linecap="round" stroke-miterlimit="10" class="animacao" d="M0,3.6L0,3.6c13.2,0,23.9,10.7,23.9,23.9v36c0,13.2-10.7,23.9-23.9,23.9h0"/>
                                </svg>
                            </div>
                        </div>
                        <p id="texto-scroll">Scroll</p>
                    </div>
                <!-- /MOUSE ANIMADO -->

                <!-- CARTAS -->
                    <div class="col-sm-10 col-sm-offset-1">
                        <!-- CARTA C -->    
                            <div class="col-md-4 col-sm-6">
                                <div class="carta-corpo">
                                    <div class="carta">
                                        <div class="carta-frente">
                                            <div class="carta-capa">
                                                <img src="recursos/img/img-c-capa.png"/>
                                            </div>
                                            <div class="carta-user">
                                                <img class="img-circle" src="recursos/img/img-c-user.png"/>
                                            </div>
                                            <div class="carta-texto">
                                                <div class="carta-descricao">
                                                    <h3 class="carta-nome">C</h3>
                                                    <p class="carta-tipo">Desenvolvimento</p>
                                                    <p class="carta-sobre">É uma linguagem de programação mais notavelmente C++, que originalmente começou como uma extensão para C</p>
                                                </div>
                                                <div class="carta-rodape">
                                                    <span class="hidden-xs"><i class="fa fa-mail-forward"></i> Passe o mouse</span>
                                                    <span class="visible-xs"><i class="fa fa-mail-forward"></i> Clique na carta</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carta-fundo">
                                            <div class="carta-fundo-topo">
                                                <h5 class="motto">C</h5>
                                            </div>
                                            <div class="carta-texto">
                                                <div class="carta-descricao">
                                                    <h4 class="carta-sobre">Necessário</h4>
                                                    <p class="carta-sobre">
                                                        <a href="https://sourceforge.net/projects/orwelldevcpp/" target="_blank" title="Ir para página de download">DEV C++</a>
                                                    </p>
                                                    <div class="carta-fundo-aulas">
                                                        <div class="carta-fundo-aula-link">
                                                            <h4>Curso</h4>
                                                            <a href="" title="Ir para página do curso">
                                                                <p id="nivel_curso">Básico</p>
                                                            </a>
                                                        </div>
                                                        <div class="carta-fundo-aula-link">
                                                            <h4>Curso</h4>
                                                            <a href="" title="Ir para página do curso">
                                                                <p id="nivel_curso">Médio</p>
                                                            </a>
                                                        </div>
                                                        <div class="carta-fundo-aula-link">
                                                            <h4>Curso</h4>
                                                            <a href="" title="Ir para página do curso">
                                                                <p id="nivel_curso">Avançado</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carta-rodape">
                                                <div class="social-links carta-sobre">
                                                    <a href="http://www.youtube.com.br" target="_blank" title="YouTube"><i class="fa fa-youtube"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /CARTA C -->

                        <!-- CARTA JAVA -->    
                            <div class="col-md-4 col-sm-6">
                                <div class="carta-corpo">
                                    <div class="carta">
                                        <div class="carta-frente">
                                            <div class="carta-capa">
                                                <img src="recursos/img/img-java-capa.jpg"/>
                                            </div>
                                            <div class="carta-user">
                                                <img class="img-circle" src="recursos/img/img-java-user.png"/>
                                            </div>
                                            <div class="carta-texto">
                                                <div class="carta-descricao">
                                                    <h3 class="carta-nome">Java</h3>
                                                    <p class="carta-tipo">Desenvolvimento</p>
                                                    <p class="carta-sobre">É uma linguagem de programação orientada a objetos e compilada por uma máquina virtual</p>
                                                </div>
                                                <div class="carta-rodape">
                                                    <span class="hidden-xs"><i class="fa fa-mail-forward"></i> Passe o mouse</span>
                                                    <span class="visible-xs"><i class="fa fa-mail-forward"></i> Clique na carta</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carta-fundo">
                                            <div class="carta-fundo-topo">
                                                <h5 class="motto">Java</h5>
                                            </div>
                                            <div class="carta-texto">
                                                <div class="carta-descricao">
                                                    <h4 class="carta-sobre">Necessário</h4>
                                                    <p class="carta-sobre">
                                                        <a href="https://netbeans.org/downloads/" target="_blank" title="Ir para página de download">NetBeans</a> ou 
                                                        <a href="http://www.eclipse.org/downloads/eclipse-packages/" target="_blank" title="Ir para página de download">Eclipse</a> e 
                                                        <a href="http://www.oracle.com/technetwork/java/javase/downloads/jdk8-downloads-2133151.html?ssSourceSiteId=otnpt" target="_blank" title="Ir para página de download">JDK</a>
                                                    </p>
                                                    <div class="carta-fundo-aulas">
                                                        <div class="carta-fundo-aula-link">
                                                            <h4>Curso</h4>
                                                            <a href="" title="Ir para página do curso">
                                                                <p id="nivel_curso">Básico</p>
                                                            </a>
                                                        </div>
                                                        <div class="carta-fundo-aula-link">
                                                            <h4>Curso</h4>
                                                            <a href="" title="Ir para página do curso">
                                                                <p id="nivel_curso">Médio</p>
                                                            </a>
                                                        </div>
                                                        <div class="carta-fundo-aula-link">
                                                            <h4>Curso</h4>
                                                            <a href="" title="Ir para página do curso">
                                                                <p id="nivel_curso">Avançado</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carta-rodape">
                                                <div class="social-links carta-sobre">
                                                    <a href="http://www.youtube.com.br" target="_blank" title="YouTube"><i class="fa fa-youtube"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /CARTA JAVA -->

                        <!-- CARTA HTML -->    
                            <div class="col-md-4 col-sm-6">
                                <div class="carta-corpo">
                                    <div class="carta">
                                        <div class="carta-frente">
                                            <div class="carta-capa">
                                                <img src="recursos/img/‎img-html-capa.jpg"/>
                                            </div>
                                            <div class="carta-user">
                                                <img class="img-circle" src="recursos/img/img-html-user.jpg"/>
                                            </div>
                                            <div class="carta-texto">
                                                <div class="carta-descricao">
                                                    <h3 class="carta-nome">HTML</h3>
                                                    <p class="carta-tipo">Desenvolvimento</p>
                                                    <p class="carta-sobre">Linguagem de Marcação de Hipertexto é uma linguagem de marcação utilizada na construção de páginas na Web</p>
                                                </div>
                                                <div class="carta-rodape">
                                                    <span class="hidden-xs"><i class="fa fa-mail-forward"></i> Passe o mouse</span>
                                                    <span class="visible-xs"><i class="fa fa-mail-forward"></i> Clique na carta</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carta-fundo">
                                            <div class="carta-fundo-topo">
                                                <h5 class="motto">HTML</h5>
                                            </div>
                                            <div class="carta-texto">
                                                <div class="carta-descricao">
                                                    <h4 class="carta-sobre">Necessário</h4>
                                                    <p class="carta-sobre">
                                                        <a href="https://code.visualstudio.com/download" target="_blank" title="Ir para página de download">VS Code</a> ou 
                                                        <a href="https://www.sublimetext.com/3" target="_blank" title="Ir para página de download">Sublime Text 3</a> entre outros
                                                    </p>
                                                    <div class="carta-fundo-aulas">
                                                        <div class="carta-fundo-aula-link">
                                                            <h4>Curso</h4>
                                                            <a href="" title="Ir para página do curso">
                                                                <p id="nivel_curso">Básico</p>
                                                            </a>
                                                        </div>
                                                        <div class="carta-fundo-aula-link">
                                                            <h4>Curso</h4>
                                                            <a href="" title="Ir para página do curso">
                                                                <p id="nivel_curso">Médio</p>
                                                            </a>
                                                        </div>
                                                        <div class="carta-fundo-aula-link">
                                                            <h4>Curso</h4>
                                                            <a href="" title="Ir para página do curso">
                                                                <p id="nivel_curso">Avançado</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carta-rodape">
                                                <div class="social-links carta-sobre">
                                                    <a href="http://www.youtube.com.br" target="_blank" title="YouTube"><i class="fa fa-youtube"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /CARTA HTML -->

                        <!-- CARTA CSS -->    
                            <div class="col-md-4 col-sm-6">
                                <div class="carta-corpo">
                                    <div class="carta">
                                        <div class="carta-frente">
                                            <div class="carta-capa">
                                                <img src="recursos/img/img-css-capa.jpg"/>
                                            </div>
                                            <div class="carta-user">
                                                <img class="img-circle" src="recursos/img/img-css-user.jpg"/>
                                            </div>
                                            <div class="carta-texto">
                                                <div class="carta-descricao">
                                                    <h3 class="carta-nome">CSS</h3>
                                                    <p class="carta-tipo">Desenvolvimento</p>
                                                    <p class="carta-sobre">É um simples mecanismo para adicionar estilo (cores, fontes, espaçamento etc) a um documento web</p>
                                                </div>
                                                <div class="carta-rodape">
                                                    <span class="hidden-xs"><i class="fa fa-mail-forward"></i> Passe o mouse</span>
                                                    <span class="visible-xs"><i class="fa fa-mail-forward"></i> Clique na carta</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carta-fundo">
                                            <div class="carta-fundo-topo">
                                                <h5 class="motto">CSS</h5>
                                            </div>
                                            <div class="carta-texto">
                                                <div class="carta-descricao">
                                                    <h4 class="carta-sobre">Necessário</h4>
                                                    <p class="carta-sobre">
                                                        <a href="https://code.visualstudio.com/download" target="_blank" title="Ir para página de download">VS Code</a> ou 
                                                        <a href="https://www.sublimetext.com/3" target="_blank" title="Ir para página de download">Sublime Text 3</a> entre outros
                                                    </p>
                                                    <div class="carta-fundo-aulas">
                                                        <div class="carta-fundo-aula-link">
                                                            <h4>Curso</h4>
                                                            <a href="" title="Ir para página do curso">
                                                                <p id="nivel_curso">Básico</p>
                                                            </a>
                                                        </div>
                                                        <div class="carta-fundo-aula-link">
                                                            <h4>Curso</h4>
                                                            <a href="" title="Ir para página do curso">
                                                                <p id="nivel_curso">Médio</p>
                                                            </a>
                                                        </div>
                                                        <div class="carta-fundo-aula-link">
                                                            <h4>Curso</h4>
                                                            <a href="" title="Ir para página do curso">
                                                                <p id="nivel_curso">Avançado</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carta-rodape">
                                                <div class="social-links carta-sobre">
                                                    <a href="http://www.youtube.com.br" target="_blank" title="YouTube"><i class="fa fa-youtube"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /CARTA CSS -->
                    </div>
                <!-- /CARTAS -->
            </div>
        <!-- /CORPO -->
	    <?php include("../../controller/dev/script.php");?>
	</body>
</html>