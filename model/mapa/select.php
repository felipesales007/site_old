<?php
    // não exibe mensagem de alerta
    error_reporting(1);
    
    // se conecta ao DB
    // $conexao = new mysqli("localhost", "root", "", "mapa");
    $conexao = new mysqli("mysql552.umbler.com", "felipesales", "terraazul", "felipesales");
    
    if($conexao -> connect_error == true) {
        $msg_erro = $conexao -> connect_error;
        
        echo "Erro de conexão $msg_erro";
        exit;
    }
    
    // cria comando SQL
    $sql = "SELECT * FROM pontos";
    
    // executa no banco de dados
    $retorno = $conexao -> query($sql);

    echo "<script>
            var localizacaoLista = [ ";
    //obtem cada registro
    while($registro = $retorno -> fetch_array()){
        $lista 		= $registro['ponto'];
            echo $lista; 
    }
    echo " ];
        </script>";
        
    echo "<script>
                var localizacaoRondom = [];
            </script>";
?>