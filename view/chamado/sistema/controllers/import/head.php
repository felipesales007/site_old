<!-- Definição da linguagem -->
<meta http-equiv="Content-Language" content="pt-br">

<!-- Formato do texto $texto = utf8_decode($_POST['texto']); -->
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<!-- Compatibilidade -->
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<!-- Cor da barra do navegador em celulares -->
<meta name="theme-color" content="#2a3f54">
<meta name="apple-mobile-web-app-status-bar-style" content="#2a3f54">
<meta name="msapplication-navbutton-color" content="#2a3f54">

<!-- Imagem do icone -->
<link rel="icon" href="../../../assets/img/icone.png">
<link rel="apple-touch-icon" href="../../../assets/img/icone.png" sizes="76x76">

<!-- Fontes e icones -->
<link rel="stylesheet" href="../../../assets/fonts/glyphicon/glyphicon.css">
<link rel="stylesheet" href="../../../assets/fonts/material-icons/material-icons.css">
<link rel="stylesheet" href="../../../assets/fonts/fontawesome/css/fontawesome-all.css">
<link rel="stylesheet" href="../../../assets/fonts/font-roboto/roboto.css">

<!-- CSS default -->
<link rel="stylesheet" href="../../../assets/css/default/animate.css">
<link rel="stylesheet" href="../../../assets/css/default/boxfish.css">
<link rel="stylesheet" href="../../../assets/css/default/chamado-card.css">
<link rel="stylesheet" href="../../../assets/css/default/bootstrap.min.css">
<link rel="stylesheet" href="../../../assets/css/default/material-kit.css">
<link rel="stylesheet" href="../../../assets/css/default/geral.css">

<!-- CSS editável -->
<link rel="stylesheet" href="../../../assets/css/login.css">
<link rel="stylesheet" href="../../../assets/css/menu-top.css">
<link rel="stylesheet" href="../../../assets/css/menu-lateral.css">
<link rel="stylesheet" href="../../../assets/css/chamado.css">
<link rel="stylesheet" href="../../../assets/css/lista.css">
<link rel="stylesheet" href="../../../assets/css/dashboard.css">
<link rel="stylesheet" href="../../../assets/css/pdf.css">

<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<!-- Javascript -->
<?php include_once("../../controllers/import/script.php"); ?>

<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/login.php"); ?>
<?php include_once("../../models/chamado.php"); ?>
<?php include_once("../../models/analista.php"); ?>
<?php include_once("../../models/tecnico.php"); ?>
<?php include_once("../../models/historico.php"); ?>
<?php include_once("../../models/perfil.php"); ?>
<?php include_once("../../models/supervisor.php"); ?>
<?php include_once("../../models/administrador.php"); ?>
<?php include_once("../../models/pdf.php"); ?>

<!-- Mostra notificações na tela -->
<?php include_once("../../controllers/import/notificacoes.php"); ?>
<?php notificacao("success"); ?>
<?php notificacao("danger"); ?>
<?php notificacao("warning"); ?>
<?php notificacao("info"); ?>

<!-- Mostra modals na tela -->
<?php include_once("../../views/usuario/modal.php"); ?>
<?php include_once("../../views/tecnico/modal.php"); ?>
<?php include_once("../../views/analista/modal.php"); ?>
<?php include_once("../../views/supervisor/modal.php"); ?>
<?php include_once("../../views/administrador/modal.php"); ?>