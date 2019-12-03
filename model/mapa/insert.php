<?php
    // não exibe mensagem de alerta
    error_reporting(1);
    
    // clicou em enviar
    if($_POST != null) {
        
        // obtem as variaveis do formulario
        $ponto      = utf8_decode($_POST["ponto"]);
        
        // se conecta ao DB
        $conexao = new mysqli("localhost", "root", "", "mapa");
        // $conexao = new mysqli("mysql552.umbler.com", "felipesales", "terraazul", "felipesales");
        
        if($conexao -> connect_error == true) {
            $msg_erro = $conexao -> connect_error;
            
            echo "Erro de conexão $msg_erro";
            exit;
        }
        
        // cria comando SQL
        $sql = "INSERT INTO pontos (ponto) VALUES ('$ponto')";
        
        // executa no banco de dados
        $retorno = $conexao -> query($sql);
        
        // executou
        if($retorno == true) {
            echo "<script>
                    location.href='../../view/mapa/mapa';
                </script>";
        // deu erro...
        } else {
            echo "<script>
                    alert('Erro ao salvar!');
                </script>";
            // exibe mensagem de erro do DB
            echo $conexao -> error;
        }
    }
?>