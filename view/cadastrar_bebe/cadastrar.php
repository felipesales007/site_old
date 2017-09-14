<html>
	<head>
		<title>Cadastrar | Bebê</title>
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
	<body>
        <!-- Navbar -->
            <div class="navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand hidden-xs"><img class="img-responsive logo" id="img-top" src="https://s-media-cache-ak0.pinimg.com/originals/ba/b2/e4/bab2e43d04f43d98fcc8760ab73a92d4.png"></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="cadastrar"><i class="fa fa-plus" aria-hidden="true"></i> Cadastrar Bebê</a></li>
                        <li title="Voltar para lista"><a href="listar"><i class="fa fa-list-alt" aria-hidden="true"></i> Listar Bebês</a></li>
                    </ul>
                </div>
            </div>
        <!-- /Navbar -->

        <!-- Formulário -->
            <div class="container">
                <div class="row main">
                    <div class="main-login main-center">
                        <h2><center>Cadastrar Bebê</center></h2>
                        <form method="POST">

                            <div class="form-group">
                                <label for="quarto" class="cols-sm-2 control-label">Quarto</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                                        <input required type="number" class="form-control" name="quarto" id="quarto"  placeholder="Digite o quarto..."/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="nome_bebe" class="cols-sm-2 control-label">Nome do Bebê</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input required type="text" class="form-control" name="nome_bebe" id="nome_bebe"  placeholder="Digite o nome..."/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nome_mae" class="cols-sm-2 control-label">Nome da Mãe</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input required type="text" class="form-control" name="nome_mae" id="nome_mae"  placeholder="Digite o nome..."/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="peso" class="cols-sm-2 control-label">Peso</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                                        <input required type="number" class="form-control" name="peso" id="peso"  placeholder="Digite o peso..."/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="altura" class="cols-sm-2 control-label">Altura</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                                        <input required type="number" class="form-control" name="altura" id="altura"  placeholder="Digite a altura..."/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="data_nascimento" class="cols-sm-2 control-label">Data de Nascimento</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar fa-lg" aria-hidden="true"></i></span>
                                        <input type="date" class="form-control" name="data_nascimento" id="data_nascimento"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sexo" class="cols-sm-2 control-label">Sexo</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-star-o fa" aria-hidden="true"></i></span>
                                        <select required name="sexo" id="sexo" class="form-control">
                                            <option></option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Feminino">Feminino</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="detalhes_parto" class="cols-sm-2 control-label">Detalhes do Parto</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-exclamation-triangle fa-lg" aria-hidden="true"></i></span>
                                        <textarea rows="4" cols="4" class="form-control" name="detalhes_parto" id="detalhes_parto" placeholder="Detalhe do parto..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input class="btn btn-success btn-lg btn-block login-button" id="button" type='submit' name='enviar' value='Salvar'>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        <!-- /Formulário -->
	</body>
    <?php
		// não exibe mensagem de alerta
		error_reporting(1);
		
		// clicou em enviar
		if($_POST != null) {
			
			// obtem as variaveis do formulario
			$quarto 		= $_POST["quarto"];
			$nome_bebe 	    = $_POST["nome_bebe"];
			$nome_mae 		= $_POST["nome_mae"];
			$peso 	        = $_POST["peso"];
			$altura 		= $_POST["altura"];
            $data_nascimento= $_POST["data_nascimento"];
            $sexo 		    = $_POST["sexo"];
            $detalhes_parto = $_POST["detalhes_parto"];
			
			// se conecta ao DB
            // $conexao = new mysqli("localhost", "root", "", "20171_php");
            $conexao = new mysqli("mysql552.umbler.com", "felipesales", "terraazul", "felipesales");
			
			if($conexao -> connect_error == true) {
				$msg_erro = $conexao -> connect_error;
				
				echo "Erro de conexão $msg_erro";
				exit;
			}
			
			// cria comando SQL
			$sql = "INSERT INTO maternidade (quarto, nome_bebe, nome_mae, peso, altura, data_nascimento, sexo, detalhes_parto) VALUES ('$quarto', '$nome_bebe', '$nome_mae', '$peso', '$altura', '$data_nascimento', '$sexo', '$detalhes_parto')";
			
			// executa no banco de dados
			$retorno = $conexao -> query($sql);
			
			// executou
			if($retorno == true) {
				echo "<script>
						alert('Bebê cadastrado com sucesso!');
						location.href='listar';
					</script>";
			// deu erro...
			} else {
				echo "<script>
						alert('Erro ao cadastrar bebê!');
					</script>";
				// exibe mensagem de erro do DB
				echo $conexao -> error;
			}
		}
	?>
</html>