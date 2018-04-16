<?php
    // Conexão com o banco de dados -->
    include_once("../../models/conexao/banco-conexao.php");
    include_once("../../models/pdf.php");
    // Controle de acesso do usuário -->
    include_once("../../controllers/login/login-acesso.php");
    verificar_acesso();

	// Obtém ID via GET
	$chamados_id = $_GET['chamado'];
	$ver = visualizar_chamado($conexao, $chamados_id);
	// Se for usuário, técnico, analista, supervisor ou administrador entra na tela
	if ($usuarios_permissao_id <= 5 && $ver["chamados_setor_servico_id"] == $usuarios_setor_id && $usuarios_status_id == 1) {

        // Obtem ID do chamado via GET
        $chamado_id = $_GET["chamado"];

        // Obtem os dados do chamado no banco de dados '.$chamado["usuarios_nome"].'
        $chamado = gerar_pdf($conexao, $chamado_id);
        $data_atual = date('d/m/y');
        $contador = strlen($chamado["chamados_problema"]);
        
        // Dados do solicitante que podem estar em branco são ignoradas
        if ($chamado["usuarios_celular"] != null && $chamado["usuarios_email"] == null) {
            $celular = '
                <!-- Celular -->
                <div class="form-group pdf-text-campo">
                    <label class="col-md-4 control-label pdf-label">Celular</label>  
                    <div class="col-md-4">
                        <div class="input-group pdf-input-group">
                            <input class="form-control pdf-form-control" type="text" value="'.$chamado["usuarios_celular"].'" style="border-radius: 4px 4px 4px 4px">
                        </div>
                    </div>
                </div>
            ';
        }

        if ($chamado["usuarios_email"] != null && $chamado["usuarios_celular"] == null) {
            $email = '
                <!-- E-mail -->
                <div class="form-group pdf-text-campo">
                    <label class="col-md-4 control-label pdf-label">E-mail</label>  
                    <div class="col-md-4">
                        <div class="input-group pdf-input-group">
                            <input class="form-control pdf-form-control" type="text" value="'.mb_strimwidth($chamado["usuarios_email"], 0, 33, "...").'" style="border-radius: 4px 4px 4px 4px">
                        </div>
                    </div>
                </div>
            ';
        }

        if ($chamado["usuarios_celular"] != null && $chamado["usuarios_email"] != null) {
            $celular_email = '
                <!-- Celular -->
                <div class="form-group pdf-text-campo">
                    <label class="col-md-4 control-label pdf-label">Celular</label>  
                    <div class="col-md-4">
                        <div class="input-group pdf-input-group">
                            <input class="form-control pdf-form-control" type="text" value="'.$chamado["usuarios_celular"].'" style="border-radius: 4px 4px 4px 4px">
                        </div>
                    </div>
                </div>

                <!-- E-mail -->
                <div class="form-group pdf-text-campo">
                    <label class="col-md-4 control-label pdf-label">E-mail</label>  
                    <div class="col-md-4">
                        <div class="input-group pdf-input-group">
                            <input class="form-control pdf-form-control" type="text" value="'.mb_strimwidth($chamado["usuarios_email"], 0, 33, "...").'" style="border-radius: 4px 4px 4px 4px">
                        </div>
                    </div>
                </div>
            ';
            $espaco = '<br><br><br>';
        }

        if ($chamado["chamados_problema"] != null && $contador <= 33) {
            $problema = '
                <!-- Problema -->
                <div class="form-group pdf-text-campo">
                    <label class="col-md-4 control-label pdf-label">Problema</label>  
                    <div class="col-md-4">
                        <div class="input-group pdf-input-group">
                            <textarea width=50 class="form-control" style="border-radius: 4px 4px 4px 4px">'.wordwrap(mb_strimwidth($chamado["chamados_problema"], 0, 110, "..."), 33, "<br />\n", true).'</textarea>
                        </div>
                    </div>
                </div>
            ';
        }

        if ($chamado["chamados_problema"] != null && $contador > 33 && $contador <= 66) {
            $problema = '
                <!-- Problema -->
                <div class="form-group pdf-text-campo">
                    <label class="col-md-4 control-label pdf-label">Problema</label>  
                    <div class="col-md-4">
                        <div class="input-group pdf-input-group">
                            <textarea width=50 class="form-control" style="border-radius: 4px 4px 4px 4px">'.wordwrap(mb_strimwidth($chamado["chamados_problema"], 0, 110, "..."), 33, "<br />\n", true).'</textarea>
                        </div>
                    </div>
                </div>
            ';
            if ($chamado["usuarios_celular"] == null || $chamado["usuarios_email"] == null) {
                $espaco3 = '<br>';
            }
        }

        if ($chamado["chamados_problema"] != null && $contador > 66 && $contador <= 99) {
            $problema = '
                <!-- Problema -->
                <div class="form-group pdf-text-campo">
                    <label class="col-md-4 control-label pdf-label">Problema</label>  
                    <div class="col-md-4">
                        <div class="input-group pdf-input-group">
                            <textarea width=50 class="form-control" style="border-radius: 4px 4px 4px 4px">'.wordwrap(mb_strimwidth($chamado["chamados_problema"], 0, 110, "..."), 33, "<br />\n", true).'</textarea>
                        </div>
                    </div>
                </div>
            ';
            if ($chamado["usuarios_celular"] == null || $chamado["usuarios_email"] == null) {
                $espaco3 = '<br><br>';
            }
        }

        if ($chamado["chamados_problema"] != null && $contador > 99) {
            $problema = '
                <!-- Problema -->
                <div class="form-group pdf-text-campo">
                    <label class="col-md-4 control-label pdf-label">Problema</label>  
                    <div class="col-md-4">
                        <div class="input-group pdf-input-group">
                            <textarea width=50 class="form-control" style="border-radius: 4px 4px 4px 4px">'.wordwrap(mb_strimwidth($chamado["chamados_problema"], 0, 110, "..."), 33, "<br />\n", true).'</textarea>
                        </div>
                    </div>
                </div>
            ';
            if ($chamado["usuarios_celular"] == null || $chamado["usuarios_email"] == null) {
                $espaco3 = '<br><br><br>';
            }
        }

        if ($chamado["chamados_problema"] != null || $chamado["usuarios_celular"] != null || $chamado["usuarios_email"] != null) {
            $espaco2 = '<br><br><br>';
        }

        // Dados do responsável que podem estar em branco são ignoradas
        if ($chamado["chamados_data_fechamento_data"] != null) {
            $data_fechamento = '
                <!-- Data fechamento -->
                <div class="form-group pdf-text-campo">
                    <label class="col-md-4 control-label pdf-label">Data de fechamento do chamado</label>  
                    <div class="col-md-4">
                        <div class="input-group pdf-input-group">
                            <input class="form-control pdf-form-control" type="text" value="'.$chamado["chamados_data_fechamento_data"].'" style="border-radius: 4px 4px 4px 4px">
                        </div>
                    </div>
                </div>
            ';
        }

        if ($chamado["chamados_solucao"] != null) {
            $solucao = '
                <!-- Solução -->
                <div class="form-group pdf-text-campo">
                    <label class="col-md-4 control-label pdf-label">Solução</label>  
                    <div class="col-md-4">
                        <div class="input-group pdf-input-group">
                            <textarea width=50 class="form-control" style="border-radius: 4px 4px 4px 4px">'.wordwrap(mb_strimwidth($chamado["chamados_solucao"], 0, 110, "..."), 33, "<br />\n", true).'</textarea>
                        </div>
                    </div>
                </div>
            ';
        }

        if ($chamado["tecnico_celular"] != null) {
            $celular2 = '
                <!-- Celular -->
                <div class="form-group pdf-text-campo">
                    <label class="col-md-4 control-label pdf-label">Celular</label>  
                    <div class="col-md-4">
                        <div class="input-group pdf-input-group">
                            <input class="form-control pdf-form-control" type="text" value="'.$chamado["tecnico_celular"].'" style="border-radius: 4px 4px 4px 4px">
                        </div>
                    </div>
                </div>
            ';
        }

        if ($chamado["tecnico_email"] != null) {
            $email2 = '
                <!-- E-mail -->
                <div class="form-group pdf-text-campo">
                    <label class="col-md-4 control-label pdf-label">E-mail</label>  
                    <div class="col-md-4">
                        <div class="input-group pdf-input-group">
                            <input class="form-control pdf-form-control" type="text" value="'.mb_strimwidth($chamado["tecnico_email"], 0, 33, "...").'" style="border-radius: 4px 4px 4px 4px">
                        </div>
                    </div>
                </div>
            ';
        }

        if ($chamado["tecnico_nome"] != null) {
            $responsavel = '
                <a class="btn chamado-ponteiro btn-block pdf-btn-titulo"><center>Responsável</center></a>
                
                <div class="pull-left">
                    <!-- Responsável -->
                    <div class="form-group pdf-text-campo">
                        <label class="col-md-4 control-label pdf-label">Responsável</label>  
                        <div class="col-md-4">
                            <div class="input-group pdf-input-group">
                                <input class="form-control pdf-form-control" type="text" value="'.$chamado["tecnico_nome"].' '.$chamado["tecnico_sobrenome"].'" style="border-radius: 4px 4px 4px 4px">
                            </div>
                        </div>
                    </div>

                    <!-- Setor -->
                    <div class="form-group pdf-text-campo">
                        <label class="col-md-4 control-label pdf-label">Setor</label>  
                        <div class="col-md-4">
                            <div class="input-group pdf-input-group">
                                <input class="form-control pdf-form-control" type="text" value="'.mb_strimwidth($chamado["tecnico_setor"], 0, 33, "...").'" style="border-radius: 4px 4px 4px 4px">
                            </div>
                        </div>
                    </div>

                    <!-- Telefone -->
                    <div class="form-group pdf-text-campo">
                        <label class="col-md-4 control-label pdf-label">Telefone</label>  
                        <div class="col-md-4">
                            <div class="input-group pdf-input-group">
                                <input class="form-control pdf-form-control" type="text" value="'.$chamado["tecnico_telefone"].'" style="border-radius: 4px 4px 4px 4px">
                            </div>
                        </div>
                    </div>

                    '.$celular2.'

                    '.$email2.'
                </div>

                <div class="pull-right">
                    '.$data_fechamento.'

                    <!-- Status -->
                    <div class="form-group pdf-text-campo">
                        <label class="col-md-4 control-label pdf-label">Status</label>  
                        <div class="col-md-4">
                            <div class="input-group pdf-input-group">
                                <input class="form-control pdf-form-control" type="text" value="'.$chamado["chamados_situacao"].'" style="border-radius: 4px 4px 4px 4px">
                            </div>
                        </div>
                    </div>

                    '.$solucao.'
                </div>
            ';
        }

        $html = '
            <span class="pdf-text-logo"><b>Chamados</b></span>
            <p class="pull-right">Data da impressão '.$data_atual.'</p>
            <br><br>
            <div class="pdf-titulo">
                <center><h3><b>Relatório do chamado de nº '.$chamado["chamados_id"].'</b></h3></center>
            </div>
            <br>

            <a class="btn chamado-ponteiro btn-block pdf-btn-titulo"><center>Solicitante</center></a>

            <div class="pull-left">
                <!-- Solicitante -->
                <div class="form-group pdf-text-campo">
                    <label class="col-md-4 control-label pdf-label">Solicitante</label>  
                    <div class="col-md-4">
                        <div class="input-group pdf-input-group">
                            <input class="form-control pdf-form-control" type="text" value="'.$chamado["usuarios_nome"].' '.$chamado["usuarios_sobrenome"].'" style="border-radius: 4px 4px 4px 4px">
                        </div>
                    </div>
                </div>

                <!-- Setor -->
                <div class="form-group pdf-text-campo">
                    <label class="col-md-4 control-label pdf-label">Setor</label>  
                    <div class="col-md-4">
                        <div class="input-group pdf-input-group">
                            <input class="form-control pdf-form-control" type="text" value="'.mb_strimwidth($chamado["usuarios_setor"], 0, 33, "...").'" style="border-radius: 4px 4px 4px 4px">
                        </div>
                    </div>
                </div>

                <!-- Telefone -->
                <div class="form-group pdf-text-campo">
                    <label class="col-md-4 control-label pdf-label">Telefone</label>  
                    <div class="col-md-4">
                        <div class="input-group pdf-input-group">
                            <input class="form-control pdf-form-control" type="text" value="'.$chamado["usuarios_telefone"].'" style="border-radius: 4px 4px 4px 4px">
                        </div>
                    </div>
                </div>

                '.$celular.'

                '.$email.'

                '.$celular_email.'
            </div>

            <div class="pull-right">
                <!-- Data -->
                <div class="form-group pdf-text-campo">
                    <label class="col-md-4 control-label pdf-label">Data de abertura do chamado</label>  
                    <div class="col-md-4">
                        <div class="input-group pdf-input-group">
                            <input class="form-control pdf-form-control" type="text" value="'.$chamado["chamados_data_abertura_data"].'" style="border-radius: 4px 4px 4px 4px">
                        </div>
                    </div>
                </div>

                <!-- Prioridade -->
                <div class="form-group pdf-text-campo">
                    <label class="col-md-4 control-label pdf-label">Prioridade</label>  
                    <div class="col-md-4">
                        <div class="input-group pdf-input-group">
                            <input class="form-control pdf-form-control" type="text" value="'.$chamado["chamados_prioridade"].'" style="border-radius: 4px 4px 4px 4px">
                        </div>
                    </div>
                </div>

                <!-- Ocorrência -->
                <div class="form-group pdf-text-campo">
                    <label class="col-md-4 control-label pdf-label">Ocorrência</label>  
                    <div class="col-md-4">
                        <div class="input-group pdf-input-group">
                            <input class="form-control pdf-form-control" type="text" value="'.mb_strimwidth($chamado["ocorrencias_ocorrencia"], 0, 33, "...").'" style="border-radius: 4px 4px 4px 4px">
                        </div>
                    </div>
                </div>

                '.$problema.'    
            </div>

            <br><br><br><br><br><br><br><br><br>'.$espaco.''.$espaco2.''.$espaco3.'
            '.$responsavel.'

            <div class="pdf-footer">
                <hr class="chamado-hr-espaco">
                <div class="pull-left">
                    <!-- Recebido -->
                    <div class="form-group pdf-text-campo">
                        <label class="col-md-4 control-label pdf-label">Recebido por</label>  
                        <div class="col-md-4">
                            <div class="input-group pdf-input-group2">
                                <input class="form-control pdf-form-control" type="text" style="border-radius: 4px 4px 4px 4px">
                            </div>
                        </div>
                    </div>

                    <!-- Assinatura -->
                    <div class="form-group pdf-text-campo">
                        <label class="col-md-4 control-label pdf-label">Assinatura</label>  
                        <div class="col-md-4">
                            <div class="input-group pdf-input-group2">
                                <input class="form-control pdf-form-control" type="text" style="border-radius: 4px 4px 4px 4px">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pull-right">
                    <!-- Matrícula -->
                    <div class="form-group pdf-text-campo">
                        <label class="col-md-4 control-label pdf-label">Matrícula</label>  
                        <div class="col-md-4">
                            <div class="input-group pdf-input-group3">
                                <input class="form-control pdf-form-control" type="text" style="border-radius: 4px 4px 4px 4px">
                            </div>
                        </div>
                    </div>

                    <!-- Data -->
                    <div class="form-group pdf-text-campo">
                        <label class="col-md-4 control-label pdf-label">Data</label>  
                        <div class="col-md-4">
                            <div class="input-group pdf-input-group3">
                                <input class="form-control pdf-form-control" value="_____/_____/__________"type="text" style="border-radius: 4px 4px 4px 4px">
                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br><br><br><br>
                <hr class="chamado-hr-espaco">
            </div>
        ';

        $template = '
        <html>
            <head>
                <!-- Definição da linguagem -->
                <meta http-equiv="Content-Language" content="pt-br">
                
                <!-- Formato do texto -->
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

                <title>Chamado | PDF</title>
            </head> 
            <body class="background-pdf">
                '.$html.'
            </body> 
        </html>';

    } else {
		// Se não for usuário, técnico, analista, supervisor ou administrador volta para a tela anterior
		$_SESSION["warning"] = "Acesso não permitido";
		die("<script> window.history.back(); </script>");
	}

    // Inclusão da biblioteca
    require_once 'dompdf/autoload.inc.php';

    // Alguns ajustes devido a variações de servidor para servidor
    if (get_magic_quotes_gpc())
        $template = stripslashes($template);

    // Referência do Dompdf
    use Dompdf\Dompdf;

    // Abertura de novo documento
    $dompdf = new DOMPDF();

    // Carregar o HTML
    $dompdf->load_html($template);

    // Dados do documento destino
    $dompdf->set_paper("A4", "portrail");

    // Gera o documento de destino
    $dompdf->render();

    // Exibibir na página
    // Para realizar o download somente alterar para true
    $dompdf->stream("relatório.pdf", array("Attachment" => false));

    exit(0);
?>