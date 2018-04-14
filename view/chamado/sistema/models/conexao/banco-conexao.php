<?php
	// Mensagens de alerta de erro no banco
	// error_reporting(E_ALL ^ E_NOTICE);
	// error_reporting(E_ALL);
	error_reporting(0);
	
	// Conexão com o banco de dados para testes
	// $conexao = mysqli_connect("localhost", "root", "");

	// Conexão com o banco de dados em produção
	$conexao = new mysqli("mysql552.umbler.com", "chamado", "terraazul");

	// Transforma os textos em utf8
	mysqli_set_charset($conexao, "utf8");

	// Verifica e mostra na tela o estado de conexão com servidor
	// include_once("banco-status.php");

	// Criação e conexão com o banco de dados
	include_once("banco-create.php");
?>