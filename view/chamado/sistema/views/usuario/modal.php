<!-- Modal confirmar delete de anexo -->
<div class="modal fade porcima" id="modal-confirmar-delete-anexo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-geral-erro">
                <button type="button" class="close fechar-modal" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-f-pointer glyphicon-remove"></i></button>
                <h4 class="modal-title text-center text-danger" id="myModalLabel">
                    <i class="glyphicon glyphicon-trash"></i>&ensp;Você tem certeza que deseja excluir este anexo ?
                </h4>
                <br>
            </div>
            <h4 class="col-md-12 col-xs-12">Exclusão de arquivo:</h4>
            <p class="text-left text-danger col-md-12 col-xs-12">Olá <?= $ver['usuarios_nome'] ?> <?= $ver['usuarios_sobrenome'] ?>, você confirma em excluir o arquivo abaixo?</p>
            <p class="text-left text-danger col-md-12 col-xs-12 modal-espaco-texto">Após a exclusão você poderá anexar outro arquivo em seu chamado, se necessário.</p>
            
            <div class="form-group chamado-modal-input">
                <i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Você irá excluir este arquivo permanentimente"></i>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-paperclip"></i></span>
                    <input readonly="true" class="form-control login-input-modal" type="text" value="<?= $ver['chamados_anexo'] ?>">
                </div>
            </div>
            
            <div class="modal-espaco-div"></div>
            <hr class="modal-espaco-hr">
            <div class="modal-footer">
                <a href="../../controllers/chamado/chamado-deletar-anexo.php?chamado=<?= $ver["chamados_id"] ?>" class="cursor-default">
                    <button class="btn btn-success f-btn-success">
                        <i class="glyphicon glyphicon-ok glyphicon-f-pointer"></i>&ensp;Confirmar
                    </button>
                </a>
                <span class="modal-btn-espaco"></span>
                <button class="btn btn-danger f-btn-danger" data-dismiss="modal" aria-hidden="true">
                    <i class="glyphicon glyphicon-ban-circle glyphicon-f-pointer"></i>&ensp;Cancelar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para alterar o anexo -->
<div class="modal fade porcima" id="modal-alterar-anexo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-geral-sucesso">
                <button type="button" class="close fechar-modal" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-f-pointer glyphicon-remove"></i></button>
                <h4 class="modal-title text-center text-success" id="myModalLabel">
                    <i class="fas fa-redo"></i>&ensp;Alterar o anexo
                </h4>
                <br>
            </div>
            <h4 class="col-md-12 col-xs-12">Alteração de arquivo:</h4>
            <p class="text-left text-success col-md-12 col-xs-12">Olá <?= $ver['usuarios_nome'] ?> <?= $ver['usuarios_sobrenome'] ?>, selecione abaixo um arquivo para substituir o anexo atual.</p>
            <p class="text-left text-success col-md-12 col-xs-12 modal-espaco-texto">Após a alteração o anexo atual será perdido.</p>
            
            <!-- Formulário -->
                <form id="validador-1" method="POST" action="../../controllers/chamado/chamado-alterar-anexo.php" enctype="multipart/form-data">
                    <!-- Id do chamado -->
                    <input name="chamados_id" class="hidden" type="text" value="<?= $ver["chamados_id"] ?>">
                             
                    <!-- Anexo -->			
                    <div class="form-group chamado-modal-input">
                        <i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Altere o arquivo do seu chamado, se necessário, por um com 5 MB de tamanho no máximo"></i>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                            <div class="chamado-anexo-nome form-control">Anexar arquivo</div>
                            <input required id="chamado-anexo-modal" name="chamados_anexo" class="form-control" type="file">
                        </div>                  
                    </div>

                    <div class="modal-espaco-div"></div>
                    <hr class="modal-espaco-hr">

                    <!-- Alterar -->
                    <div class="modal-footer">
                        <button class="btn btn-success f-btn-success" type="submit">
                            <i class="glyphicon glyphicon-ok glyphicon-f-pointer"></i>&ensp;Confirmar
                        </button>
                        <span class="modal-btn-espaco"></span>
                        <button class="btn btn-danger f-btn-danger" data-dismiss="modal" aria-hidden="true">
                            <i class="glyphicon glyphicon-ban-circle glyphicon-f-pointer"></i>&ensp;Cancelar
                        </button>
                    </div>
                </form>
            <!-- /Formulário -->
        </div>
    </div>
