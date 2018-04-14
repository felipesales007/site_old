<!-- Modal alterar usuário -->
<div class="modal fade porcima" id="modal-administrador-alterar-usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 1072;">
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
            
            <form action="../../controllers/administrador/usuario-visualizar.php" method="POST">
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

<!-- Modal para desativar setor -->
<div class="modal fade porcima" id="modal-desativar-setor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 1072;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-geral-erro">
                <button type="button" class="close fechar-modal" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-f-pointer glyphicon-remove"></i></button>
                <h4 class="modal-title text-center text-danger" id="myModalLabel">
                    <i class="glyphicon glyphicon-ok"></i>&ensp;Desativar setor
                </h4>
                <br>
            </div>
            <h4 class="col-md-12 col-xs-12">Você tem certeza que deseja desativar o setor ?</h4>
            <p class="text-left text-danger col-md-12 col-xs-12">Olá <?= $usuarios_nome ?>, ao desativar este setor você irá desativar todos os usuários deste setor, e caso este setor seja um setor de serviços você irá desativá-lo também, clique em confirmar para prosseguir.</p>
            <br><br>

            <form action="../../controllers/administrador/desativar-setor.php" method="POST">
                <input class="setor_id hidden" name="setor_id">
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

<!-- Modal para ativar setor -->
<div class="modal fade porcima" id="modal-ativar-setor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 1072;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-geral-sucesso">
                <button type="button" class="close fechar-modal" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-f-pointer glyphicon-remove"></i></button>
                <h4 class="modal-title text-center text-success" id="myModalLabel">
                    <i class="glyphicon glyphicon-ok"></i>&ensp;Ativar setor
                </h4>
                <br>
            </div>
            <h4 class="col-md-12 col-xs-12">Você tem certeza que deseja ativar o setor ?</h4>
            <p class="text-left col-md-12 col-xs-12">Olá <?= $usuarios_nome ?>, clique em confirmar para prosseguir.</p>
            
            <form action="../../controllers/administrador/ativar-setor.php" method="POST">
                <input class="setor_id hidden" name="setor_id">
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

<!-- Modal para desativar setor de serviços -->
<div class="modal fade porcima" id="modal-desativar-setor-servicos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 1072;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-geral-erro">
                <button type="button" class="close fechar-modal" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-f-pointer glyphicon-remove"></i></button>
                <h4 class="modal-title text-center text-danger" id="myModalLabel">
                    <i class="glyphicon glyphicon-ok"></i>&ensp;Desativar setor de serviços
                </h4>
                <br>
            </div>
            <h4 class="col-md-12 col-xs-12">Você tem certeza que deseja desativar este setor de serviços ?</h4>
            <p class="text-left col-md-12 col-xs-12">Olá <?= $usuarios_nome ?>, clique em confirmar para prosseguir.</p>
            
            <form action="../../controllers/administrador/desativar-setor-servicos.php" method="POST">
                <input class="setor_servicos_id hidden" name="setor_servicos_id">
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

<!-- Modal para ativar setor -->
<div class="modal fade porcima" id="modal-ativar-setor-servicos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 1072;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-geral-sucesso">
                <button type="button" class="close fechar-modal" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-f-pointer glyphicon-remove"></i></button>
                <h4 class="modal-title text-center text-success" id="myModalLabel">
                    <i class="glyphicon glyphicon-ok"></i>&ensp;Ativar setor de serviços
                </h4>
                <br>
            </div>
            <h4 class="col-md-12 col-xs-12">Você tem certeza que deseja ativar este setor de serviços ?</h4>
            <p class="text-left col-md-12 col-xs-12">Olá <?= $usuarios_nome ?>, clique em confirmar para prosseguir.</p>
            
            <form action="../../controllers/administrador/ativar-setor-servicos.php" method="POST">
                <input class="setor_servicos_id hidden" name="setor_servicos_id">
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