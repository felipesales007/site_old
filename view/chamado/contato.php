<?php
    error_reporting(E_ALL ^ E_NOTICE);
    require_once("banco/logica-usuario.php");
?>

<html>
    <head>
        <title>Chamado | Contato</title>
        <?php require_once("cabecalho.php");?>
    </head>
    <body id="corpo-contato">
        <?php include_once("../../controller/curriculo/analyticstracking.php") ?>
        <!-- Nav lateral -->
            <article class="wrapper">
                <aside class="sidebar">
                    <ul class="sidebar-nav">
                        <hr>
                        <li><a href="formulario-novo" title="Novo"><i class="fa fa-user-plus fa-2x"><span id="menu-lateral"><b> Novo</b></span></i></a></li>
                        <hr>
                        <li><a href="lista-pendentes" title="Lista"><i class="fa fa-list-alt fa-2x"><span id="menu-lateral"><b> Lista</b></span></i></a></li>
                        <hr>
                        <li class="active"><a title="Contato"><i class="fa fa-envelope fa-2x"><span id="menu-lateral"><b> Contato</b></span></i></a></li>
                        <hr>
                    </ul>
                </aside>
		<!-- /Nav lateral -->
                   
        <!-- Mensagem -->
            <section id="contact">
                <div class="section-content">
                    <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s">Contate-nos</span>
                    <h3>Sinta-se livre para nos contatar</h3>
                </div>
                <div class="contact-section">
                    <div class="container">
                        <form id="msn" action="email/envia-email.php" method="POST">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="msn-text" class="msn-n" for="m-nome"> Seu nome</label>
                                    <input required tabindex="1" type="text" class="form-control" id="m-nome" name="nome" placeholder="Digite seu nome...">
                                </div>
                                <div class="form-group">
                                    <label id="msn-text" for="m-email"> Seu e-mail</label>
                                    <input required tabindex="2" type="email" class="form-control" id="m-email" name="email" placeholder="Digite seu e-mail...">
                                </div>	
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="msn-text" for ="m-mensagem"> Mensagem</label>
                                    <textarea required tabindex="3" class="form-control" id="m-mensagem" name="mensagem" placeholder="Digite sua mensagem..." style="resize:none;"></textarea>
                                </div>
                                <div>
                                    <button id="enter" class="btn btn-info submit" type="submit" tabindex="4"><span class="fa fa-paper-plane"></span> Enviar mensagem</button>
                                    <br><br><br>
                                </div>
                            </div>
                        </form>
                    </div>
            </section>
        <!-- /Mensagem -->
        </article>
        <?php include("javascript.php");?>
    </body>
</html>