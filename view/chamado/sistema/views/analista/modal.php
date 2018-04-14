<!-- Modal enviar chamado -->
<div class="modal fade porcima" id="modal-enviar-chamado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 1072;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-geral-sucesso">
                <button type="button" class="close fechar-modal" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-f-pointer glyphicon-remove"></i></button>
                <h4 class="modal-title text-center text-success" id="myModalLabel">
                    <i class="fab fa-telegram-plane"></i>&ensp;Enviar o chamado de
                    <span class="usuarios_nome"></span><span class="usuarios_sobrenome"></span>
                </h4>
                <br>
            </div>
            <h4 class="col-md-12 col-xs-12">Selecione um responsável para o atendimento:</h4>
            <p class="text-left text-success col-md-12 col-xs-12">Olá <?= $usuarios_nome ?>, selecione abaixo uma pessoa para atender o chamado.</p>
            
            <form id="validador-3" action="../../controllers/analista/analista-enviar-chamado.php" method="POST">
            
                <input class="usuario_id hidden" name="usuario_id" value="usuario_id">
                <input class="chamado_id hidden" name="chamado_id" value="chamado_id">
                <div class="form-group chamado-modal-input">
                    <i id="chamado-i" class="pull-right fa fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="Selecione o responsável pelo o atendimento do chamado"></i>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
                        <select required tabindex="1" name="responsavel_id" class="form-control selectpicker">
                            <option value="" disabled selected>Selecione o responsável</option>
                            <?php $listar_responsaveis = listar_responsaveis($conexao, $usuarios_setor_id); ?>
                            <?php foreach ($listar_responsaveis as $registro): ?>
                                <option value="<?= $registro['usuarios_id'] ?>"><?= $registro["usuarios_nome"] ?> <?= $registro["usuarios_sobrenome"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                
                <div class="modal-espaco-div"></div>
                <hr class="modal-espaco-hr">

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
        </div>
    </div>
</div>

<!-- Javascript -->
<?php include("../../controllers/import/script-rodape.php"); ?>