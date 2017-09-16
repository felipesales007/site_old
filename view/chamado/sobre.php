<?php
    error_reporting(E_ALL ^ E_NOTICE);
    require_once("banco/logica-usuario.php");
?>

<html>
    <head>
        <title>Chamado | Sobre</title>
        <?php require_once("cabecalho.php");?>
    </head>
    <body>
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
                        <li class="active"><a title="Sobre"><i class="fa fa-code-fork fa-2x"><span id="menu-lateral"><b> Sobre</b></span></i></a></li>
                        <hr>
                    </ul>
                </aside>
		<!-- /Nav lateral -->

        <!-- Item versões -->
            <div class="container" id="ver">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-warning">
                            <div class="panel-heading c-list">
                                <span class="title">Versões</span>
                            </div>
                            <ul class="list-group" id="contact-list">
                                <li class="list-group-item">
                                    <div class="col-xs-12 col-sm-3">
                                        <center><img src="https://confluence.atlassian.com/download/thumbnails/800705866/Software-Git.png?version=1&modificationDate=1488430323135&api=v2" alt="Versões" id="iver" /></center>
                                        <br>
                                    </div>
                                
                                    <div class="col-xs-12 col-sm-9 scroll-ver"  id="text-ver">
                                        <?php include("banco/versoes.php");?>
                                    </div>
                                <div class="clearfix"></div>
                            </ul>
                        </div>
                    </div>
                </div>                
            </div>
        <!-- /Item versões -->

        <!-- Item desenvolvedor -->
            <div class="container" id="user">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading c-list">
                                <span class="title">Desenvolvedor</span>
                            </div>               
                            <ul class="list-group" id="contact-list">
                                <li class="list-group-item">
                                    <div class="col-xs-12 col-sm-3" id="bar-user">
                                        <center><img src="https://pbs.twimg.com/profile_images/831319878887997442/kvGunEz4_200x200.jpg" alt="Felipe Sales" width="125px" class="img-responsive img-circle" /></center>
                                    </div>
                                    <!-- Tela cheia -->
                                        <div class="col-xs-12 col-sm-9 hidden-xs">
                                            <span class="name">Felipe Sales</span><br>
                                            
                                            <i class="fa fa-map-marker text-muted c-info" data-mensager="tooltip" title="Salvador-BA"><span class="visible-xs"><i class="text-muted">&nbsp Salvador-BA</i><br></span></i>

                                            <i class="fa fa-whatsapp text-muted c-info" data-mensager="tooltip" title="(71) 9 9140-2371"><span class="visible-xs"><i class="text-muted">&nbsp (71) 9 9140-2371</i><br></span></i>

                                            <i class="fa fa-envelope-o text-muted c-info" data-mensager="tooltip" title="felipesales007@hotmail.com"><span class="visible-xs"><i class="text-muted">&nbsp felipesales007@hotmail.com</i><br></span></i>

                                            <i class="fa fa-skype text-muted c-info" data-mensager="tooltip" title="felipesales007@hotmail.com"><span class="visible-xs"><i class="text-muted">&nbsp felipesales007@hotmail.com</i><br></span></i>

                                            <a href="https://www.linkedin.com/in/felipesales007/" target="_blank"><i class="fa fa-linkedin-square text-muted c-info" data-mensager="tooltip" title="LinkedInd"><span class="visible-xs"><i class="text-muted">&nbsp LinkedIn</i><br></span></i></a>
                                        </div>
                                    <!-- /Tela cheia -->
                                    
                                    <!-- Tela mobile -->
                                        <div class="col-xs-12 col-sm-9 visible-xs">
                                            <span class="name">Felipe Sales</span><br>
                                            
                                            <i class="fa fa-map-marker text-muted c-info"><span class="visible-xs"><i class="text-muted">&nbsp Salvador-BA</i><br></span></i>

                                            <i class="fa fa-whatsapp text-muted c-info"><span class="visible-xs"><i class="text-muted">&nbsp (71) 9 9140-2371</i><br></span></i>

                                            <i class="fa fa-envelope-o text-muted c-info"><span class="visible-xs"><i class="text-muted">&nbsp felipesales007@hotmail.com</i><br></span></i>

                                            <i class="fa fa-skype text-muted c-info"><span class="visible-xs"><i class="text-muted">&nbsp felipesales007@hotmail.com</i><br></span></i>

                                            <a href="https://www.linkedin.com/in/felipesales007/" target="_blank"><i class="fa fa-linkedin-square text-muted c-info"><span class="visible-xs"><i class="text-muted">&nbsp LinkedIn</i><br></span></i></a>
                                        </div>
                                    <!-- /Tela mobile -->
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>                
            </div>
        <!-- /Item desenvolvedor -->
        </article>
        <?php include("javascript.php");?>
    </body>
</html>