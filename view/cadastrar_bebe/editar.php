<html>
	<head>
		<title>Editar | Bebê</title>
        <meta charset="UTF-8">
		<meta http-equiv="Content-Language" content="pt-br">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="theme-color" content="#FF0000">
		<link href="https://s-media-cache-ak0.pinimg.com/originals/ba/b2/e4/bab2e43d04f43d98fcc8760ab73a92d4.png" rel="icon" type="image/png">
		<!-- Bootstrap CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<!-- Icones CSS -->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <style>
        #img-top { width: 175px; margin-top: -35px; }
        .main{ margin: 50px 15px; }
        span.input-group-addon i { color: #009edf; font-size: 17px; }
        textarea{ resize:none; }
        body, html {
            height: 100%;
            padding-top: 12px;
            background: #DDDDDD;
            font-family: 'Oxygen', sans-serif;
        }
        .main-center {
            margin: 0 auto;
            max-width: 400px;
            padding: 10px 40px;
            background :#009edf;
            color: #FFF;
            text-shadow: none;
            -webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
            -moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
            box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
        }
    </style>
    <?php
		// não exibe mensagem de alerta
		error_reporting(1);
		
		// se conecta ao DB
        $conexao = new mysqli("localhost", "root", "", "20171_php");
        // $conexao = new mysqli("mysql552.umbler.com", "felipesales", "terraazul", "felipesales");
		
		// Obtem ID via GET
		$id = $_GET["id"];
		
		// cria comando SQL
		$sql = "SELECT * FROM maternidade WHERE id = $id";
		
		// erro de conexão/
		if ($conexao -> connect_error == true) {
			$msg_erro = $conexao -> connect_error;
			
			echo "Erro de conexão: $msg_erro";
			exit;
		}
		
		// executa no banco de dados
		$retorno = $conexao -> query($sql);
		
		// Deu erro
		if($retorno == false) {
			echo $conexao -> error;
		}
		
		// obtem registro do BD
		$registro = $retorno -> fetch_array();
		
		// obtem as variaveis do formulario
        $quarto 		= $registro["quarto"];
        $nome_bebe 	    = $registro["nome_bebe"];
        $nome_mae 		= $registro["nome_mae"];
        $peso 	        = $registro["peso"];
        $altura 		= $registro["altura"];
        $data_nascimento = $registro["data_nascimento"];
        $sexo 		    = $registro["sexo"];
        $detalhes_parto = $registro["detalhes_parto"];
		
		if ($_POST != null) {
			
		// obtem as variaveis do formulario
		$quarto 		= $_POST["quarto"];
        $nome_bebe 	    = $_POST["nome_bebe"];
        $nome_mae 		= $_POST["nome_mae"];
        $peso 	        = $_POST["peso"];
        $altura 		= $_POST["altura"];
        $data_nascimento = $_POST["data_nascimento"];
        $sexo 		    = $_POST["sexo"];
        $detalhes_parto = $_POST["detalhes_parto"];
			
			// cria comando SQL
		$sql = "UPDATE maternidade SET quarto='$quarto', nome_bebe='$nome_bebe', nome_mae='$nome_mae', peso='$peso', altura='$altura', data_nascimento='$data_nascimento', sexo='$sexo', detalhes_parto='$detalhes_parto' WHERE id='$id'";

		// executa no banco de dados
		$retorno = $conexao -> query($sql);
		
		// executou
		if($retorno == true) {
			echo "<script>
					alert('Bebê atualizado com sucesso!');
					location.href='listar';
				</script>";
		// deu erro...
		} else {
			echo "<script>
					alert('Erro ao Atualizar bebê!');
				</script>";
			// exibe mensagem de erro do DB
			echo $conexao -> error;
			}
		}
	?>
	<body>
        <?php include_once("../../controller/curriculo/analyticstracking.php") ?>
        <!-- Navbar -->
            <div class="navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand hidden-xs"><img class="img-responsive logo" id="img-top" src="https://s-media-cache-ak0.pinimg.com/originals/ba/b2/e4/bab2e43d04f43d98fcc8760ab73a92d4.png"></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li title="Voltar para lista"><a href="cadastrar"><i class="fa fa-plus" aria-hidden="true"></i> Cadastrar Bebê</a></li>
                        <li title="Voltar para lista"><a href="listar"><i class="fa fa-list-alt" aria-hidden="true"></i> Listar Bebês</a></li>
                        <li class="active"><a><i class="fa fa-pencil" aria-hidden="true"></i> Editar Bebês</a></li>
                    </ul>
                </div>
            </div>
        <!-- /Navbar -->

        <!-- Formulário -->
            <div class="container">
                <div class="row main">
                    <div class="main-login main-center">
                        <h2><center>Editar Bebê</center></h2>
                        <form method="POST">

                            <div class="form-group">
                                <label for="quarto" class="cols-sm-2 control-label">Quarto</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                                        <input required type="number" class="form-control" name="quarto" id="quarto" value="<?php echo $quarto; ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nome_bebe" class="cols-sm-2 control-label">Nome do Bebê</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input required type="text" class="form-control" name="nome_bebe" id="nome_bebe"  value="<?php echo $nome_bebe; ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nome_mae" class="cols-sm-2 control-label">Nome da Mãe</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input required type="text" class="form-control" name="nome_mae" id="nome_mae" value="<?php echo $nome_mae; ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="peso" class="cols-sm-2 control-label">Peso</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                                        <input required type="number" class="form-control" name="peso" id="peso" value="<?php echo $peso; ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="altura" class="cols-sm-2 control-label">Altura</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                                        <input required type="number" class="form-control" name="altura" id="altura" value="<?php echo $altura; ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="data_nascimento" class="cols-sm-2 control-label">Data de Nascimento</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar fa-lg" aria-hidden="true"></i></span>
                                        <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nascimento; ?>"/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="sexo" class="cols-sm-2 control-label">Sexo</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-star-o fa" aria-hidden="true"></i></span>
                                        <select required name="sexo" id="sexo" class="form-control">
                                            <option <?php if ($sexo == "Masculino") echo "selected"; ?> value="Masculino">Masculino</option>";
                                            <option <?php if ($sexo == "Feminino") echo "selected"; ?> value="Feminino">Feminino</option>";
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="detalhes_parto" class="cols-sm-2 control-label">Detalhes do Parto</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-exclamation-triangle fa-lg" aria-hidden="true"></i></span>
                                        <textarea rows="4" cols="4" class="form-control" name="detalhes_parto" id="detalhes_parto"><?php echo $detalhes_parto; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary btn-lg btn-block login-button" onclick="return confirm('Deseja realmente alterar o bebê?');" id="button" type='submit' name='enviar' value='Alterar'>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        <!-- /Formulário -->
	</body>
</html>