</div>

<!-- Modal para reabrir chamado -->
<div class="modal fade cursor-default porcima" id="modal-reabrir-chamado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-geral-erro">
                <button type="button" class="close fechar-modal" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-f-pointer glyphicon-remove"></i></button>
                <h4 class="modal-title text-center text-danger" id="myModalLabel">
                    <i class="fas fa-redo"></i>&ensp;Você realmente quer reabrir o chamado ?
                </h4>
                <br>
            </div>
            <h4 class="col-md-12 col-xs-12">Reabertura de chamado:</h4>
            <p class="text-left text-danger col-md-12 col-xs-12">Olá <?= $ver['usuarios_nome'] ?> <?= $ver['usuarios_sobrenome'] ?>, ao clicar em confirmar o chamado será reaberto novamente.</p>
            <p class="text-left text-danger col-md-12 col-xs-12 modal-espaco-texto">Após a reabertura o último responsável do chamado irá ficar responsável pelo atendimento novamente.</p>
            
            <!-- Formulário -->
                <form method="POST" action="../../controllers/chamado/chamado-reabrir.php">
                    <!-- Id do chamado -->
                    <input name="chamados_id" class="hidden" type="text" value="<?= $ver["chamados_id"] ?>">

                    <div class="modal-espaco-div"></div>
                    <hr class="modal-espaco-hr"><hr><hr><hr><hr>

                    <!-- Alterar -->
                    <div class="modal-footer">
                        <button class="btn btn-success f-btn-success" type="submit">
                            <i class="glyphicon glyphicon-ok glyphicon-f-pointer"></i>&ensp;Confirmar
                        </button>
                        <span class="modal-btn-espaco"></span>
                        <button class="btn btn-danger f-btn-danger" data-dismiss="modal" aria-hidden="true">
                            <i class="glyphicon glyphicon-ban-circle glyphicon-f-pointer"></i>&ensp;Cancelar
                        </button>
                    </div>
                </form>
            <!-- /Formulário -->
        </div>
    </div>
</div>

