<!-- Conexão com o banco de dados -->
<?php include_once("../../models/conexao/banco-conexao.php"); ?>
<?php include_once("../../models/chamado.php"); ?>
<!-- Controle de acesso do usuário -->
<?php include_once("../../controllers/login/login-acesso.php"); ?>

<?php
    if ($_POST != null) {
        $chamados_usuario_id          = usuario_id();
        $chamados_ocorrencia_id       = $_POST['chamados_categoria'];
        $chamados_problema            = $_POST['chamados_descricao'];
        $chamados_prioridade_id       = $_POST['chamados_prioridade'];
        $chamados_anexo               = $_FILES['chamados_anexo'];
        $chamados_setor_servico_id    = $_POST['chamados_setor'];
        $chamados_situacao_id         = 1; // 1 = aberto, 2 = enviado, 3 = resolvido, 4 = pendente, 5 = cancelado, 6 = reaberto

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
        if (chamado_novo($conexao, 
            $chamados_usuario_id, $chamados_ocorrencia_id, $chamados_problema,
            $chamados_prioridade_id, $anexo, $chamados_setor_servico_id, $chamados_situacao_id)) {

            $id = ultimo_chamado($conexao, $chamados_usuario_id);
            $novo = $id["chamado"];
            
            if (count($error) != 0) {
                $_SESSION["success"] = "Chamado aberto, <b>porém o anexo não foi salvo por não atender aos requisitos mínimos exigidos</b>";
            } else {
                $_SESSION["success"] = "Chamado aberto com sucesso";
            }
            header("location: ../../views/usuario/chamado-visualizar?chamado=$novo");
        } else {
            $_SESSION["danger"] = "Erro ao abrir o chamado";
            header("location: ../../views/usuario/chamado-novo");
        }
    }
?>