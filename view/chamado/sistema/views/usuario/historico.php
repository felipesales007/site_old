<?php
	// Controle de acesso do usuário
	include_once("../../controllers/login/login-acesso.php");
	verificar_acesso();
	// Se for usuário, técnico, analista, supervisor ou administrador entra na tela
	if ($usuarios_permissao_id <= 5 && $usuarios_status_id == 1) {
?>
<html>
	<head>
		<!-- Importação completa do head -->
		<?php include_once("../../controllers/import/head.php"); ?>
		<title>Chamado | Histórico</title>
	</head>
	<body>
		<?php $tela = 'historico' ?>
		<?php include_once("../usuario/menu-top.php"); ?>
		<section class="wrapper">
			<?php include_once("../usuario/menu-lateral.php"); ?>
			<br><br><br>
            <!-- Histórico chamado -->
                <div class="well">
                    <!-- Título -->
                    <a class="btn disabled chamado-ponteiro btn-block"><center><i class="fa fa-book"></i>&ensp; Histórico de chamado</center></a>
                    <hr class="lista-hr-espaco">
                        <!-- Barra de pesquisa -->
                        <div class="col-xs-9 col-sm-5 col-md-3 lista-pesquisar">
                            <i id="lista-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="right" title="Olá <?= $usuarios_nome ?> você pode realizar pesquisas por nº do chamado, nome, setor, ocorrência, ação, data, ou hora"></i>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                                    <input tabindex="1" class="form-control" type="text" data-action="pesquisar" data-pesquisar="#pesquisar-analista-global" placeholder="Pesquisar" onKeyUp="primeira_letra_maiscula(this);">
                                </div>
                            </div>
                        </div>

                        <?php $quantidade_historico = count(listar_historico_usuario($conexao, $usuarios_id)) ?>
                        <!-- Quantidade de histórico  -->
                        <a class="pull-right label label-primary lista-n cursor-default" data-toggle="tooltip" data-placement="left" title="Quantidade do histórico">
                            Nº <?= $quantidade_historico ?>
                        </a>
                        
                        <!-- Título da tabela -->
                        <table class="tabela lista-item-fixo-margem">
                            <thead class="lista-item-fixo">
                                <tr class="tr">
                                    <th class="th hidden-xs" width=100>Nº</th>
                                    <th class="th" width=33><i class="glyphicon glyphicon-picture chamado-historico-img-icone"></i></th>
                                    <th class="th ellipsis">Nome</th>
                                    <th class="th hidden-xs ellipsis">Setor</th>
                                    <th class="th hidden-xs ellipsis">Ocorrência</th> 
                                    <th class="th hidden-xs">Ação</th>
                                    <th class="th" width=127>Data</th> 
                                    <th class="th hidden-sm hidden-xs" width=67>Hora</th>
                                </tr>
                            </thead>
                        </table>
                        <!-- Lista de histórico -->
                        <div class="tabela-scroll">
                            <table id="pesquisar-analista-global" class="tabela">
                                <tbody class="lista-item cursor-default">
                                    <?php $listar_historico_usuario = listar_historico_usuario($conexao, $usuarios_id); ?>
                                    <?php foreach ($listar_historico_usuario as $registro): ?>
                                    <?php 
                                        $tooltip_ocorrencia = $registro['historico_chamados_ocorrencia'];
                                        if ($tooltip_ocorrencia == "Alteração de anexo" || $tooltip_ocorrencia == "Exclusão de anexo" || $tooltip_ocorrencia == "Abertura de anexo") {
                                            $popup_acao = substr($registro['historico_chamados_acao'], 0, 10);
                                        } else {
                                            $popup_acao = $registro['historico_chamados_acao'];
                                        }
                                    ?>
                                    <tr>
                                        <td class="td afastado-margem hidden-xs" width=100>
											<div data-toggle="tooltip" data-placement="top" title="Chamado de nº <?= $registro['chamados_id'] ?>">
                                                <?= $registro['chamados_id'] ?>
											</div>										
                                        </td>
                                        
                                        <td class="td afastado-margem" width=33>
                                            <img class="chamado-historico-img2" src="../../../assets/img/perfil/<?= $registro["usuarios_imagem"] ?>" data-toggle="tooltip-img" title="<img class='tooltip-img' src='../../../assets/img/perfil/<?= $registro['usuarios_imagem'] ?>'>">
                                        </td>

                                        <td class="td afastado-margem hidden-xs">
											<div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $registro['usuarios_nome'] ?> <?= $registro['usuarios_sobrenome'] ?> é o solicitante do chamado">
												<?= $registro['usuarios_nome'] ?> <?= $registro['usuarios_sobrenome'] ?>
											</div>										
                                        </td>
                                        
                                        <td class="td afastado-margem hidden-xs">
                                            <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $registro['setores_setor'] ?> é o setor do solicitante do chamado">
                                                <?= $registro['setores_setor'] ?>
                                            </div>
                                        </td>

                                        <td class="td afastado-margem">
                                            <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $registro['historico_chamados_ocorrencia'] ?>">
                                                <?= $registro['historico_chamados_ocorrencia'] ?>  
                                            </div>
                                        </td>
        
                                        <?php $verifica_anexo = $registro['historico_chamados_ocorrencia'] ?>
                                        <?php $com_anexo = $registro['historico_chamados_acao'] ?>
                                        <?php if ($verifica_anexo == "Alteração de anexo" || $verifica_anexo == "Exclusão de anexo" || $verifica_anexo == "Abertura de anexo") { ?>
                                            
                                            <?php if ($verifica_anexo == "Alteração de anexo" || $verifica_anexo == "Exclusão de anexo") { ?>
                                                <td class="td afastado-margem hidden-xs glyphicon-f-pointer" onclick="window.open('../../../assets/anexos/chamados/<?= $registro["historico_chamados_acao"] ?>','_blank');">
                                                    <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= mb_strtolower($popup_acao) ?>">
                                                        <?= $registro['historico_chamados_acao'] ?>  
                                                    </div>
                                                </td>
                                            <?php } ?>
        
                                            <?php if ($verifica_anexo == "Abertura de anexo" && $com_anexo != "") { ?>
                                                <td class="td afastado-margem hidden-xs glyphicon-f-pointer" onclick="window.open('../../../assets/anexos/chamados/<?= $registro["historico_chamados_acao"] ?>','_blank');">
                                                    <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= mb_strtolower($popup_acao) ?>">
                                                        <?= $registro['historico_chamados_acao'] ?>  
                                                    </div>
                                                </td>
                                            <?php } ?>
        
                                            <?php if ($verifica_anexo == "Abertura de anexo" && $com_anexo == "") { ?>
                                                <td class="td afastado-margem hidden-xs"><?= $registro['historico_chamados_acao'] ?></td>
                                            <?php } ?>
                                        
                                        <?php } else { ?>
                                            <td class="td afastado-margem hidden-xs">
                                                <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $registro['historico_chamados_acao'] ?>">
                                                    <?= $registro['historico_chamados_acao'] ?>
                                                </div>
                                            </td>
                                        <?php } ?>
                                        
                                        <td class="td afastado-margem" width=127><?= $registro['historico_chamados_data_data'] ?></td>
                                        <td class="td afastado-margem hidden-sm hidden-xs" width=67><?= $registro['historico_chamados_data_hora'] ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
			<!-- /Histórico chamado -->

            <div class="analista-espaco"></div>

            <!-- Histórico perfil -->
                <div class="well">
                    <!-- Título -->
                    <a class="btn disabled chamado-ponteiro btn-block"><center><i class="fa fa-book"></i>&ensp; Histórico de perfil</center></a>
                    <hr class="lista-hr-espaco">
                        <!-- Barra de pesquisa -->
                        <div class="col-xs-9 col-sm-5 col-md-3 lista-pesquisar">
                            <i id="lista-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="right" title="Olá <?= $usuarios_nome ?> você pode realizar pesquisas por nº do chamado, nome, setor, ocorrência, ação, data, ou hora"></i>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                                    <input tabindex="1" class="form-control" type="text" data-action="pesquisar" data-pesquisar="#pesquisar-perfil-global" placeholder="Pesquisar" onKeyUp="primeira_letra_maiscula(this);">
                                </div>
                            </div>
                        </div>

                        <?php $quantidade_historico = count(listar_historico_perfil($conexao, $usuarios_id)) ?>
                        <!-- Quantidade de histórico  -->
                        <a class="pull-right label label-primary lista-n cursor-default" data-toggle="tooltip" data-placement="left" title="Quantidade do histórico">
                            Nº <?= $quantidade_historico ?>
                        </a>
                        
                        <!-- Título da tabela -->
                        <table class="tabela lista-item-fixo-margem">
                            <thead class="lista-item-fixo">
                                <tr class="tr">
                                    <th class="th hidden-xs ellipsis">Ocorrência</th> 
                                    <th class="th hidden-xs">Ação</th>
                                    <th class="th" width=127>Data</th> 
                                    <th class="th hidden-sm hidden-xs" width=67>Hora</th>
                                </tr>
                            </thead>
                        </table>
                        <!-- Lista de histórico -->
                        <div class="tabela-scroll">
                            <table id="pesquisar-perfil-global" class="tabela">
                                <tbody class="lista-item cursor-default">
                                    <?php $listar_historico_perfil = listar_historico_perfil($conexao, $usuarios_id); ?>
                                    <?php foreach ($listar_historico_perfil as $registro): ?>
                                    <?php 
                                        $tooltip_ocorrencia = $registro['historico_perfil_ocorrencia'];
                                        if ($tooltip_ocorrencia == "Alteração de imagem") {
                                            $popup_acao = substr($registro['historico_perfil_acao'], 0, 10);
                                        } else {
                                            $popup_acao = $registro['historico_perfil_acao'];
                                        }
                                    ?>
                                    <tr>
                                        <td class="td afastado-margem">
                                            <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $registro['historico_perfil_ocorrencia'] ?>">
                                                <?= $registro['historico_perfil_ocorrencia'] ?>  
                                            </div>
                                        </td>
        
                                        <?php $verifica_imagem = $registro['historico_perfil_ocorrencia'] ?>
                                        <?php $verifica_cpf    = $registro['historico_perfil_ocorrencia'] ?>
                                        <?php if (($verifica_imagem == "Alteração de imagem") || ($verifica_cpf == "Alteração de CPF")) { ?>
                                            <?php if ($verifica_imagem == "Alteração de imagem") { ?>
                                                <td class="td afastado-margem hidden-xs glyphicon-f-pointer" onclick="window.open('../../../assets/img/perfil/<?= $registro["historico_perfil_acao"] ?>','_blank');">
                                                    <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $popup_acao ?>">
                                                        <img class="chamado-historico-img2" src="../../../assets/img/perfil/<?= $registro["historico_perfil_acao"] ?>" data-toggle="tooltip-img" title="<img class='tooltip-img' src='../../../assets/img/perfil/<?= $registro['historico_perfil_acao'] ?>'>">
                                                        <?= $registro['historico_perfil_acao'] ?>
                                                    </div>
                                                </td>
                                            <?php } ?>
                                            <?php if ($verifica_cpf == "Alteração de CPF") { ?>
                                                <td class="td afastado-margem hidden-xs">
                                                    <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= base64_decode($registro['historico_perfil_acao']) ?>">
                                                        <?= base64_decode($registro['historico_perfil_acao']) ?>
                                                    </div>
                                                </td>
                                            <?php } ?>                                        
                                        <?php } else { ?>
                                            <td class="td afastado-margem hidden-xs">
                                                <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $registro['historico_perfil_acao'] ?>">
                                                    <?= $registro['historico_perfil_acao'] ?>
                                                </div>
                                            </td>
                                        <?php } ?>
                                        
                                        <td class="td afastado-margem" width=127><?= $registro['historico_perfil_data_data'] ?></td>
                                        <td class="td afastado-margem hidden-sm hidden-xs" width=67><?= $registro['historico_perfil_data_hora'] ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
			<!-- /Histórico perfil -->
            <div class="rodape-fim"></div>
		</section>
	</body>
	<!-- Javascript -->
	<?php include("../../controllers/import/script-rodape.php"); ?>
</html>
<?php
	} else {
		// Se não for usuário, técnico, analista, supervisor ou administrador volta para a tela anterior
		$_SESSION["warning"] = "Acesso não permitido";
		die("<script> window.history.back(); </script>");
	}
?>