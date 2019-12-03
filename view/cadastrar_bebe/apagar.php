<?php
	// não exibe mensagem de alerta
	error_reporting(1);
	
	// se conecta ao DB
	$conexao = new mysqli("localhost", "root", "", "20171_php");
	// $conexao = new mysqli("mysql552.umbler.com", "felipesales", "terraazul", "felipesales");
	
	// Obtem ID via GET
	$id = $_GET["id"];
	
	// cria comando SQL
	$sql = "DELETE FROM maternidade WHERE id = $id";
	
	// erro de conexão/
	if ($conexao -> connect_error == true) {
		$msg_erro = $conexao -> connect_error;
		
		echo "Erro de conexão: $msg_erro";
		exit;
	}
	
	// executa no banco de dados
	$retorno = $conexao -> query($sql);
	
	// executou
	if($retorno == true) {
		echo "<script>
				alert('Bebê deletado com sucesso!');
				location.href='listar';
			</script>";
	// deu erro...
	} else {
		echo "<script>
				alert('Erro ao deletar bebê!');
			</script>";
		// exibe mensagem de erro do DB
		echo $conexao -> error;
	}	
?>