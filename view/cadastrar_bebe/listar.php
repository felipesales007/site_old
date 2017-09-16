<html>
	<head>
		<title>Listar | Bebês</title>
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
        table {
			border-color:black;
			background-color:white;
        }
		.toping {
            margin-top:26px;
			background: #EBEBEB;
			border-collapse: collapse;
			width: 100%;
		}
		th {
			padding-left:7px;
			color:#D5DDE5;
			background:#222222;
			border-right: 1px solid #666B85;
            border-top: 2px solid #666B85;
			font-size:23px;
			font-weight: 100;
			text-align:left;
		}
		tr {
			border-bottom: 1px solid #C1C3D1;
			color:#666B85;
		}
		td {
			border-left: 1px solid #C1C3D1;
			border-right: 1px solid #C1C3D1;
			color:#666B85;
			max-width: 10ch;
			overflow: hidden;
			text-overflow: ellipsis;
			white-space: nowrap;
			padding-left:7px;
		}
		tr:hover td, tr:hover .fa-eye, tr:hover .fa-trash-o, tr:hover .fa-pencil {
			background:#4E5066;
			color:#FFFFFF;
		}
        td:hover .fa-trash-o {
            color:red;
        }
        td:hover .fa-eye {
            color:green;
        }
        td:hover .fa-pencil {
            color:#5b5bff;
        }
        .fa-trash-o {
            color:red;
        }
        .fa-eye {
            color:green;
        }
        .fa-pencil {
            color:#5b5bff;
        }
		/* Largura da barra de rolagem */
			::-webkit-scrollbar {
			width: 17px;
		}
		/* Fundo da barra de rolagem */
			::-webkit-scrollbar-track-piece {
			background-color: #EEE;
			border-left: 1px solid #CCC
		}
		/* Cor do indicador de rolagem */
			::-webkit-scrollbar-thumb:vertical,
			::-webkit-scrollbar-thumb:horizontal {
			background-color: #BAC0C4
		}
		/* Cor do indicador de rolagem - ao passar o mouse */
			::-webkit-scrollbar-thumb:vertical:hover,
			::-webkit-scrollbar-thumb:horizontal:hover {
			background-color: #717171
		}
        #cor1 {
           color:red; 
        }   
        #cor2 {
           color:#ff8000;
        }
        #cor3 {
           color:green; 
        }
    </style>
	<body>
        <?php include_once("../../controller/curriculo/analyticstracking.php") ?>
        <!-- Navbar -->
            <div class="navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand hidden-xs"><img class="img-responsive logo" id="img-top" src="https://s-media-cache-ak0.pinimg.com/originals/ba/b2/e4/bab2e43d04f43d98fcc8760ab73a92d4.png"></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li title="Voltar para Nova OS"><a href="cadastrar"><i class="fa fa-plus" aria-hidden="true"></i> Cadastrar Bebê</a></li>
                        <li class="active"><a href="listar"><i class="fa fa-list-alt" aria-hidden="true"></i> Listar Bebês</a></li>
                    </ul>
                </div>
            </div>
        <!-- /Navbar -->

        <!-- Lista -->
            <div id="todos" class="tabcontent">
                <table class="toping">
                    <thead>
                        <tr>
                            <th class="text-left" colspan='6'><center><h3>Lista de Bebês</h3></center></th>
                        </tr>
                        <tr>
                            <th class="text-left">Quarto</th>
                            <th class="text-left">Nome do Bebê</th>
                            <th class="text-left"><center>Ver</center></th>
                            <th class="text-left"><center>Apagar</center></th>
                            <th class="text-left"><center>Editar</center></th>
                        </tr>
                    </thead>
                    
                    <?php
                        // não exibe mensagem de alerta
                        error_reporting(1);
                        
                        // se conecta ao DB
                        // $conexao = new mysqli("localhost", "root", "", "20171_php");
                        $conexao = new mysqli("mysql552.umbler.com", "felipesales", "terraazul", "felipesales");
                        
                        if($conexao -> connect_error == true) {
                            $msg_erro = $conexao -> connect_error;
                            
                            echo "Erro de conexão $msg_erro";
                            exit;
                        }
                        
                        // cria comando SQL
                        $sql = "SELECT * FROM maternidade";
                        
                        // executa no banco de dados
                        $retorno = $conexao -> query($sql);
                        
                        //obtem cada registro
                        while($registro = $retorno -> fetch_array()){
                            $id 		= $registro["id"];
                            $quarto 	= $registro["quarto"];
                            $nome_bebe 	= $registro["nome_bebe"];
                            $sexo   	= $registro["sexo"];


                            if ($sexo == 'Masculino') {                                   
                                echo "<tr style='background:#87CEEB !important;'>
                                        <td>$quarto</td>
                                        <td>$nome_bebe</td>
                                        ";
                                echo "
                                        <td><a href='ver?id=$id'><center><i class='fa fa-2x fa-eye'></i></center></a></td>
                                        <td><a onclick=\"return confirm('Deseja realmente deletar o bebê?');\" href='apagar?id=$id'><center><i class='fa fa-2x fa-trash-o'></i></center></a></td>
                                        <td><a href='editar?id=$id'><center><i class='fa fa-2x fa-pencil'></i></center></a></td>
                                    </tr>";
                            } 
                            if ($sexo == 'Feminino') {
                                echo "<tr style='background:#FFB6C1 !important;'>
                                        <td>$quarto</td>
                                        <td>$nome_bebe</td>
                                        ";
                                echo "
                                        <td><a href='ver?id=$id'><center><i class='fa fa-2x fa-eye'></i></center></a></td>
                                        <td><a onclick=\"return confirm('Deseja realmente deletar o bebê?');\" href='apagar?id=$id'><center><i class='fa fa-2x fa-trash-o'></i></center></a></td>
                                        <td><a href='editar?id=$id'><center><i class='fa fa-2x fa-pencil'></i></center></a></td>
                                    </tr>";
                            }
                        }
                    ?>
                </table>
            </div>
        <!-- /Lista -->
	</body>
</html>