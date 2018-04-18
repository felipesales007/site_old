<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/chamado.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    if ($_POST != null) {
        $chamados_id    = $_POST['chamados_id'];
        $chamados_anexo = $_FILES['chamados_anexo'];

        // Se o anexo estiver sido selecionada
        if (!empty($chamados_anexo["name"])) {
            // Tamanho máximo do anexo em bytes (5MB)
            $tamanho = 5242880;
            $error = array();
    
            // Verifica se o anexo é uma extensão válida
            if (!preg_match("/(^image\/(pjpeg|jpeg|png|gif|bmp)$) || (^application\/(pdf|doc|docx|pps|ppt|pptx|odt|xml|xps|xls|xlsx|cdr|ods|odp)$) || (^text\/(txt))$/", $chamados_anexo["type"])) {
                $error[1] = "Isso não é um arquivo válido.";
            } 
            // Verifica se o tamanho do anexo é maior que o tamanho permitido
            if ($chamados_anexo["size"] > $tamanho) {
                $error[2] = "O anexo deve ter no máximo ".$tamanho." bytes";
            }
    
            // Se não houver nenhum erro
            if (count($error) == 0) {
                // Pega extensão do anexo
                preg_match("/\.(gif|bmp|png|jpg|jpeg|pdf|doc|docx|pps|ppt|pptx|odt|xml|xps|xls|xlsx|cdr|ods|odp|txt){1}$/i", $chamados_anexo["name"], $ext);
                // Gera um nome único para o anexo
                $anexo = md5(uniqid(time())) . "." . $ext[1];
                // Caminho de onde ficará o anexo
                $caminho_anexo = "../../../assets/anexos/chamados/" . $anexo;
                // Faz o upload do anexo para seu respectivo caminho
                move_uploaded_file($chamados_anexo["tmp_name"], $caminho_anexo);
            }
        }

        // Insere os dados no banco
        if (count($error) != 0) {
            $_SESSION["info"] = "O anexo não foi alterado por não atender aos requisitos mínimos exigidos";
            header("location: ../../views/usuario/chamado-visualizar?chamado=$chamados_id");
        } else {
            if (chamado_alterar_anexo($conexao, $chamados_id, $anexo)) {
                $_SESSION["success"] = "Anexo alterado com sucesso";
                header("location: ../../views/usuario/chamado-visualizar?chamado=$chamados_id");
            } else {
               $_SESSION["danger"] = "Erro ao alterar o anexo";
               header("location: ../../views/usuario/chamado-visualizar?chamado=$chamados_id");
           }
        }
    }
?>