<!-- Tela de mensagem -->
    <div class="modal fade" id="contato">
        <div class="modal-dialog">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-signup">
                    <i id="i_mensagem" class="pull-left material-icons i_padrao_email" data-toggle="popover" data-placement="top" title="Entre em contato comigo" data-content="Você pode me enviar um elogio, sugestões de melhorias para o site, proposta de trabalho, informar um bug no site, entre outras coisa.">error_outline</i>
                    <form class="form" method="POST" action="../../controller/curriculo/email/enviar" onsubmit="return valida_form(this)">
                        <p class="text-divider">Enviar mensagem para Felipe Sales</p>
                        <button id="mensagem_fechar" type="button" class="close" data-dismiss="modal" aria-hidden="true"><h3><b>&times;</b></h3></button>
                        <div class="content">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">face</i>
                                </span>
                                <input required tabindex="1" type="text" id="mensagem_nome" name="mensagem_nome" class="form-control" placeholder="Seu nome">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">mail_outline</i>
                                </span>
                                <input required tabindex="2" type="email" name="mensagem_email" class="form-control" placeholder="Seu e-mail">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">comment</i>
                                </span>
                                <textarea required tabindex="3" name="mensagem_mensagem" class="form-control" placeholder="Digite aqui sua mensagem" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button tabindex="4" type="submit" class="btn btn-simple btn-primary btn-lg"><i id="carregando"></i>Enviar Mensagem</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /Tela de mensagem -->

<!-- Tela de número -->
    <div class="modal fade" id="numero">
        <div class="modal-dialog">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-signup">
                    <i id="i_mensagem" class="pull-left material-icons i_padrao_whats" data-toggle="popover" data-placement="top" title="Meu número" data-content="Você pode usar também para entrar em contato comigo por ligação.">error_outline</i>
                    <button id="contato_fechar" type="button" class="close" data-dismiss="modal" aria-hidden="true"><h3><b>&times;</b></h3></button>
                    <center><h5 class="description">&emsp; WhatsApp</h5></center>
                    <h3 class="text-divider"><i id="whatsapp_color" class="fa fa-whatsapp"></i> (71) 9 9140-2371</h3>
                    <br>
                </div>
            </div>
        </div>
    </div>
<!-- /Tela de número -->