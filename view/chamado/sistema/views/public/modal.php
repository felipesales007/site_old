<!-- Modal sobre -->
    <div class="modal fade porcima wow fadeInDown" data-wow-duration="1s" data-wow-delay=".0s" id="sobre">
        <div class="modal-dialog">
            <div class="col-md-8 col-md-offset-2">
                <div class="carta-rodape">
                    <div class="pull-right login-ponteiro">
                        <center>
                            <span id="login-button-sobre-fechar" data-dismiss="modal" aria-hidden="true" class="label label-danger">&times;</span>
                        </center>
                    </div>
                </div>
                <div class="card">
                    <img id='login-sobre-img' src='../../../assets/img/sobre.jpg'>
                    <div class="content">
                        <h6 class="category">Sobre</h6>
                        <h4 class="title">Sistema de chamados online</h4>
                        <p class="description">Desenvolvido por Felipe Sales, o sistema busca oferecer uma nova e moderna interface aos sistemas de gerenciamento de chamado da atualidade, entregando para os usuários que a utilizam um design limpo, simples e fácil de se utilizar.</p>
                        <br>
                        <p class="description pull-left">Visualizar no<a id="login-link-youtube" href="https://www.youtube.com/user/FelipeSales007/videos" target="_blank">&ensp;<i class="fab fa-youtube"></i> YouTube</a></p>
                        <p class="description pull-right">Versão 3.0</p>
                    </div>  
                </div>
            </div>
        </div>
    </div>
<!-- /Modal sobre -->

<!-- Modal novo usuário -->
    <!-- Sucesso -->
    <div class="modal fade porcima" id="modal-novo-usuario-sucesso" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-geral-sucesso">
                    <h4 class="modal-title text-center text-success" id="myModalLabel">
                        <i class="glyphicon glyphicon-ok"></i>&ensp;Conta de acesso criada com sucesso
                    </h4>
                    <br>
                </div>
                <br>
                <center>
                    <div class="input-group col-md-5 col-sm-5 col-xs-9">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input readonly="true" class="form-control login-input-modal" type="text" value="Usuário: <?= strtolower($_POST['usuarios_usuario_criar']) ?>">
                    </div>
                </center>
                <br>
                <center>
                    <div class="input-group col-md-5 col-sm-5 col-xs-9">
                        <span class="input-group-addon"><i class="fas fa-key"></i></span>
                        <input readonly="true" class="form-control login-input-modal" type="text" value="Senha: <?= $_POST['usuarios_senha_criar'] ?>">
                    </div>
                </center>
                <div class="modal-espaco-div"></div>
                <hr class="modal-espaco-hr">
                <div class="modal-footer">
                    <a href="../../views/public/login" class="cursor-default">
                        <button class="btn btn-success f-btn-success">
                            <i class="glyphicon glyphicon-share-alt glyphicon-f-pointer"></i>&ensp;Fazer login
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Erro -->
    <div class="modal fade porcima" id="modal-novo-usuario-erro" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-geral-erro">
                    <h4 class="modal-title text-center text-danger" id="myModalLabel">
                        <i class="glyphicon glyphicon-ban-circle"></i>&ensp;Erro ao criar conta de acesso
                    </h4>
                    <br>
                </div>
                <h4 class="col-md-12 col-xs-12">Possíveis problemas:</h4>
                <div class="input-group">
                    <p class="text-left text-danger col-md-12 col-xs-12"> - Usuário já cadastrado no sistema.</p>
                    <p class="text-left text-danger col-md-12 col-xs-12"> - Matrícula já cadastrada no sistema.</p>
                    <p class="text-left text-danger col-md-12 col-xs-12"> - CPF já cadastrado no sistema.</p>
                    <p class="text-left text-danger col-md-12 col-xs-12"> - Campo sem preencher ou incorreto.</p>
                </div>
                <hr class="modal-espaco-hr">
                <div class="modal-footer">
                    <a href="../../views/public/login" class="cursor-default">
                        <button class="btn btn-success f-btn-success">
                            <i class="glyphicon glyphicon-share-alt glyphicon-f-pointer"></i>&ensp;Fazer login
                        </button>
                    </a>
                    <span class="modal-btn-espaco"></span>
                    <button class="btn btn-primary f-btn-primary" data-dismiss="modal" onclick="button_voltar()">
                        <i class="fas fa-pencil-alt glyphicon-f-pointer"></i>&ensp;Tentar novamente
                    </button>
                </div>
            </div>
        </div>
    </div>
<!-- /Modal novo usuário -->

<!-- Modal recuperar senha -->
    <!-- Sucesso -->
    <div class="modal fade porcima" id="modal-recuperar-senha-sucesso" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-geral-sucesso">
                    <h4 class="modal-title text-center text-success" id="myModalLabel">
                        <i class="glyphicon glyphicon-ok"></i>&ensp;Recuperação de senha realizada com sucesso
                    </h4>
                    <br>
                </div>
                <h4 class="col-md-12 col-xs-12">Senha de acesso:</h4>
                <p class="text-left text-success col-md-12 col-xs-12">Olá <?= $recuperar['usuarios_nome'] ?> <?= $recuperar['usuarios_sobrenome'] ?>, segue abaixo sua senha de acesso ao sistema.</p>
                <p class="text-left text-success col-md-12 col-xs-12 modal-espaco-texto">Para alterar a senha, se necessário, realize login no sistema e altere em seu perfil indo em menu no lado direito da tela.</p>
                <center>
                    <div class="input-group col-md-5 col-sm-5 col-xs-9">
                        <span class="input-group-addon"><i class="fas fa-key"></i></span>
                        <input readonly="true" class="form-control login-input-modal" type="text" value="<?= base64_decode($recuperar['usuarios_senha']) ?>">
                    </div>
                </center>
                <div class="modal-espaco-div"></div>
                <hr class="modal-espaco-hr">
                <div class="modal-footer">
                    <a href="../../views/public/login" class="cursor-default">
                        <button class="btn btn-success f-btn-success">
                            <i class="glyphicon glyphicon-share-alt glyphicon-f-pointer"></i>&ensp;Fazer login
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Erro -->
    <div class="modal fade porcima" id="modal-recuperar-senha-erro" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-geral-erro">
                    <h4 class="modal-title text-center text-danger" id="myModalLabel">
                        <i class="glyphicon glyphicon-ban-circle"></i>&ensp;Recuperação de senha fracassada
                    </h4>
                    <br>
                </div>
                <h4 class="col-md-12 col-xs-12">Possíveis problemas:</h4>
                <div class="input-group">
                    <p class="text-left text-danger col-md-12 col-xs-12"> - Usuário não é cadastrado no sistema.</p>
                    <p class="text-left text-danger col-md-12 col-xs-12"> - Usuário ou CPF incorreto.</p>
                    <p class="text-left text-danger col-md-12 col-xs-12"> - Campo sem preencher ou incorreto.</p>
                </div>
                <hr class="modal-espaco-hr">
                <div class="modal-footer">
                    <a href="../../views/public/login" class="cursor-default">
                        <button class="btn btn-success f-btn-success">
                            <i class="glyphicon glyphicon-share-alt glyphicon-f-pointer"></i>&ensp;Fazer login
                        </button>
                    </a>
                    <span class="modal-btn-espaco"></span>
                    <button class="btn btn-primary f-btn-primary" data-dismiss="modal" onclick="button_voltar()">
                        <i class="fas fa-pencil-alt glyphicon-f-pointer"></i>&ensp;Tentar novamente
                    </button>
                </div>
            </div>
        </div>
    </div>
<!-- /Modal recuperar senha -->