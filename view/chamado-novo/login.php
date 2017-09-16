<?php
    error_reporting(E_ALL ^ E_NOTICE);
    require_once("../../controller/chamado/logica_usuario.php");
    require_once("../../controller/chamado/mostra_alerta.php"); 
?>

<html>
    <head>
        <title>Chamado | Login</title>
        <?php include("../../controller/chamado/importacao.php"); ?>
        <link rel="stylesheet" href="recursos/css/index.css">
    </head>
    <body>
        <?php include_once("../../controller/curriculo/analyticstracking.php") ?>
        <div class="login">
            <?php if(usuarioLogado()) { ?>
                <form action="../../controller/chamado/logout.php" method="POST">
                    <br><br><br><br><br><br><br>
                    <center>
                        <button type="submit" class="btn btn-warning btn-circle btn-large btn-lg" title="Logout" data-mensager="tooltip"><span class="fa fa-power-off fa-2x"></span></button>
                    </center>
                </form>
                <br>
                <form action="chamado_novo" method="POST">
                    <button type="submit" class="btn btn-primary btn-block btn-large" title="Novo chamado" data-mensager="tooltip"><span class="glyphicon glyphicon-share-alt"></span> Voltar</button>
                </form>
                <?php } else { ?>
                    <h1>Login</h1>
                    <form action="../../controller/chamado/login.php" method="POST">
                        <input tabindex="1" type="text" name="login" placeholder="Usuário" required="required">
                        <input tabindex="2" type="password" name="senha" placeholder="Senha" required="required">
                        <button tabindex="3" id="enter" type="submit" class="btn btn-primary btn-block btn-large"><i class="fa fa-sign-in"></i> Entrar</button>
                    </form>
                <?php } ?>
            <br>       
        </div>
        <?php include("../../controller/chamado/script.php"); ?>
    </body>
</html>