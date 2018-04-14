<!-- Modal pesquisar chamado -->
<div class="modal fade porcima" id="modal-pesquisar-chamados" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-pesquisar">
        <div class="modal-content">
            <div class="modal-header modal-geral-warning">
                <button type="button" class="close fechar-modal" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-f-pointer glyphicon-remove"></i></button>
                <h4 class="modal-title text-center" id="myModalLabel">
                <i class="glyphicon glyphicon-search"></i>&ensp;Pesquisar chamado
                </h4>
                <br>
            </div>

            <!-- Menu para visualização entre chamados abertos e fechados -->
            <div class="radio pesquisar-chamado-tipo">
                <label>
                    <input type="radio" name="pesquisar-chamado" onclick="pesquisar_chamado();" id="radio-aberto" checked>
                    <span class="label label-info f-btn-info tecnico-label-chamado-tipo">Abertos</span>
                </label>
                <span class="tecnico-label-chamado-espaco"></span>
                <label>
                    <input type="radio" name="pesquisar-chamado" onclick="pesquisar_chamado();">
                    <span class="label label-danger f-btn-danger tecnico-label-chamado-tipo">Fechados</span>
                </label>
            </div>
            <hr class="chamado-analista-pesquisar-hr">

            <div id="chamados-abertos">
                <!-- Quantidade de chamados abertos -->
                <div class="media media-post chamado-historico-n pull-right">
                    <?php $numero_andamento = count(listar_pesquisar_chamados($conexao, $usuarios_setor_id)); ?>
                    <?php if ($numero_andamento < 2) { ?>
                        <center><a>Há <?= $numero_andamento ?> chamado em andamento</a></center>
                    <?php } ?>
                    <?php if ($numero_andamento > 1) { ?>
                        <center><a>Há <?= $numero_andamento ?> chamados em andamento</a></center>
                    <?php } ?>
                </div>
                
                <!-- Barra de pesquisa -->
                <div class="col-xs-8 col-sm-5 col-md-3 lista-pesquisar-historico">
                    <i id="lista-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="right" title="Olá <?= $usuarios_nome ?> você pode realizar pesquisas por nº do chamado, nome, setor, ocorrência, problema, data, hora, prioridade, status, ou responsável"></i>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                            <input tabindex="1" class="form-control" type="text" data-action="pesquisar" data-pesquisar="#pesquisar-chamados-abertos" placeholder="Pesquisar" onKeyUp="primeira_letra_maiscula(this);">
                        </div>
                    </div>
                </div>

                <!-- Título da tabela -->
                <table class="tabela lista-item-fixo-margem">
                    <thead class="lista-item-fixo">
                        <tr class="tr">
                            <th class="th" width=100>Nº</th>
                            <th class="th" width=33><i class="glyphicon glyphicon-picture chamado-historico-img-icone"></i></th>
                            <th class="th ellipsis">Nome</th>
                            <th class="th hidden-xs ellipsis">Setor</th>
                            <th class="th hidden-xs ellipsis">Ocorrência</th>
                            <th class="th hidden-sm hidden-xs ellipsis">Problema</th>
                            <th class="th hidden-sm hidden-xs" width=127>Data</th>
                            <th class="th hidden-sm hidden-xs" width=67>Hora</th>
                            <th class="th hidden-sm hidden-xs" width=112>Prioridade</th>
                            <th class="th hidden-sm hidden-xs" width=155><center>Status</center></th>
                            <th class="th hidden-xs ellipsis">Responsável</th>
                            <th class="th" width=45><center><i class="fab fa-telegram-plane chamado-analista-envia2"></i></center></th>
                        </tr>
                    </thead>
                </table>

                <!-- Lista de chamados abertos -->
                <div class="post-modal-scroll">
                    <td class="col-xs-16 col-sm-16 col-md-16 col-lg-16 chamado-post-scroll">
                        <!-- Lista de dados -->
                        <table id="pesquisar-chamados-abertos" class="tabela glyphicon-f-pointer">
                            <tbody>
                                <?php $listar_chamados_abertos = listar_pesquisar_chamados($conexao, $usuarios_setor_id); ?>
                                <?php foreach ($listar_chamados_abertos as $aberto): ?>
                                    <?php 
                                        $prioridade 	 = $aberto['chamados_prioridade_id'];
                                        $prioridade_nome = mb_strtolower($aberto['prioridades_nome']);
                                        if ($prioridade == 1) {
                                            $prioridade = "<span class='f-label f-btn-danger btn-block'>Alta</span>";
                                        }
                                        if ($prioridade == 2) {
                                            $prioridade = "<span class='f-label f-btn-warning btn-block'>Média</span>";
                                        }
                                        if ($prioridade == 3) {
                                            $prioridade = "<span class='f-label f-btn-info btn-block'>Baixa</span>";
                                        }

                                        $situacao = $aberto['chamados_situacao_id'];
                                        if ($situacao == 1) {
                                            $situacao = "<span class='f-label f-btn-default btn-block'>Aberto</span>";
                                        }
                                        if ($situacao == 2) {
                                            $situacao = "<span class='f-label f-btn-info btn-block'>Enviado</span>";
                                        }
                                        if ($situacao == 3) {
                                            $situacao = "<span class='f-label f-btn-success btn-block'>Resolvido</span>";
                                        }
                                        if ($situacao == 4) {
                                            $situacao = "<span class='f-label f-btn-warning btn-block'>Pendente</span>";
                                        }
                                        if ($situacao == 5) {
                                            $situacao = "<span class='f-label f-btn-danger btn-block'>Cancelado</span>";
                                        }
                                        if ($situacao == 6) {
                                            $situacao = "<span class='f-label f-btn-primary btn-block'>Reaberto</span>";
                                        }
                                    ?>

                                    <tr>
                                        <td class="td afastado-margem" width=100 onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $aberto['chamados_id'] ?>';">
                                            <?php if ($aberto['chamados_problema'] != '') {
                                                $problema = 'com o problema ' .mb_strtolower($aberto['chamados_problema']);
                                            } else {
                                                $problema = null;
                                            } ?>
                                            <div data-toggle="tooltip" data-placement="top" title="Chamado de nº <?= $aberto['chamados_id'] ?> aberto por <?= $aberto['usuarios_nome'] ?> <?= $aberto['usuarios_sobrenome'] ?> do setor <?= mb_strtolower($aberto['setores_setor']) ?> com a ocorrência de <?= mb_strtolower($aberto['ocorrencias_ocorrencia']) ?> <?= $problema ?> no dia <?= $aberto['chamados_data_abertura'] ?> às <?= $aberto['chamados_hora_abertura'] ?> de prioridade <?= $prioridade_nome ?> com o status <?= mb_strtolower($aberto['situacoes_nome']) ?> e com o responsável <?= $aberto['tecnico_nome'] ?> <?= $aberto['tecnico_sobrenome'] ?>">
                                                <?= $aberto['chamados_id'] ?>
                                            </div>
                                        </td>
                                        <td class="td afastado-margem" width=33 onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $aberto['chamados_id'] ?>';">
                                            <img class="chamado-historico-img2" src="../../../assets/img/perfil/<?= $aberto["usuarios_imagem"] ?>" data-toggle="tooltip-img" title="<img class='tooltip-img' src='../../../assets/img/perfil/<?= $aberto['usuarios_imagem'] ?>'>">
                                        </td>
                                        <td class="td afastado-margem" onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $aberto['chamados_id'] ?>';">
                                            <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $aberto['usuarios_nome'] ?> <?= $aberto['usuarios_sobrenome'] ?>">
                                                <?= $aberto['usuarios_nome'] ?> <?= $aberto['usuarios_sobrenome'] ?>
                                            </div>										
                                        </td>
                                        <td class="td afastado-margem hidden-xs" onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $aberto['chamados_id'] ?>';">
                                            <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $aberto['setores_setor'] ?>">
                                                <?= $aberto['setores_setor'] ?>
                                            </div>
                                        </td>
                                        <td class="td afastado-margem hidden-xs" onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $aberto['chamados_id'] ?>';">
                                            <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $aberto['ocorrencias_ocorrencia'] ?>">
                                                <?= $aberto['ocorrencias_ocorrencia'] ?>
                                            </div>
                                        </td>
                                        <td class="td afastado-margem hidden-sm hidden-xs" onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $aberto['chamados_id'] ?>';">
                                            <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $aberto['chamados_problema'] ?>">
                                                <?= $aberto['chamados_problema'] ?>
                                            </div>
                                        </td>
                                        <td class="td afastado-margem hidden-sm hidden-xs" width=127 onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $aberto['chamados_id'] ?>';"><?= $aberto['chamados_data_abertura'] ?></td>
                                        <td class="td afastado-margem hidden-sm hidden-xs" width=67 onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $aberto['chamados_id'] ?>';"><?= $aberto['chamados_hora_abertura'] ?></td>
                                        <td class="td hidden-sm hidden-xs" width=112 onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $aberto['chamados_id'] ?>';"><center><?= $prioridade ?></center></td>
                                        <td class="td hidden-sm hidden-xs" width=155 onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $aberto['chamados_id'] ?>';"><center><?= $situacao ?></center></td>
                                        <td class="td afastado-margem hidden-xs" onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $aberto['chamados_id'] ?>';">
                                            <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $aberto['tecnico_nome'] ?> <?= $aberto['tecnico_sobrenome'] ?>">
                                                <?= $aberto['tecnico_nome'] ?> <?= $aberto['tecnico_sobrenome'] ?>
                                            </div>										
                                        </td>
                                        <td class="td modal-id" width=45 data-toggle="modal" data-target="#modal-enviar-chamado" data-usuario="<?= $usuario['usuarios_id'] ?>" data-id="<?= $aberto['chamados_id'] ?>" data-nome="<?= $aberto['usuarios_nome'] ?>" data-sobrenome="<?= $aberto['usuarios_sobrenome'] ?>">
                                            <div data-toggle="tooltip" data-placement="top" title="Enviar para outro responsável">
                                                <center>
                                                    <a class='f-label f-btn-success btn-block chamado-analista-envia'>
                                                        <i class="fas fa-child glyphicon-f-pointer"></i>
                                                    </a>
                                                </center>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table> 
                    </td>
                </div>
            </div>

            <!-- ############################################ Outra lista ############################################ -->
            
            <div id="chamados-fechados">
                <!-- Quantidade de chamados fechados -->
                <div class="media media-post chamado-historico-n pull-right">
                    <?php $numero_andamento = count(listar_pesquisar_chamados_fechados($conexao, $usuarios_setor_id)); ?>
                    <?php if ($numero_andamento < 2) { ?>
                        <center><a>Há <?= $numero_andamento ?> chamado fechado</a></center>
                    <?php } ?>
                    <?php if ($numero_andamento > 1) { ?>
                        <center><a>Há <?= $numero_andamento ?> chamados fechados</a></center>
                    <?php } ?>
                </div>
                
                <!-- Barra de pesquisa -->
                <div class="col-xs-8 col-sm-5 col-md-3 lista-pesquisar-historico">
                    <i id="lista-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="right" title="Olá <?= $usuarios_nome ?> você pode realizar pesquisas por nº do chamado, nome, setor, ocorrência, problema, data, hora, prioridade, status, ou responsável"></i>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                            <input tabindex="1" class="form-control" type="text" data-action="pesquisar" data-pesquisar="#pesquisar-chamados-fechados" placeholder="Pesquisar" onKeyUp="primeira_letra_maiscula(this);">
                        </div>
                    </div>
                </div>

                <!-- Título da tabela -->
                <table class="tabela lista-item-fixo-margem">
                    <thead class="lista-item-fixo">
                        <tr class="tr">
                            <th class="th" width=100>Nº</th>
                            <th class="th" width=33><i class="glyphicon glyphicon-picture chamado-historico-img-icone"></i></th>
                            <th class="th ellipsis">Nome</th>
                            <th class="th hidden-xs ellipsis">Setor</th>
                            <th class="th hidden-xs ellipsis">Ocorrência</th>
                            <th class="th hidden-sm hidden-xs ellipsis">Problema</th>
                            <th class="th hidden-sm hidden-xs" width=127>Data</th>
                            <th class="th hidden-sm hidden-xs" width=67>Hora</th>
                            <th class="th hidden-sm hidden-xs" width=112>Prioridade</th>
                            <th class="th hidden-sm hidden-xs" width=155><center>Status</center></th>
                            <th class="th hidden-xs ellipsis">Responsável</th>
                            <th class="th" width=45><center><i class="fab fa-telegram-plane chamado-analista-envia2"></i></center></th>
                        </tr>
                    </thead>
                </table>

                <!-- Lista de chamados fechados -->
                <div class="post-modal-scroll">
                    <td class="col-xs-16 col-sm-16 col-md-16 col-lg-16 chamado-post-scroll">
                        <!-- Lista de dados -->
                        <table id="pesquisar-chamados-fechados" class="tabela glyphicon-f-pointer">
                            <tbody>
                                <?php $listar_pesquisar_chamados_fechados = listar_pesquisar_chamados_fechados($conexao, $usuarios_setor_id); ?>
                                <?php foreach ($listar_pesquisar_chamados_fechados as $fechado): ?>
                                    <?php 
                                        $prioridade 	 = $fechado['chamados_prioridade_id'];
                                        $prioridade_nome = mb_strtolower($fechado['prioridades_nome']);
                                        if ($prioridade == 1) {
                                            $prioridade = "<span class='f-label f-btn-danger btn-block'>Alta</span>";
                                        }
                                        if ($prioridade == 2) {
                                            $prioridade = "<span class='f-label f-btn-warning btn-block'>Média</span>";
                                        }
                                        if ($prioridade == 3) {
                                            $prioridade = "<span class='f-label f-btn-info btn-block'>Baixa</span>";
                                        }

                                        $situacao = $fechado['chamados_situacao_id'];
                                        if ($situacao == 1) {
                                            $situacao = "<span class='f-label f-btn-default btn-block'>Aberto</span>";
                                        }
                                        if ($situacao == 2) {
                                            $situacao = "<span class='f-label f-btn-info btn-block'>Enviado</span>";
                                        }
                                        if ($situacao == 3) {
                                            $situacao = "<span class='f-label f-btn-success btn-block'>Resolvido</span>";
                                        }
                                        if ($situacao == 4) {
                                            $situacao = "<span class='f-label f-btn-warning btn-block'>Pendente</span>";
                                        }
                                        if ($situacao == 5) {
                                            $situacao = "<span class='f-label f-btn-danger btn-block'>Cancelado</span>";
                                        }
                                        if ($situacao == 6) {
                                            $situacao = "<span class='f-label f-btn-primary btn-block'>Reaberto</span>";
                                        }
                                    ?>

                                    <tr>
                                        <td class="td afastado-margem" width=100 onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $fechado['chamados_id'] ?>';">
                                            <?php if ($fechado['chamados_problema'] != '') {
                                                $problema = 'com o problema ' .mb_strtolower($fechado['chamados_problema']);
                                            } else {
                                                $problema = null;
                                            } ?>
                                            <div data-toggle="tooltip" data-placement="top" title="Chamado de nº <?= $fechado['chamados_id'] ?> aberto por <?= $fechado['usuarios_nome'] ?> <?= $fechado['usuarios_sobrenome'] ?> do setor <?= mb_strtolower($fechado['setores_setor']) ?> com a ocorrência de <?= mb_strtolower($fechado['ocorrencias_ocorrencia']) ?> <?= $problema ?> no dia <?= $fechado['chamados_data_abertura'] ?> às <?= $fechado['chamados_hora_abertura'] ?> de prioridade <?= $prioridade_nome ?> com o status <?= mb_strtolower($fechado['situacoes_nome']) ?> e com o responsável <?= $fechado['tecnico_nome'] ?> <?= $fechado['tecnico_sobrenome'] ?>">
                                                <?= $fechado['chamados_id'] ?>
                                            </div>
                                        </td>
                                        <td class="td afastado-margem" width=33 onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $fechado['chamados_id'] ?>';">
                                            <img class="chamado-historico-img2" src="../../../assets/img/perfil/<?= $fechado["usuarios_imagem"] ?>" data-toggle="tooltip-img" title="<img class='tooltip-img' src='../../../assets/img/perfil/<?= $fechado['usuarios_imagem'] ?>'>">
                                        </td>
                                        <td class="td afastado-margem" onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $fechado['chamados_id'] ?>';">
                                            <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $fechado['usuarios_nome'] ?> <?= $fechado['usuarios_sobrenome'] ?>">
                                                <?= $fechado['usuarios_nome'] ?> <?= $fechado['usuarios_sobrenome'] ?>
                                            </div>										
                                        </td>
                                        <td class="td afastado-margem hidden-xs" onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $fechado['chamados_id'] ?>';">
                                            <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $fechado['setores_setor'] ?>">
                                                <?= $fechado['setores_setor'] ?>
                                            </div>
                                        </td>
                                        <td class="td afastado-margem hidden-xs" onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $fechado['chamados_id'] ?>';">
                                            <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $fechado['ocorrencias_ocorrencia'] ?>">
                                                <?= $fechado['ocorrencias_ocorrencia'] ?>
                                            </div>
                                        </td>
                                        <td class="td afastado-margem hidden-sm hidden-xs" onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $fechado['chamados_id'] ?>';">
                                            <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $fechado['chamados_problema'] ?>">
                                                <?= $fechado['chamados_problema'] ?>
                                            </div>
                                        </td>
                                        <td class="td afastado-margem hidden-sm hidden-xs" width=127 onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $fechado['chamados_id'] ?>';"><?= $fechado['chamados_data_abertura'] ?></td>
                                        <td class="td afastado-margem hidden-sm hidden-xs" width=67 onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $fechado['chamados_id'] ?>';"><?= $fechado['chamados_hora_abertura'] ?></td>
                                        <td class="td hidden-sm hidden-xs" width=112 onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $fechado['chamados_id'] ?>';"><center><?= $prioridade ?></center></td>
                                        <td class="td hidden-sm hidden-xs" width=155 onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $fechado['chamados_id'] ?>';"><center><?= $situacao ?></center></td>
                                        <td class="td afastado-margem hidden-xs" onclick="location.href = '../tecnico/chamado-visualizar?chamado=<?= $fechado['chamados_id'] ?>';">
                                            <div class="ellipsis" data-toggle="tooltip" data-placement="top" title="<?= $fechado['tecnico_nome'] ?> <?= $fechado['tecnico_sobrenome'] ?>">
                                                <?= $fechado['tecnico_nome'] ?> <?= $fechado['tecnico_sobrenome'] ?>
                                            </div>										
                                        </td>
                                        <td class="td modal-id" width=45>
                                            <div data-toggle="tooltip" data-placement="top" title="Chamado fechado">
                                                <center>
                                                    <a class='f-label f-btn-default btn-block chamado-analista-envia'>
                                                        <i class="fas fa-child glyphicon-f-pointer"></i>
                                                    </a>
                                                </center>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table> 
                    </td>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal finalizar chamado -->
