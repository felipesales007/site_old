<!-- Modal alterar usuário do setor -->
<div class="modal fade porcima" id="modal-alterar-usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 1072;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-geral-sucesso">
                <button type="button" class="close fechar-modal" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-f-pointer glyphicon-remove"></i></button>
                <h4 class="modal-title text-center text-success" id="myModalLabel">
                    <i class="glyphicon glyphicon-ok"></i>&ensp;Confirmação de alteração de usuário
                </h4>
                <br>
            </div>
            <h4 class="col-md-12 col-xs-12">Você tem certeza da alteração do usuário ?</h4>
            <p class="text-left text-success col-md-12 col-xs-12">Olá <?= $usuarios_nome ?>, clique em confirmar para prosseguir.</p>
            
            <form action="../../controllers/supervisor/usuario-visualizar.php" method="POST">
                <input class="usuario_id hidden" name="usuario_id">
                <input class="usuario_setor hidden" name="usuario_setor">
                <input class="usuario_permissao hidden" name="usuario_permissao">
                <input class="usuario_status hidden" name="usuario_status">
                <br><br><br>
                
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

<!-- Modal para desativar ocorrência -->
<div class="modal fade porcima" id="modal-desativar-ocorrencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 1072;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-geral-erro">
                <button type="button" class="close fechar-modal" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-f-pointer glyphicon-remove"></i></button>
                <h4 class="modal-title text-center text-danger" id="myModalLabel">
                    <i class="glyphicon glyphicon-ok"></i>&ensp;Desativar ocorrência
                </h4>
                <br>
            </div>
            <h4 class="col-md-12 col-xs-12">Você tem certeza que deseja desativar a ocorrência ?</h4>
            <p class="text-left col-md-12 col-xs-12">Olá <?= $usuarios_nome ?>, clique em confirmar para prosseguir.</p>
            
            <form action="../../controllers/supervisor/desativar-ocorrencia.php" method="POST">
                <input class="ocorrencia_id hidden" name="ocorrencia_id">
                <br><br><br>
                
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

<!-- Modal para ativar ocorrência -->
<div class="modal fade porcima" id="modal-ativar-ocorrencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 1072;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-geral-sucesso">
                <button type="button" class="close fechar-modal" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-f-pointer glyphicon-remove"></i></button>
                <h4 class="modal-title text-center text-success" id="myModalLabel">
                    <i class="glyphicon glyphicon-ok"></i>&ensp;Ativar ocorrência
                </h4>
                <br>
            </div>
            <h4 class="col-md-12 col-xs-12">Você tem certeza que deseja ativar a ocorrência ?</h4>
            <p class="text-left col-md-12 col-xs-12">Olá <?= $usuarios_nome ?>, clique em confirmar para prosseguir.</p>
            
            <form action="../../controllers/supervisor/ativar-ocorrencia.php" method="POST">
                <input class="ocorrencia_id hidden" name="ocorrencia_id">
                <br><br><br>
                
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