<!-- Modal feedback -->
<div class="modal fade porcima" id="modal-feedback" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-geral-primary">
                <button type="button" class="close fechar-modal" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-f-pointer glyphicon-remove"></i></button>
                <h4 class="modal-title text-center" id="myModalLabel">
                    <i class="glyphicon glyphicon-comment"></i>&ensp;Feedback sobre o chamado
                </h4>
                <br>
            </div>

            <!-- Postagem de feedback -->
            <?php if ($ver["chamados_situacao_id"] == 1 || $ver["chamados_situacao_id"] == 2 || $ver["chamados_situacao_id"] == 4 || $ver["chamados_situacao_id"] == 6) { ?>
                <div class="chamado-post-fixo">
                    <h5 class="text-left"></h5>
                    <div class="media media-post">
                        <a class="pull-left author">
                            <div class="avatar">
                                <img src="../../../assets/img/perfil/<?= $usuarios_imagem ?>" class="img-circle chamado-img-modal-post" id="feedback-img-usuario">
                            </div>
                        </a>

                        <?php $numero_feedback = count(listar_feedbacks($conexao, $ver["chamados_id"])); ?>
                        <?php if ($numero_feedback == 1) { ?>
                            <a class="pull-left chamado-numero-feedback-modal"><?= $numero_feedback ?> feedback</a>
                        <?php } ?>
                        <?php if ($numero_feedback > 1) { ?>
                            <a class="pull-left chamado-numero-feedback-modal"><?= $numero_feedback ?> feedbacks</a>
                        <?php } ?>

                        <div class="media-body"><h5 class="media-heading chamado-nome-text-post"><?= $usuarios_nome ?> <?= $usuarios_sobrenome ?></h5>
                            <!-- Formulário -->
                                <form id="validador-2" method="POST" action="../../controllers/chamado/chamado-postar-feedback.php" onsubmit="return carregando_postagem(this)">
                                    <!-- Id do chamado -->
                                    <input name="chamados_id" class="hidden" type="text" value="<?= $ver["chamados_id"] ?>">

                                    <!-- Campo de preenchimento da postagem -->
                                    <div class="form-group chamado-modal-postar-text">
                                        <textarea required id="feedbacks-feedback" name="feedbacks_feedback" class="form-control modal-coment" placeholder="Descreva o feedback do chamado" rows="3" onKeyUp="primeira_letra_maiscula(this);"></textarea>
                                    </div>

                                    <div class="media-footer">
                                        <button id="enter-modal" type="submit" tabindex="1" class="btn btn-info btn-fill btn-wd pull-right f-btn-info btn-post-modal"><i id="carregando-modal"></i>Postar feedback</button>
                                    </div>
                                </form>
                            <!-- /Formulário -->
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="chamado-post-fixo">
                    <div class="media media-post">
                        <?php $numero_feedback = count(listar_feedbacks($conexao, $ver["chamados_id"])); ?>
                        <?php if ($numero_feedback < 2) { ?>
                            <center><a><?= $numero_feedback ?> feedback</a></center>
                        <?php } ?>
                        <?php if ($numero_feedback > 1) { ?>
                            <center><a><?= $numero_feedback ?> feedbacks</a></center>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>

            <!-- Post -->
            <div class="post-modal-scroll">
                <?php $listar_feedbacks = listar_feedbacks($conexao, $ver["chamados_id"]); ?>
                <?php foreach ($listar_feedbacks as $registro): ?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 chamado-post-scroll">
                        <br>
                        <!-- Quem postou e quando -->
                        <div class="media-area media-area-small">
                            <div class="media">
                                <a class="pull-left">
                                    <div class="avatar">
                                        <img src="../../../assets/img/perfil/<?= $registro['usuarios_imagem'] ?>" class="img-circle chamado-img-modal-post" id="feedback-img-usuario">
                                    </div>
                                </a>
                                <div class="media-body">
                                    <h6 class="pull-right text-muted chamado-modal-post-data "><?= $registro['feedbacks_data_data'] ?> - <?= $registro['feedbacks_data_hora'] ?></h6>
                                    <h4 class="media-heading chamado-nome-text-post"><?= $registro['usuarios_nome'] ?> <?= $registro['usuarios_sobrenome'] ?></h4>
                                    <!-- Postagem -->
                                    <p><?= $registro['feedbacks_feedback'] ?></p>

                                    <?php if (($usuarios_id == $registro['feedbacks_usuario_id'] && $ver["chamados_situacao_id"] == 1) ||
                                              ($usuarios_id == $registro['feedbacks_usuario_id'] && $ver["chamados_situacao_id"] == 2) ||
                                              ($usuarios_id == $registro['feedbacks_usuario_id'] && $ver["chamados_situacao_id"] == 4) ||
                                              ($usuarios_id == $registro['feedbacks_usuario_id'] && $ver["chamados_situacao_id"] == 6)) { 
                                    ?>
                                        <div class="media-footer">
                                            <i class="pull-right chamado-margin-delete-post">
                                                <a class="pull-right label label-danger chamado-anexo-deletar f-btn-danger" href="../../controllers/chamado/chamado-deletar-feedback.php?feedback=<?= $registro["feedbacks_id"] ?>&&chamado=<?= $ver["chamados_id"] ?>">
                                                    <i class="glyphicon glyphicon-trash chamado-anexo-link"></i>
                                                    &ensp;Excluir
                                                </a>
                                            </i>
                                        </div>
                                    <?php } else { ?>
                                        <div class="media-footer i-hidden">
                                            <i class="pull-right chamado-margin-delete-post">
                                                <a class="pull-right label label-danger chamado-anexo-deletar f-btn-danger">
                                                    <i class="glyphicon glyphicon-trash chamado-anexo-link"></i>
                                                    &ensp;Excluir
                                                </a>
                                            </i>
                                        </div>
                                    <?php } ?>
                                </div>
                                <hr class="chamado-hr-fim-post">
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<!-- Modal histórico -->
<div class="modal fade porcima" id="modal-historico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-historico">
        <div class="modal-content">
            <div class="modal-header modal-geral-warning">
                <button type="button" class="close fechar-modal" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-f-pointer glyphicon-remove"></i></button>
                <h4 class="modal-title text-center" id="myModalLabel">
                    <i class="fa fa-book"></i>&ensp;Histórico do chamado
                </h4>
                <br>
            </div>

            <!-- Quantidades de históricos -->
            <div class="media media-post chamado-historico-n pull-right">
                <?php $numero_historico = count(listar_historico($conexao, $ver["chamados_id"])); ?>
                <?php if ($numero_historico == 1) { ?>
                    <center><a>Há <?= $numero_historico ?> histórico referente a este chamado</a></center>
                <?php } ?>
                <?php if ($numero_historico > 1) { ?>
                    <center><a>Há <?= $numero_historico ?> históricos referente a este chamado</a></center>
                <?php } ?>
            </div>
            <!-- Barra de pesquisa -->
            <div class="col-xs-8 col-sm-5 col-md-3 lista-pesquisar-historico">
                <i id="lista-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Olá <?= $usuarios_nome ?> você pode realizar pesquisas por nome, ocorrência, ação, data ou hora"></i>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        <input tabindex="1" class="form-control" type="text" data-action="pesquisar" data-pesquisar="#pesquisar-historico" placeholder="Pesquisar" onKeyUp="primeira_letra_maiscula(this);">
                    </div>
                </div>
            </div>

            <!-- Título da tabela -->
            <table class="tabela lista-item-fixo-margem">
                <thead class="lista-item-fixo">
                    <tr class="tr">
                        <th class="th" width=33><i class="glyphicon glyphicon-picture chamado-historico-img-icone"></i></th>
                        <th class="th hidden-xs" width=15%>Nome</th>
                        <th class="th hidden-xs" width=15%>Usuário</th>
                        <th class="th">Ocorrência</th> 
                        <th class="th hidden-xs">Ação</th>
                        <th class="th hidden-sm hidden-xs" width=127>Data</th> 
                        <th class="th hidden-sm hidden-xs" width=67>Hora</th>
                    </tr>
                </thead>
            </table>

            <!-- Lista de históricos -->
            <div class="post-modal-scroll">
                <td class="col-xs-16 col-sm-16 col-md-16 col-lg-16 chamado-post-scroll">
                    <!-- Lista de dados -->
                    <table id="pesquisar-historico" class="tabela">
                        <tbody>
                            <?php $listar_historico = listar_historico($conexao, $ver["chamados_id"]); ?>
                            <?php foreach ($listar_historico as $registro): ?>
                            <tr>
                                <td class="td afastado-margem" width=33>
                                    <?php 
                                        $tooltip_ocorrencia = $registro['historico_chamados_ocorrencia'];
                                        if ($tooltip_ocorrencia == "Alteração de anexo" || $tooltip_ocorrencia == "Exclusão de anexo" || $tooltip_ocorrencia == "Abertura de anexo") {
                                            $popup_acao = substr($registro['historico_chamados_acao'], 0, 10);
                                        } else {
                                            $popup_acao = $registro['historico_chamados_acao'];
                                        }
                                    ?>
                                    <img class="chamado-historico-img" src="../../../assets/img/perfil/<?= $registro["usuarios_imagem"] ?>" data-toggle="tooltip" data-placement="top" 
                                    title="
                                    <?= $registro['usuarios_nome'] ?> de usuário 
                                    <?= $registro['usuarios_usuario'] ?> fez 
                                    <?= mb_strtolower($registro['historico_chamados_ocorrencia']) ?>, 
                                    <?= mb_strtolower($popup_acao) ?> no dia 
                                    <?= $registro['historico_chamados_data_data'] ?> às 
                                    <?= $registro['historico_chamados_data_hora'] ?>">
                                </td>
                                <td class="td afastado-margem hidden-xs" width=15%><?= $registro['usuarios_nome'] ?></td>
                                <td class="td afastado-margem hidden-xs" width=15%><?= $registro['usuarios_usuario'] ?></td>
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
                                
                                <td class="td afastado-margem hidden-sm hidden-xs" width=127><?= $registro['historico_chamados_data_data'] ?></td>
                                <td class="td afastado-margem hidden-sm hidden-xs" width=67><?= $registro['historico_chamados_data_hora'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table> 
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<!-- Javascript -->
<?php include("../../controllers/import/script-rodape.php"); ?>