<div class="modal fade porcima" id="modal-finalizar-chamado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-geral-sucesso">
                <button type="button" class="close fechar-modal" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-f-pointer glyphicon-remove"></i></button>
                <h4 class="modal-title text-center text-success" id="myModalLabel">
                    <i class="glyphicon glyphicon-ok"></i>&ensp;Solução do chamado
                </h4>
                <br>
            </div>

            <!-- Postagem de solução -->
            <div class="chamado-post-fixo">
                <h5 class="text-left"></h5>
                <div class="media media-post">
                    <a class="pull-left author">
                        <div class="avatar">
                            <img src="../../../assets/img/perfil/<?= $usuarios_imagem ?>" class="img-circle chamado-img-modal-post" id="feedback-img-usuario">
                        </div>
                    </a>

                    <div class="media-body"><h5 class="media-heading chamado-nome-text-post"><?= $usuarios_nome ?> <?= $usuarios_sobrenome ?></h5>
                        <!-- Formulário -->
                            <form id="validador-4" method="POST" action="../../controllers/tecnico/tecnico-finalizar-chamado.php" onsubmit="return carregando_finalizar_chamado(this)">
                                <!-- Id do chamado -->
                                <input name="chamado_id" class="hidden" type="text" value="<?= $ver["chamados_id"] ?>">

                                <!-- Campo de preenchimento da solução -->
                                <div class="form-group chamado-modal-postar-text">
                                    <textarea id="chamado-finalizar-chamado" name="chamado_finalizar_chamado" class="form-control modal-coment" placeholder="Descreva a solução do chamado (opcional)" rows="3" onKeyUp="primeira_letra_maiscula(this);"></textarea>
                                </div>

                                <div class="media-footer pull-right">
                                    <button id="enter-modal-finalizar" type="submit" tabindex="1" class="btn btn-success btn-fill btn-wd f-btn-success btn-post-modal">
                                        <i id="carregando-modal-finalizar"></i>Finalizar
                                    </button>
                                </div>
                            </form>
                        <!-- /Formulário -->
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<!-- Modal cancelar chamado -->
<div class="modal fade porcima" id="modal-cancelar-chamado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-geral-erro">
                <button type="button" class="close fechar-modal" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-f-pointer glyphicon-remove"></i></button>
                <h4 class="modal-title text-center text-danger" id="myModalLabel">
                    <i class="glyphicon glyphicon-remove"></i>&ensp;Cancelamento do chamado
                </h4>
                <br>
            </div>

            <!-- Postagem de solução -->
            <div class="chamado-post-fixo">
                <h5 class="text-left"></h5>
                <div class="media media-post">
                    <a class="pull-left author">
                        <div class="avatar">
                            <img src="../../../assets/img/perfil/<?= $usuarios_imagem ?>" class="img-circle chamado-img-modal-post" id="feedback-img-usuario">
                        </div>
                    </a>

                    <div class="media-body"><h5 class="media-heading chamado-nome-text-post"><?= $usuarios_nome ?> <?= $usuarios_sobrenome ?></h5>
                        <!-- Formulário -->
                            <form id="validador-5" method="POST" action="../../controllers/tecnico/tecnico-cancelar-chamado.php" onsubmit="return carregando_cancelar_chamado(this)">
                                <!-- Id do chamado -->
                                <input name="chamado_id" class="hidden" type="text" value="<?= $ver["chamados_id"] ?>">

                                <!-- Campo de preenchimento da solução -->
                                <div class="form-group chamado-modal-postar-text">
                                    <textarea required id="chamado-cancelar-chamado" name="chamado_cancelar_chamado" class="form-control modal-coment" placeholder="Descreva o motivo do cancelamento do chamado" rows="3" onKeyUp="primeira_letra_maiscula(this);"></textarea>
                                </div>

                                <hr class="chamado-ht-tecnico-modal">

                                <div class="media-footer pull-right">
                                    <button id="enter-modal-cancelar" type="submit" tabindex="1" class="btn btn-danger btn-fill btn-wd f-btn-danger btn-post-modal">
                                        <i id="carregando-modal-cancelar"></i>Cancelar chamado
                                    </button>
                                </div>
                            </form>
                        <!-- /Formulário -->
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<!-- Modal chamado pendente -->
<div class="modal fade porcima" id="modal-pendente-chamado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-geral-warning">
                <button type="button" class="close fechar-modal" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-f-pointer glyphicon-remove"></i></button>
                <h4 class="modal-title text-center" id="myModalLabel">
                    <i class="far fa-hand-paper"></i>&ensp;Solução pendente
                </h4>
                <br>
            </div>
            <h4 class="col-md-12 col-xs-12">Mudança de status:</h4>
            <p class="text-left text-danger col-md-12 col-xs-12">Olá <?= $usuarios_nome ?> <?= $usuarios_sobrenome ?>, ao clicar em mudar para pendente o chamado mudará de status.</p>
            <p class="text-left text-danger col-md-12 col-xs-12 modal-espaco-texto">Nenhuma alteração será realizada nos dados do chamado, recomenda-se após a alteração postar um feedback para manter o solicitante bem informado da situação e do andamento do chamado.</p>
            
            <!-- Formulário -->
                <form id="validador-5" method="POST" action="../../controllers/tecnico/tecnico-pendente-chamado.php" onsubmit="return carregando_pendente_chamado(this)">
                    <div class="form-group chamado-modal-input">
                        <div class="input-group">
                            <!-- Id do chamado -->
                            <input name="chamado_id" class="hidden" type="text" value="<?= $ver["chamados_id"] ?>">
                        </div>
                    </div>
                    
                    <hr>

                    <div class="modal-footer">
                        <button type="submit" tabindex="1" class="btn btn-warning btn-fill btn-wd f-btn-warning btn-post-modal">
                            <i id="carregando-modal-pendente"></i>Mudar para pendente
                        </button>
                    </div>
                </form>
            <!-- /Formulário -->
        </div>
    </div>
</div>

<!-- Javascript -->
<?php include("../../controllers/import/script-rodape.php"); ?>